<?php

class Dashboard extends Controller
{
    public function index()
    {
        $roleID = session()->get('roleID');

        if ($roleID == 1) {
            $page = 'superadmin';
        } else if ($roleID == 2) {
            $page = 'administrator';
        } else if ($roleID == 3) {
            $page = 'staff';
        } else {
            error('404');
        }

        $data = [
            'title' => 'Dashboard',
            'currentSidebar' => 'dashboard',
            'currentSubSidebar' => NULL,
            'userID' => session()->get('userID'),
        ];

        render('dashboard/' . $page, $data);
    }
}
