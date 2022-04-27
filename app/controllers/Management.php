<?php

use Master_role_model as MR;

class Management extends Controller
{
    public function index()
    {
        error('404');
    }

    public function role()
    {
        $data = [
            'title' => 'Roles',
            'currentSidebar' => 'role',
            'currentSubSidebar' => NULL
        ];

        render('management/roles_list', $data);
    }

    public function roleSave()
    {
        $data = MR::save($_POST); // call static function
        json($data);
    }
}
