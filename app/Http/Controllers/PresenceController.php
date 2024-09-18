<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Presence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\MailController;


class PresenceController extends Controller
{
    public function headofficePresence()
    {
        $headoffice_employees = Employee::where('location_id', 1)->pluck('nik');

        return view('presence.headoffice', [
            'presences' => Presence::whereIn('employee_id', $headoffice_employees)->get()
        ]);
    }

    public function boutiquePresence()
    {
        $boutique_employees = Employee::where('location_id', 2)->pluck('nik');

        return view('presence.boutique', [
            'presences' => Presence::whereIn('employee_id', $boutique_employees)->get()
        ]);
    }

    public function checkBoutiquePresence(Request $request)
    {
        $mailController = new MailController();

        $officeEntryTime = Carbon::createFromTimeString('08:30:00'); // Jam masuk yang berlaku, misal 08:00
        $presenceTime = Carbon::now();

        // Hitung keterlambatan dalam menit
        $latenessMinutes = 0;

        if ($presenceTime->greaterThan($officeEntryTime)) {
            $latenessMinutes = $presenceTime->diffInMinutes($officeEntryTime); // Calculate the difference in minutes
        }

        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        // Ambil data employee berdasarkan NIK
        $employee = Employee::where('nik', $request->nik)->first();

        // Cek apakah employee dengan NIK tersebut ditemukan
        if ($employee) {
            // Cocokkan password yang diinput dengan password yang tersimpan di database
            $checkpresencein = Presence::where('employee_id', $employee->nik)->first();

            if (Hash::check($request->password, $employee->password)) {
                $image = $request->input('image');

                // Inisialisasi $fotoUrl sebagai null
                $fotoUrl = null;

                // Proses gambar hanya jika gambar tidak null
                if ($image) {
                    // Memisahkan data URL dan base64
                    $image_parts = explode(";base64,", $image);

                    // Pastikan array memiliki dua elemen
                    if (count($image_parts) == 2) {
                        // Decode data base64
                        $image_base64 = base64_decode($image_parts[1]);

                        // Buat gambar dari string Base64
                        $img = imagecreatefromstring($image_base64);

                        if ($img !== false) {
                            // Ubah nama file ke format .jpg
                            $fileName = 'absen_' . time() . '.jpg';
                            $filePath = storage_path('app/public/presence-capture/' . $fileName);

                            // Kompresi dan simpan gambar dengan kualitas 75 (0-100)
                            imagejpeg($img, $filePath, 75);

                            // Simpan URL dari foto yang disimpan di storage
                            $fotoUrl = Storage::url('presence-capture/' . $fileName);

                            // Bebaskan memori setelah digunakan
                            imagedestroy($img);
                        } else {
                            // Jika terjadi kesalahan saat membuat gambar, Anda bisa menambahkan error handling di sini
                            return back()->with('error', 'Failed to process the image.');
                        }
                    }
                }

                // Jika data presensi masuk belum ada
                if (!$checkpresencein) {
                    Presence::create([
                        'employee_id' => $request->nik,
                        'in_presence_time' => $presenceTime->toTimeString(),
                        'in_presence_photo' => $fotoUrl, // Foto bisa null
                        'late_minutes' => $latenessMinutes, // Simpan jumlah menit keterlambatan
                        'attendance_id' => Attendance::orderBy('created_at', 'desc')->first()->id
                    ]);

                    $detailMailHRD = [
                        'title' => " telah melakukan absen masuk",
                        'body' => "Seorang karyawan boutique bernama {$employee->name} melakukan absen keluar pada {$presenceTime}"
                    ];

                    $detailMailEmployee = [
                        'title' => 'Anda telah melakukan absen masuk',
                        'body' => "Anda telah melakukan absen masuk pada {$presenceTime}"
                    ];

                    $recipient = Employee::where('nik', $request->nik)->value('email');

                    // Panggil method sendEmail di MailController
                    $mailController->presenceMailEmployee($detailMailEmployee, $recipient);

                    // Panggil method sendEmail di MailController
                    $mailController->presenceMailHRD($detailMailHRD);

                    return redirect()->route('boutique.presence');
                } else {
                    // Update data presensi keluar
                    Presence::where('employee_id', $employee->nik)->update([
                        'out_presence_time' => Carbon::now()->toTimeString(),
                        'out_presence_photo' => $fotoUrl // Foto bisa null
                    ]);

                    $detailMailHRD = [
                        'title' => "telah melakukan absen keluar",
                        'body' => "Seorang karyawan boutique bernama {$employee->name} telah melakukan absen keluar pada pukul {$presenceTime}"
                    ];

                    $detailMailEmployee = [
                        'title' => 'Anda telah melakukan absen keluar',
                        'body' => "Anda telah melakukan absen keluar pada {$presenceTime}"
                    ];

                    $recipient = Employee::where('nik', $request->nik)->value('email');

                    // Panggil method sendEmail di MailController
                    $mailController->presenceMailEmployee($detailMailEmployee, $recipient);

                    // Panggil method sendEmail di MailController
                    $mailController->presenceMailHRD($detailMailHRD);

                    return redirect()->route('boutique.presence');
                }
                // jika password salah
            } else {
                Alert::error('Absen gagal', 'password salah');
                return back();
            }
        } else {
            // Jika employee dengan NIK tersebut tidak ditemukan
            Alert::error('Absen gagal', 'anda tidak terdaftar sebagai karyawan');
            return back();
        }
    }

