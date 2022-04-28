<?php

use Master_leave_model as MLM;
use Preset_leave_model as PLM;

class Leave extends Controller
{
    public function index()
    {
        redirect('settings/leave');
    }

    public function getListDt()
    {
        echo $this->MLM->getlist();
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

    public function getLeaveListTD()
    {
        $data = $this->MLM->getAllLeave();

        $ids = (isset($_POST['id'])) ? explode(",", $_POST['id']) : '';

        foreach ($data as $row) {
            $leave_id = $row['leave_id'];
            $leave_name = $row['leave_name'];

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
                    <td> <input type='number' name='leave_duration[]' id='duration" . $leave_id . "'' class='form-control' min='0' step ='.5' value='' $readonly></td>   
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
        $data = PLM::updateOrInsert(
            [
                'preset_leave_id' => $_POST['preset_leave_id'],
                'preset_name' => $_POST['preset_name'],
                'leave_id_array' =>  implode(",", $_POST['leave_id']),
                'leave_duration_array' =>  implode(",", $_POST['leave_duration']),
                'role_id' => $_POST['role_id'],
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