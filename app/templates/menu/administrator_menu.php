<!-- Only for admin -->

<?php if (session()->get('roleID') == 2) : ?>
    <li>
        <a href="#user" data-bs-toggle="collapse">
            <i class="mdi mdi-account"></i>
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

<?php endif; ?>