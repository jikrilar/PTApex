<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AttendanceReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reset absensi setiap hari';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Attendance::create([
            'attendance_date' => Carbon::now()->toDateString()
        ]);

        $this->info('absensi berhasil direset');

        return 0;
    }
}
