<?php

use Master_leave_model as MLM;
use Preset_leave_model as PLM;
use Config_leave_model as CLM;
use Staff_leave_model as SLM;

class Leave extends Controller
{
    public function index()
    {
        redirect('settings/leave');
    }

    public function userLeave()
    {
        $data = [
            'title' => 'My Leave',
            'currentSidebar' => 'leave',
            'currentSubSidebar' => 'user_leave',
            'userID' => session()->get('userID'),
        ];

        render('leave/userLeave_list', $data);
    }

    public function getListDt()
    {
        echo $this->MLM->getlist();
    }

    public function getListByUserIDDt()
    {
        echo $this->SLM->getlistByUserID(escape($_POST['id']));
    }

    public function getPresetListDt()
    {
        echo $this->PLM->getlist();
    }

    public function getLeaveByID()
    {
        json(MLM::find($_POST['id']));
    }

    public function getPresetByID()
    {
        json(PLM::find($_POST['id']));
    }

    public function getLeaveByUserID()
    {
        json(MLM::where(['user' => $_POST['id']]));
    }

    public function getListPreset()
    {
        $data = PLM::all();
        $selected = NULL;

        echo '<option value=""> - Select - </option>';
        foreach ($data as $row) {
            $selected = ($row['preset_leave_id'] == $_POST['id']) ? 'selected' : '';
            echo '<option value="' . $row['preset_leave_id'] . '"" ' . $selected . '> ' . $row['preset_name'] . '</option>';
        }
    }

    public function getListConfigByUserID()
    {
        $userID = session()->get('userID');
        $data = $this->CLM->getConfigByUserID($userID);

        echo '<option value=""> - Select - </option>';
        foreach ($data as $row) {
            echo '<option value="' . $row['config_leave_id'] . '""> ' . $row['leave_name'] . ' | ' . $row['leave_duration'] . ' remaining</option>';
        }
    }

    public function getLeaveListTD()
    {
        $data = MLM::all();

        foreach ($data as $key => $row) {
            $leave_id = $row['leave_id'];
            $leave_name = $row['leave_name'];

            $leave_duration = '';
            if (isset($_POST['id'])) {
                $ids = explode(",", $_POST['id']);
                $durations = explode(",", $_POST['duration']);
                $durationKey = array_search($leave_id, $ids);
                $leave_duration = ($durationKey === false) ? '' : $durations[$durationKey];
            }

            $checked = NULL;
            $readonly = 'readonly';
            if (!empty($ids)) {
                if (in_array($leave_id, $ids)) {
                    $checked = 'checked';
                    $readonly = ($checked) ? NULL : 'readonly';
                }
            }

            echo "<tr>
                    <td> <input type='checkbox' class='form-check-input' name='leave_id[]' onchange='inputRead(this, " . $leave_id . ")' value='$leave_id' $checked></td>   
                    <td> $leave_name </td>   
                    <td> <input type='number' name='leave_duration[]' id='duration" . $leave_id . "'' class='form-control' min='0.5' step ='.5' value='$leave_duration' $readonly></td>   
                </tr>";
        }
    }

    public function create()
    {
        $data = MLM::insert($_POST); // call static function
        json($data);
    }

    public function presetSave()
    {
        $leave_durationArr = array_filter($_POST['leave_duration'], 'strlen');
        $data = PLM::save(
            [
                'preset_leave_id' => $_POST['preset_leave_id'],
                'preset_name' => $_POST['preset_name'],
                'leave_id_array' =>  implode(",", $_POST['leave_id']),
                'leave_duration_array' =>  implode(",", $leave_durationArr),
                'role_id' => $_POST['role_id'],
            ]
        );
        json($data);
    }

    public function userLeaveSave()
    {var_dump($_POST);die;
        $date_from = new DateTime($_POST['leave_date_from']);
        $date_to = new DateTime($_POST['leave_date_to']);
        $interval = $date_from->modify("-1 day")->diff($date_to);
        $days = $interval->format('%a');

        $data = SLM::save(
            [
                'staff_leave_id' => $_POST['staff_leave_id'],
                'config_leave_id' => $_POST['config_leave_id'],
                'leave_date_from' =>  $_POST['leave_date_from'],
                'leave_date_to' =>  $_POST['leave_date_to'],
                'leave_duration' =>  $days,
                'leave_description' => $_POST['leave_description'],
                'leave_status' => '0',
                'user_id' => session()->get('userID'),
            ]
        );
        json($data);
    }

    public function update()
    {
        $data = MLM::update($_POST); // call static function
        json($data);
    }

    public function delete()
    {
        $data = MLM::delete($_POST['id']); // call static function
        json($data);
    }

    public function deletePreset()
    {
        $data = PLM::delete($_POST['id']); // call static function
        json($data);
    }
}


/* 

 Q&A SECTION

 Q : What is static function / method ?
 A : A static function is a member function of a class that can be called even when an object of the class is not initialized.

 Q : How to call or access static function @ method ?
 A : Just use '::' without ' to call static function. 
     Example : users::find($id). users is alias that has been declare on top of controller file using 'use'

 Q : How to call normal or non-static function @ method in model ?
 A : Just use '$this->' without ' to call a non-static function from model. 
     Example : $this->users->getUserByID($id). users is alias that has been declare on top of controller file using 'use'

SIMPLE DOCUMENTATION

STATIC METHOD / FUNCTION AVAILABLE (USE ONLY IN CONTROLLER)
    1) all()
    2) find($value, $columnName)
    3) findOrFail($value)
    4) where($arrayCondition, $type) - $type is 'get' OR 'fetchRow'
    5) orWhere($arrayCondition, $type) - $type is 'get' OR 'fetchRow'
    6) first()
    7) last()
    8) save($array)
    9) insert($array)
    10) updateOrInsert($array)
    11) update($array)
    12) delete($value, $columnName)

Notes : 
 - for more global function please go to folder 
     1) system/core/Model.php 
     2) system/CanThink - all files

 Reminder :
 - Please avoid using save name as static method@function in MODEL (folder app/models). Controller is fine to redeclare same function name.
       
*/