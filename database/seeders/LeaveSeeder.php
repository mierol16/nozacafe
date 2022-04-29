<?php

use Master_leave_model as MLM;

class LeaveSeeder extends Seeder
{
    /**
     * leave the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->_createDefaultMasterLeave();
    }

    protected function _createDefaultMasterLeave()
    {
        $leaves = $this->_dataSeed();

        foreach ($leaves as $id => $leave) {
            MLM::save([
                'leave_id' => $id,
                'leave_name' => $leave['name'],
                'leave_description' => $leave['desc'],
                'leave_carry' => $leave['carry'],
            ]);
        }

        $class = get_class($this);

        echo "<b style='color:red'><i>{$class}</i></b> leavening succesfully <br>";
    }

    public function _dataSeed()
    {
        return [
            1 => [
                'name' => 'Annual Leave',
                'desc' => 'compulsory leave for employee annually',
                'carry' => '9',
            ],
        ];
    }
}
