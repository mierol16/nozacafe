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

<?php endif; ?>