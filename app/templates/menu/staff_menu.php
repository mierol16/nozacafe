<!-- Only for staff -->

<?php if (session()->get('roleID') == 4) : ?>
    <li class="menuitem-<?= ($currentSubSidebar == 'profile') ? 'active' : '' ?>">
        <i class="mdi mdi-account"></i>
        <a href="{{ url('user/profile') }}">My Profile</a>
    </li>

<?php endif; ?>