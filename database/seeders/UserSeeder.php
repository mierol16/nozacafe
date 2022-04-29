<?php

use User_model as Users;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->_createDefaultUser();
    }

    protected function _createDefaultUser()
    {
        $users = $this->_dataSeed();

        foreach ($users as $id => $user) {
            Users::save([
                'user_id' => $id,
                'user_fullname' => $user['name'],
                'user_preferred_name' => $user['nickname'],
                'user_email' => $user['email'],
                'user_avatar' => 'default/user.png',
                'user_status' => '1',
                'user_username' => $user['username'],
                'user_gender' => $user['gender'],
                'user_contact_no' => $user['contact'],
                'user_address' => $user['address'],
                'user_postcode' => $user['postcode'],
                'user_city' => $user['city'],
                'user_state' => $user['state'],
                'role_id' => $user['role'],
                'user_password' => password_hash('password', PASSWORD_DEFAULT)
            ]);
        }

        $class = get_class($this);

        echo "<b style='color:red'><i>{$class}</i></b> running succesfully <br>";
    }

    public function _dataSeed()
    {
        return [
            1 => [
                'name' => 'Super Administrator',
                'nickname' => 'Superadmin',
                'email' => 'sysadmin@developer.com',
                'username' => 'superadmin',
                'gender' => 'Male',
                'contact' => '0',
                'address' => '0',
                'postcode' => '0',
                'city' => '0',
                'state' => '0',
                'role' => '1',
            ],
            2 => [
                'name' => 'Administrator',
                'nickname' => 'Administrator',
                'email' => 'admincafe@nozacafe.com',
                'username' => 'admin',
                'gender' => 'Male',
                'contact' => '0',
                'address' => '0',
                'postcode' => '0',
                'city' => '0',
                'state' => '0',
                'role' => '2',
            ],
        ];
    }
}
