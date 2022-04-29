<?php

use Master_runningno_model as RM;

class RunningNoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->_createDefaultRunningNo();
    }

    protected function _createDefaultRunningNo()
    {
        $runNo = $this->_dataSeed();

        foreach ($runNo as $id => $run) {
            RM::save([
                'run_id' => $id,
                'run_prefix' => $run['prefix'],
                'run_suffix' => $run['suffix'],
                'run_type' => $run['type'],
                'run_zerodigit' => $run['zero'],
                'run_currentno' => $run['no'],
            ]);
        }

        $class = get_class($this);

        echo "<b style='color:red'><i>{$class}</i></b> running succesfully <br>";
    }

    public function _dataSeed()
    {
        return [
            1 => [
                'prefix' => 'NZ',
                'suffix' => NULL,
                'type' => '1',
                'zero' => '5',
                'no' => '0',
            ],
            2 => [
                'prefix' => 'NZ|LV|2022',
                'suffix' => NULL,
                'type' => '2',
                'zero' => '5',
                'no' => '0',
            ],
        ];
    }
}
