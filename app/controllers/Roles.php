<?php

use Master_role_model as Role;

class Roles extends Controller
{
    public function index()
    {
        redirect('management/role'); // redirect to page settings role
    }

    public function getListDt()
    {
        echo $this->Role->getlist();
    }

    public function getRoleByID()
    {
        json(Role::find($_POST['id']));
    }

    public function create()
    {
        $data = Role::insert($_POST); // call static function
        json($data);
    }

    public function update()
    {
        $data = Role::update($_POST); // call static function
        json($data);
    }

    public function delete()
    {
        $data = Role::delete($_POST['id']); // call static function
        json($data);
    }

    public function getListSelect()
    {
        $data = $this->Role->getAllRole();
        $selected = NULL;

        echo '<option value=""> - Select - </option>';
        foreach ($data as $row) {
            $selected = ($row['role_id'] == escape($_POST['id'])) ? 'selected' : '';
            echo '<option value="' . $row['role_id'] . '"" ' . $selected . '> ' . $row['role_name'] . '</option>';
        }
    }
}
