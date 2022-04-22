<?php

use Master_role_model as Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->_createDefaultRole();
    }

    protected function _createDefaultRole()
    {
        $roles = $this->_dataSeed();

        foreach ($roles as $id => $role) {
            Role::save([
                'role_id' => $id,
                'role_name' => $role['name'],
            ]);
        }

        $class = get_class($this);

        echo "<b style='color:red'><i>{$class}</i></b> running succesfully <br>";
    }

    public function _dataSeed()
    {
        return [
            1 => ['name' => 'System Administrator'],
            2 => ['name' => 'Administrator'],
            3 => ['name' => 'Supervisor'],
            4 => ['name' => 'Staff'],
        ];
    }
}
