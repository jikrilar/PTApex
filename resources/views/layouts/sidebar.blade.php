<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Apex Mitra Malindo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jikril Aryanda</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                @if (Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                Candidate
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('candidate.index') }}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                Employee
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('employee.index') }}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employee.resign') }}" class="nav-link">
                                    <i class="fa fa-user-times nav-icon"></i>
                                    <p>Resign</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employee.birthdayToday') }}" class="nav-link">
                                    <i class="fa fa-birthday-cake nav-icon"></i>
                                    <p>Birthday</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Attendance
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('boutique.presence') }}" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Boutique</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('headoffice.presence') }}" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>HeadOffice</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                DataMaster
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('location.index') }}" class="nav-link">
                                    <i class="nav-icon fa fa-map"></i>
                                    <p>
                                        Location
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('department.index') }}" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>
                                        Department
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('title.index') }}" class="nav-link">
                                    <i class="nav-icon fa fa-address-card"></i>
                                    <p>
                                        Title
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            Saving
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>
                                    Deposit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa fa-minus"></i>
                                <p>
                                    Withdraw
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            Loan
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('loan.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('loan.create') }}" class="nav-link">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>
                                    Apply
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('installment.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-money-bill"></i>
                                <p>
                                    Bill & Payment
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class="nav-link btn btn-transparent">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p>
                                Sign Out
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
