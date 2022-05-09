<!-- Only for staff -->

<?php if (session()->get('roleID') == 3) : ?>
    <li class="menuitem-<?= ($currentSubSidebar == 'profile') ? 'active' : '' ?>">
        <a href="{{ url('user/profile') }}">
            <i class="mdi mdi-account"></i>
            <span>My Profile</span>
        </a>
    </li>

    <li class="menuitem-<?= ($currentSubSidebar == 'user_leave') ? 'active' : '' ?>">
        <a href="{{ url('leave/userLeave') }}">
            <i class="mdi mdi-calendar-account"></i>
            <span>My Leave</span>
        </a>
    </li>

<?php endif; ?>