<?php

use User_model as Users;
use Performance_model as PR;

class Performance extends Controller
{
    public function index()
    {
        error('404');
    }

    public function record()
    {
        $data = [
            'title' => 'Performance Record',
            'currentSidebar' => 'performance',
            'currentSubSidebar' => 'performance'
        ];

        render('performance/record_list', $data);
    }

    public function userRecord()
    {
        $data = [
            'title' => 'Performance Record',
            'currentSidebar' => 'performance',
            'currentSubSidebar' => 'performance',
            'userID' => session()->get('userID'),
        ];

        render('performance/user_record', $data);
    }

    public function getPerformanceById()
    {
        $data = $this->PR->getDataById(escape($_POST['id']));

        json($data);
    }

    public function save()
    {
        $userID = (isset($_POST['staff_user'])) ? escape($_POST['staff_user']) : NULL;

        // save performance
        $data = PR::save([
            'performance_id' => $_POST['performance_id'],
            'user_id' => $userID,
            'performance_date' => date('Y-m-d'),
            'performance_year' => date('Y'),
            'attendance_mark' => $_POST['attendance_mark'],
            'cooperation_mark' => $_POST['cooperation_mark'],
            'responsibility_mark' => $_POST['responsibility_mark'],
            'behavior_mark' => $_POST['behavior_mark'],
            'trust_mark' => $_POST['trust_mark'],
            'total_mark' => $_POST['total_mark'],
            'performance_gred' => $_POST['performance_gred'],
            'performance_status' => '0',
            'performance_comment' => $_POST['performance_comment'],
            'performance_admin_remark' => $_POST['performance_admin_remark'],
            'admin_remark_date' => $_POST['admin_remark_date'],
        ]);

        json($data);
    }

    public function approveSave()
    {
        // save performance
        $data = PR::save([
            'performance_id' => $_POST['performance_id'],
            'performance_status' => '1',
            'performance_staff_remark' => $_POST['performance_staff_remark'],
            'staff_remark_date' => $_POST['staff_remark_date'],
        ]);

        json($data);
    }

    public function getPerformanceListDt()
    {
        $year = (isset($_POST['year'])) ? $_POST['year'] : date('Y');

        return $this->PR->getlist($year, $_POST['userID']);
    }

    public function getSelectYear()
    {
        $current = date('Y');
        $data = $this->PR->getYear();

        if (count($data) > 0) {
            $year = $data;
        } else {
            $default = [
                'performance_year' => date('Y'),
            ];

            array_push($data, $default);
            $year = $data;
        }

        echo '<option value=""> - Select - </option>';
        foreach ($year as $row) {
            $select = ($row['performance_year'] == $current) ? 'selected' : '';
            echo '<option value="' . $row['performance_year'] . '"' . $select . '> ' . $row['performance_year'] . '</option>';
        }
    }

    public function getSelectUser()
    {
        
        $data = users::where(['role_id' => '3']);
        
        echo '<option value=""> - Select - </option>';
        foreach ($data as $row) {
            
            $dataEval = PR::where(['user_id' => $row['user_id'], 'performance_year' => date('Y')], 'fetchRow');

            if (empty($dataEval)) {
                echo '<option value="' . $row['user_id'] . '"> ' . $row['user_fullname'] . '</option>';
            }
        }
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