<!-- Only for supervisor -->

<?php if (session()->get('roleID') == 3) : ?>
    <li class="menuitem-<?= ($currentSubSidebar == 'staff') ? 'active' : '' ?>">
        <i class="mdi mdi-account"></i>
        <a href="{{ url('user/staff') }}">Staff</a>
    </li>

<?php endif; ?>