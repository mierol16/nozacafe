<?php

use Master_leave_model as MLM;
use Preset_leave_model as PLM;
use Config_leave_model as CLM;
use Staff_leave_model as SLM;
use User_model as Users;
use Notification_model as Noti;
use Master_runningno_model as RunningNo;

class Leave extends Controller
{
    public function index()
    {
        redirect('settings/leave');
    }

    public function all()
    {
        $data = [
            'title' => 'All Leave',
            'currentSidebar' => 'leave',
            'currentSubSidebar' => 'allLeave',
        ];

        render('leave/all_list', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'New Leave',
            'currentSidebar' => 'leave',
            'currentSubSidebar' => 'new',
        ];

        render('leave/new_list', $data);
    }

    public function approve()
    {
        $data = [
            'title' => 'Approved Leave',
            'currentSidebar' => 'leave',
            'currentSubSidebar' => 'approve',
        ];

        render('leave/approve_list', $data);
    }

    public function reject()
    {
        $data = [
            'title' => 'Rejected Leave',
            'currentSidebar' => 'leave',
            'currentSubSidebar' => 'reject',
        ];

        render('leave/reject_list', $data);
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

    public function getListAllDt()
    {
        echo $this->SLM->getlist();
    }

    public function getListNewDt()
    {
        echo $this->SLM->getlist(1);
    }

    public function getListApproveDt()
    {
        echo $this->SLM->getlist(2);
    }

    public function getListrejectDt()
    {
        echo $this->SLM->getlist(3);
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

    public function getLeaveDetailByID()
    {
        json($this->SLM->getDetailByID($_POST['id']));
    }

    public function countDayLeave()
    {
        $date_from = (isset($_POST['leave_date_from'])) ? new DateTime($_POST['leave_date_from']) : null;
        $date_to = (isset($_POST['leave_date_to'])) ? new DateTime($_POST['leave_date_to']) : null;
        $interval = $date_from->modify("-1 day")->diff($date_to);
        $days = $interval->format('%a');

        $pendingLv = SLM::where(['config_leave_id' => $_POST['config_leave_id'], 'user_id' => $_POST['user_id'], 'leave_status' => '1']);
        $leaveConfig = CLM::find($_POST['config_leave_id']);

        $noOfDays = $bal = 0;

        if (count($pendingLv) > 0) {
            foreach ($pendingLv as $row) {
                $noOfDays += $row['leave_duration'];
            }
        }

        $bal = $leaveConfig['preset_duration'] - $noOfDays;

        $data = [
            'days' => $days,
            'balance' => $bal,
        ];

        json($data);
    }

    public function countBalLeave()
    {
        $pendingLv = SLM::where(['config_leave_id' => $_POST['config_leave_id'], 'user_id' => $_POST['user_id'], 'leave_status' => '1']);
        $leaveConfig = CLM::find($_POST['config_leave_id']);

        $noOfDays = $bal = 0;

        if (count($pendingLv) > 0) {
            foreach ($pendingLv as $row) {
                $noOfDays += $row['leave_duration'];
            }
        }

        $bal = $leaveConfig['preset_duration'] - $noOfDays;

        json($bal);
    }

    public function countLeave()
    {
        $data = [
            'new' => $this->SLM->countLve(1),
            'reject' => $this->SLM->countLve(3),
            'approve' => $this->SLM->countLve(2)
        ];

        json($data);
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
            echo '<option value="' . $row['config_leave_id'] . '""> ' . $row['leave_name'] . ' </option>';
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

    public function getDisplayTblListPreset()
    {
        $data = PLM::find($_POST['id']);

        $leaveidArr = $data['leave_id_array'];
        $leaveValueArr = $data['leave_duration_array'];

        echo '<table class="table table-bordered table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th> Leave Name </th>
                            <th> Total Leave </th>
                            <th> Carry Forward </th>
                        </tr>
                    </thead>
                    <tbody>';

        $ids = explode(",", $leaveidArr);
        $durations = explode(",", $leaveValueArr);

        foreach ($ids as $key => $leaveid) {

            $leave_duration = $durations[$key];
            $leave = MLM::find($leaveid);
            $leaveName = $leave['leave_name'];
            $leaveCarry = $leave['leave_carry'];

            echo '<tr>
                    <td> ' . $leaveName . '</td>
                    <td> ' . $leave_duration . '</td>
                    <td> ' . $leaveCarry . '</td>
                </tr>';
        }

        echo '<tbody>
            </table>';
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
    {
        $date_from = new DateTime($_POST['leave_date_from']);
        $date_to = new DateTime($_POST['leave_date_to']);
        $interval = $date_from->modify("-1 day")->diff($date_to);
        $days = $interval->format('%a');

        $leave_no = $this->RunningNo->generateLeaveNo();

        $data = SLM::save(
            [
                'staff_leave_id' => $_POST['staff_leave_id'],
                'config_leave_id' => $_POST['config_leave_id'],
                'leave_no' => $leave_no,
                'leave_date_from' =>  $_POST['leave_date_from'],
                'leave_date_to' =>  $_POST['leave_date_to'],
                'leave_duration' =>  $days,
                'leave_comment' => $_POST['leave_comment'],
                'leave_status' => '1',
                'user_id' => session()->get('userID'),
            ]
        );

        // Add notification
        if ($data['resCode'] == 200) {
            $this->RunningNo->updateLeaveNo();
            $users = Users::find($data['data']['user_id']);
            $getAdmissionAcc = Users::where(['role_id' => '2']);
    
            if (count($getAdmissionAcc) > 0) {
                foreach ($getAdmissionAcc as $noti) {
                    Noti::save(
                        [
                            'noti_type' => '1',
                            'noti_text' => 'New Leave Application from ' . $users['user_fullname'],
                            'noti_redirect' => url('leave/new'),
                            'noti_status' => '0',
                            'user_id' => $noti['user_id'],
                            'user_preferred_name' => $users['user_preferred_name'],
                        ]
                    );
                }
            }
        }

        json($data);
    }

    public function approveLeave()
    {
        $data = SLM::save(
            [
                'staff_leave_id' => $_POST['staff_leave_id'],
                'leave_remark' => $_POST['leave_remark'],
                'leave_status' => $_POST['leave_status'],
            ]
        );

        if ($data['resCode'] == 200) {
            $userLeave = SLM::find($_POST['staff_leave_id']);
            $leaveConfig = CLM::where(['config_leave_id' => $userLeave['config_leave_id'], 'user_id' => $_POST['user_id']], 'fetchRow');
            $getAdmin = Users::find(session()->get('userID'));
    
            $balance = $leaveConfig['preset_duration'] - $userLeave['leave_duration'];
    
            CLM::save(
                [
                    'config_leave_id' => $leaveConfig['config_leave_id'],
                    'preset_duration' => $balance,
                ]
            );

            Noti::save(
                [
                    'noti_type' => '1',
                    'noti_text' => 'Your leave no ' . $userLeave['leave_no'] . ' has been approved by' . $getAdmin['user_fullname'],
                    'noti_redirect' => url('leave/userLeave'),
                    'noti_status' => '0',
                    'user_id' => $_POST['user_id'],
                    'user_preferred_name' => $getAdmin['user_preferred_name'],
                ]
            );
        }

        json($data);
    }

    public function rejectLeave()
    {
        $data = SLM::save(
            [
                'staff_leave_id' => $_POST['staff_leave_id'],
                'leave_remark' => $_POST['leave_remark'],
                'leave_status' => $_POST['leave_status'],
            ]
        );

        if ($data['resCode'] == 200) {
            $userLeave = SLM::find($_POST['staff_leave_id']);
            $getAdmin = Users::find(session()->get('userID'));

            Noti::save(
                [
                    'noti_type' => '1',
                    'noti_text' => 'Your leave no ' . $userLeave['leave_no'] . ' has been reject by' . $getAdmin['user_fullname'],
                    'noti_redirect' => url('leave/userLeave'),
                    'noti_status' => '0',
                    'user_id' => $_POST['user_id'],
                    'user_preferred_name' => $getAdmin['user_preferred_name'],
                ]
            );
        }

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

    public function cancelLeave()
    {
        $data = SLM::delete($_POST['id']); // call static function
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