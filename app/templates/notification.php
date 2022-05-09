<li class="dropdown notification-list topbar-dropdown">
    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <i class="fe-bell noti-icon"></i>
        <span id="countUnreadNoti" class="badge bg-danger rounded-circle noti-icon-badge">0</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

        <div class="dropdown-item noti-title">
            <h5 class="m-0">
                <span class="float-end">
                    <a href="javascript:void(0)" onclick="markAllRead()" class="text-dark">
                        <small>Clear All</small>
                    </a>
                </span>Notification
            </h5>
        </div>

        <div id="listnotification" class="noti-scroll" data-simplebar>
            
        </div>

        <!-- All-->
        <a href="{{ url('notification') }}" class="dropdown-item text-center text-primary notify-item notify-all">
            View all
            <i class="fe-arrow-right"></i>
        </a>
    </div>
</li>