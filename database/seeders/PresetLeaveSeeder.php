<?php

use Preset_leave_model as Preset;

class PresetLeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->_createDefaultPreset();
    }

    protected function _createDefaultPreset()
    {
        $preset = $this->_dataSeed();

        foreach ($preset as $id => $pre) {
            Preset::save([
                'preset_leave_id' => $id,
                'preset_name' => $pre['name'],
                'leave_id_array' => $pre['leave_arr'],
                'leave_duration_array' => $pre['duration_arr'],
                'role_id' => $pre['role']
            ]);
        }

        $class = get_class($this);

        echo "<b style='color:red'><i>{$class}</i></b> running succesfully <br>";
    }

    public function _dataSeed()
    {
        return [
            1 => ['name' => 'STAFF', 'leave_arr' => '1', 'duration_arr' => '16', 'role' => '3'],
            2 => ['name' => 'PROBATION STAFF', 'leave_arr' => '1', 'duration_arr' => '9', 'role' => '3'],
        ];
    }
}
