<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                <img src="../assets/img/logo/tupad-logo.png" alt="" class=" rounded-circle" style="height:30px;">
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2 text-center">{{ config('app.name', 'MPMIS') }}

                @if (Auth::user()->role == 0)
                    <br>SYSTEM | ADMIN<br>
                @elseif (Auth::user()->role == 1)
                    <br>PESO | TUPAD<br>
                @elseif (Auth::user()->role == 2)
                    <br>AGRICULTURE<br>
                @elseif (Auth::user()->role == 3)
                    <br>ACAP</br>
                @endif
            </span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @auth
        @if (Auth::user()->role == 0)
            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"
                        class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-mac-line"></i>
                        <div data-i18n="Basic">Dashboard</div>
                    </a>
                </li>
                <li class="menu-header mt-3">
                    <span class="menu-header-text">System Settings</span>
                </li>
                <li class="menu-item {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                    <a href="{{ route('accounts.index') }}"
                        class="menu-link {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-group-line"></i>
                        <div data-i18n="Basic">Accounts</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                    <a href="{{ route('accounts.index') }}"
                        class="menu-link {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-settings-3-line"></i>
                        <div data-i18n="Basic">Manager</div>
                    </a>
                </li>
            </ul>
        @endif
        @if (Auth::user()->role == 1)
            <ul class="menu-inner py-1">
                <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"
                        class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-mac-line"></i>
                        <div data-i18n="Basic">Dashboard</div>
                    </a>
                </li>
                <li class="menu-header mt-3">
                    <span class="menu-header-text">TUPAD Information</span>
                </li>
                <li class="menu-item {{ request()->routeIs('tupad-applicant.index') ? 'active' : '' }}">
                    <a href="{{ route('tupad-applicant.index') }}"
                        class="menu-link {{ request()->routeIs('tupad-applicant.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-hand-coin-line"></i>
                        <div data-i18n="Basic">TUPAD Applicant</div>
                    </a>
                </li>
                <li class="menu-header mt-3">
                    <span class="menu-header-text">Officials</span>
                </li>
                <li class="menu-item {{ request()->routeIs('barangay-officials.index') ? 'active' : '' }}">
                    <a href="{{ route('barangay-officials.index') }}"
                        class="menu-link {{ request()->routeIs('barangay-officials.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-government-line"></i>
                        <div data-i18n="Basic">Barangay Officials</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('appointed-officials.index') ? 'active' : '' }}">
                    <a href="{{ route('appointed-officials.index') }}"
                        class="menu-link {{ request()->routeIs('appointed-officials.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-user-star-line"></i>
                        <div data-i18n="Basic">Appointed Officials</div>
                    </a>
                </li>
                <li class="menu-header mt-3">
                    <span class="menu-header-text">System Settings</span>
                </li>
                <li class="menu-item {{ request()->routeIs('manage.index') ? 'active' : '' }}">
                    <a href="{{ route('manage.index') }}"
                        class="menu-link {{ request()->routeIs('appointed-officials.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-settings-line"></i>
                        <div data-i18n="Basic">Manage</div>
                    </a>
                </li>
            </ul>
        @endif
        @if (Auth::user()->role == 2)
            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"
                        class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-mac-line"></i>
                        <div data-i18n="Basic">Dashboard</div>
                    </a>
                </li>
                <li class="menu-header mt-3">
                    <span class="menu-header-text">Boat Licensing & Registration</span>
                </li>
                <li class="menu-item {{ request()->routeIs('agriculture-motorized.index') ? 'active' : '' }}">
                    <a href="{{ route('agriculture-motorized.index') }}"
                        class="menu-link {{ request()->routeIs('agriculture-motorized.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-ship-2-line"></i>
                        <div data-i18n="Basic">Motorized</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('agriculture-non-motorized.index') ? 'active' : '' }}">
                    <a href="{{ route('agriculture-non-motorized.index') }}"
                        class="menu-link {{ request()->routeIs('agriculture-non-motorized.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-sailboat-line"></i>
                        <div data-i18n="Basic">Non - Motorized</div>
                    </a>
                </li>
                <li class="menu-header mt-3">
                    <span class="menu-header-text">Fisheries Equipment Registration</span>
                </li>
                <li class="menu-item {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                    <a href="{{ route('accounts.index') }}"
                        class="menu-link {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-webhook-line"></i>
                        <div data-i18n="Basic">Fishing Gear</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                    <a href="{{ route('accounts.index') }}"
                        class="menu-link {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-box-1-fill"></i>
                        <div data-i18n="Basic">Fish Cage</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                    <a href="{{ route('accounts.index') }}"
                        class="menu-link {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                        <i class="menu-icon tf-icons ri-home-6-fill"></i>
                        <div data-i18n="Basic">Payao</div>
                    </a>
                </li>
                <li class="menu-header mt-3">
                    <span class="menu-header-text">System Management</span>
                </li>
                <li class="menu-item {{ request()->routeIs('agriculture-headings.index') ? 'open' : '' }}">
                    <a href="" class="menu-link menu-toggle waves-effect">
                        <i class="menu-icon tf-icons ri-settings-line"></i>
                        <div data-i18n="Form Elements">Settings</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('agriculture-headings.index') ? 'active' : '' }}">
                            <a href="{{ route('agriculture-headings.index') }}"
                                class="menu-link {{ request()->routeIs('agriculture-headings.index') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons ri-printer-fill me-2"></i>
                                Print Headings
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endif
    @endauth
</aside>
<!-- / Menu -->