    public function checkHeadofficePresence(Request $request)
    {
        $mailController = new MailController();

        $officeEntryTime = Carbon::createFromTimeString('08:30:00');
        $presenceTime = Carbon::now();
        $latenessMinutes = 0;

        if ($presenceTime->greaterThan($officeEntryTime)) {
            $latenessMinutes = $presenceTime->diffInMinutes($officeEntryTime);
        }

        $request->validate([
            'nik' => 'required',
        ]);

        $employee = Employee::where('nik', $request->nik)->first();

        if ($employee) {
            $checkpresencein = Presence::where('employee_id', $employee->nik)->first();
            $fotoUrl = null;
            $image = $request->input('image');
            if ($image) {
                $image_parts = explode(";base64,", $image);
                if (count($image_parts) == 2) {
                    $image_base64 = base64_decode($image_parts[1]);

                    $img = imagecreatefromstring($image_base64);

                    if ($img !== false) {
                        // Ubah nama file ke format .jpg
                        $fileName = 'absen_' . time() . '.jpg';
                        $filePath = storage_path('app/public/presence-capture/' . $fileName);

                        // Kompresi dan simpan gambar dengan kualitas 75 (0-100)
                        imagejpeg($img, $filePath, 75);

                        // Simpan URL dari foto yang disimpan di storage
                        $fotoUrl = Storage::url('presence-capture/' . $fileName);

                        // Bebaskan memori setelah digunakan
                        imagedestroy($img);
                    } else {
                        // Jika terjadi kesalahan saat membuat gambar, Anda bisa menambahkan error handling di sini
                        return back()->with('error', 'Failed to process the image.');
                    }
                }
            }

            // Jika data presensi masuk belum ada
            if (!$checkpresencein) {
                Presence::create([
                    'employee_id' => $request->nik,
                    'in_presence_time' => $presenceTime->toTimeString(),
                    'in_presence_photo' => $fotoUrl, // Foto bisa null
                    'late_minutes' => $latenessMinutes, // Simpan jumlah menit keterlambatan
                    'attendance_id' => Attendance::orderBy('created_at', 'desc')->first()->id,
                ]);

                $detailMailHRD = [
                    'title' => "{$employee->name} telah melakukan absen masuk",
                    'body' => "Seorang karyawan headoffice bernama {$employee->name} telah melakukan absen masuk pada pukul {$presenceTime}"
                ];

                $detailMailEmployee = [
                    'title' => 'Anda telah melakukan absen masuk',
                    'body' => "Anda telah melakukan absen masuk pada {$presenceTime}"
                ];

                $recipient = Employee::where('nik', $request->nik)->value('email');

                // Panggil method sendEmail di MailController
                $mailController->presenceMailEmployee($detailMailEmployee, $recipient);

                // Panggil method sendEmail di MailController
                $mailController->inPresenceMailHRD($detailMailHRD);

                return redirect()->route('headoffice.presence');
            } else {
                // Update data presensi keluar
                Presence::where('employee_id', $employee->nik)->update([
                    'out_presence_time' => Carbon::now()->toTimeString(),
                    'out_presence_photo' => $fotoUrl // Foto bisa null
                ]);

                $detailMailHRD = [
                    'title' => "{$employee->name} telah melakukan absen keluar",
                    'body' => "Seorang karyawan headoffice bernama {$employee->name} telah melakukan absen keluar pada pukul {$presenceTime}"
                ];

                $detailMailEmployee = [
                    'title' => 'Anda telah melakukan absen keluar',
                    'body' => "Anda telah melakukan absen keluar pada {$presenceTime}"
                ];

                $recipient = Employee::where('nik', $request->nik)->value('email');

                // Panggil method sendEmail di MailController
                $mailController->presenceMailEmployee($detailMailEmployee, $recipient);

                // Panggil method sendEmail di MailController
                $mailController->presenceMailHRD($detailMailHRD);

                return redirect()->route('headoffice.presence');
            }
        } else {
            // Jika employee dengan NIK tersebut tidak ditemukan
            Alert::error('Absen gagal', 'anda tidak terdaftar sebagai karyawan');
            return back();
        }
    }
}
