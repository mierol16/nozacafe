<!-- Only for admin -->

<?php if (session()->get('roleID') == 2) : ?>
    <li class="menuitem-<?= ($currentSubSidebar == 'profile') ? 'active' : '' ?>">
        <a href="{{ url('user/profile') }}">
            <i class="mdi mdi-account"></i>
            <span>Profile</span>
        </a>
    </li>
    <li>
        <a href="#user" data-bs-toggle="collapse">
            <i class="mdi mdi-account-multiple"></i>
            <span> Users </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse <?= ($currentSidebar == 'user') ? 'show' : '' ?>" id="user">
            <ul class="nav-second-level">
                <li class="menuitem-<?= ($currentSubSidebar == 'staff') ? 'active' : '' ?>">
                    <a href="{{ url('user/employee') }}">Employee</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menuitem-<?= ($currentSubSidebar == 'attendance') ? 'active' : '' ?>">
        <a href="{{ url('attendance/record') }}">
            <i class="mdi mdi-clock-check-outline"></i>
            <span>Attendance</span>
        </a>
    </li>

    <li class="menuitem-<?= ($currentSubSidebar == 'performance') ? 'active' : '' ?>">
        <a href="{{ url('performance/record') }}">
            <i class="mdi mdi-star"></i>
            <span>Performance</span>
        </a>
    </li>

    <li>
        <a href="#leave" data-bs-toggle="collapse">
            <i class="mdi mdi-calendar-multiple-check"></i>
            <span> Leaves </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse <?= ($currentSidebar == 'leave') ? 'show' : '' ?>" id="leave">
            <ul class="nav-second-level">
            <li class="menuitem-<?= ($currentSubSidebar == 'allLeave') ? 'active' : '' ?>">
                    <a href="{{ url('leave/all') }}">All Leave</a>
                </li>
                <li class="menuitem-<?= ($currentSubSidebar == 'new') ? 'active' : '' ?>">
                    <a href="{{ url('leave/new') }}">New Leave</a>
                </li>
                <li class="menuitem-<?= ($currentSubSidebar == 'approve') ? 'active' : '' ?>">
                    <a href="{{ url('leave/approve') }}">Approved Leave</a>
                </li>
                <li class="menuitem-<?= ($currentSubSidebar == 'rejected') ? 'active' : '' ?>">
                    <a href="{{ url('leave/reject') }}">Rejected Leave</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menu-title mt-2">MANAGEMENT</li>

    <li>
        <a href="#settings" data-bs-toggle="collapse">
            <i class="mdi mdi-cogs"></i>
            <span> Settings </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse <?= ($currentSidebar == 'settings') ? 'show' : '' ?>" id="settings">
            <ul class="nav-second-level">
                <li class="menuitem-<?= ($currentSubSidebar == 'leave') ? 'active' : '' ?>">
                    <a href="{{ url('leave') }}">Leave</a>
                </li>
            </ul>
        </div>
    </li>

<?php endif; ?>