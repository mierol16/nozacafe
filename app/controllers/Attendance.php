<?php

use User_model as Users;
use Attendance_model as AT;

class Attendance extends Controller
{
    public function index()
    {
        error('404');
    }

    public function record()
    {
        $data = [
            'title' => 'Attendance Record',
            'currentSidebar' => 'attendance',
            'currentSubSidebar' => 'attendance'
        ];

        render('attendance/record_list', $data);
    }

    public function userRecord()
    {
        $data = [
            'title' => 'Attendance Record',
            'currentSidebar' => 'attendance',
            'currentSubSidebar' => 'attendance',
            'userID' => session()->get('userID'),
        ];

        render('attendance/user_record', $data);
    }

    public function recordAttendance()
    {
        $userID = (isset($_POST['userID'])) ? escape($_POST['userID']) : NULL;
        $userNo = escape($_POST['userNo']);
        $status = escape($_POST['attendance_status']);

        if (empty($userID)) {
            $dataUser = Users::find($userNo, 'user_no');
        }

        if (!empty($dataUser)) {

            $userID = $dataUser['user_id'];

            $dataAtt = AT::where(['user_id' => $userID, 'attendance_date' => date('Y-m-d')], 'fetchRow');

            if (!empty($dataAtt)) {

                if (date('H') >= 22) {

                    $att = AT::save([
                        'attendance_id' => $dataAtt['attendance_id'],
                        'attendance_time_out' => date('H:i:s'),
                    ]);
                } else {
                    $att = [
                        'resCode' => 500,
                        'message' => 'Already clock in',
                    ];
                }
            } else {
                // save attendance
                $att = AT::save([
                    'attendance_id' => '',
                    'user_id' => $userID,
                    'attendance_date' => date('Y-m-d'),
                    'attendance_time_in' => date('H:i:s'),
                    'attendance_day' => date('l'),
                    'attendance_month' => date('m'),
                    'attendance_year' => date('Y'),
                    'attendance_status' => $status,
                    'attendance_remark' => '',
                ]);
            }
        } else {
            $att = [
                'resCode' => 500,
                'message' => 'Employee not found',
            ];
        }

        json($att);
    }

    public function getAttendanceListDt()
    {
        $month = (isset($_POST['month'])) ? $_POST['month'] : date('m');
        $year = (isset($_POST['year'])) ? $_POST['year'] : date('Y');

        return $this->AT->getlist($year, $month, $_POST['userID']);
    }

    public function getAttendanceList()
    {
        $month = (isset($_POST['month'])) ? $_POST['month'] : date('m');
        $year = (isset($_POST['year'])) ? $_POST['year'] : date('Y');

        $data = $this->AT->getlistTable($year, $month, $_POST['userID']);

        foreach ($data as $row) {
            $timeOut = ($row['attendance_time_out'] != NULL) ? date('h:i A', strtotime($row['attendance_time_out'])) : '-';

            if (!empty($row['user_fullname'])) {
                echo '<tr>
                    <td>' . $row['user_fullname'] . '<br>' . $row['user_nric'] . '</td>
                    <td><center>' . date('d/m/Y', strtotime($row['attendance_date'])) . '</center></td>
                    <td><center>' . date('h:i A', strtotime($row['attendance_time_in'])) . '</center></td>
                    <td><center>' . $timeOut . '</center></td>
                </tr>';
            }
        }
    }

    public function getSelectYear()
    {
        $current = date('Y');
        $data = $this->AT->getYear();

        if (count($data) > 0) {
            $year = $data;
        } else {
            $default = [
                'attendance_year' => date('Y'),
            ];

            array_push($data, $default);
            $year = $data;
        }

        echo '<option value=""> - Select - </option>';
        foreach ($year as $row) {
            $select = ($row['attendance_year'] == $current) ? 'selected' : '';
            echo '<option value="' . $row['attendance_year'] . '"' . $select . '> ' . $row['attendance_year'] . '</option>';
        }
    }

    public function getAttendanceByUser()
    {
        $data = AT::where(['user_id' => $_POST['id'], 'attendance_date' => date('Y-m-d')], 'fetchRow');

        $timeIn = '-';
        $timeOut = '-';
        $status = '<h4 class="m-0"><span class="badge bg-secondary">No record</span></h4>';

        if (!empty($data)) {

            $timeIn = date("h:i a", strtotime($data['attendance_time_in']));
            $timeOut = (!empty($data['attendance_time_out'])) ? date("h:i a", strtotime($data['attendance_time_out'])) : '-';

            if ($data['attendance_status'] == 1) {
                $status = '<h4 class="m-0"><span class="badge bg-success">Present</span></h4>';
            } else if ($data['attendance_status'] == 2) {
                $status = '<h4 class="m-0"><span class="badge bg-danger">Absent</span></h4>';
            } else {
                $status = '<h4 class="m-0"><span class="badge bg-secondary">No record</span></h4>';
            }
        }

        echo "<tr>
                <td width='75%'>
                    Date : <span> " . date('d/m/Y') . " </span> <br>
                    Time In: <span> " . $timeIn . " </span> <br>
                    Time Out: <span> " . $timeOut . " </span>
                </td>
                <td width='25%'>
                    <center>
                        " . $status . "
                    </center>
                </td>
            </tr>";
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