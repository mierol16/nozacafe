<!-- Only for superadmin -->

<?php if (session()->get('roleID') == 1) : ?>
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
                <li class="menuitem-<?= ($currentSubSidebar == 'admin') ? 'active' : '' ?>">
                    <a href="{{ url('user/admin') }}">Administrator</a>
                </li>
                <li class="menuitem-<?= ($currentSubSidebar == 'staff') ? 'active' : '' ?>">
                    <a href="{{ url('user/employee') }}">Employee</a>
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
    <li class="menuitem-<?= ($currentSubSidebar == 'roles') ? 'active' : '' ?>">
        <a href="{{ url('roles') }}">
            <i class="mdi mdi-lock-check-outline"></i>
            <span>Roles</span>
        </a>
    </li>

<?php endif; ?>