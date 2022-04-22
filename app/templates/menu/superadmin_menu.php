<!-- Only for superadmin -->

<?php if (session()->get('roleID') == 1) : ?>
    <li>
        <a href="#user" data-bs-toggle="collapse">
            <i class="mdi mdi-account"></i>
            <span> Users </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse <?= ($currentSidebar == 'user') ? 'show' : '' ?>" id="user">
            <ul class="nav-second-level">
                <li class="menuitem-<?= ($currentSubSidebar == 'supervisor') ? 'active' : '' ?>">
                    <a href="{{ url('user/supervisor') }}">Supervisor</a>
                </li>
                <li class="menuitem-<?= ($currentSubSidebar == 'staff') ? 'active' : '' ?>">
                    <a href="{{ url('user/staff') }}">Staff</a>
                </li>
            </ul>
        </div>
    </li>

<?php endif; ?>