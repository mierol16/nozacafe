<?php

use User_model as users;
use Education_info_model as Edu;
use Contact_info_model as Contact;
use Files_model as Files;
use Config_leave_model as CLM;
use Preset_leave_model as PLM;
use Master_runningno_model as RunningNo;

class User extends Controller
{
    public function index()
    {
        error('404'); // redirect to page error 404
    }

    // admin list 
    public function admin()
    {
        $data = [
            'title' => 'Administrator List',
            'currentSidebar' => 'user',
            'currentSubSidebar' => 'admin',
        ];

        render('user/admin_list', $data);
    }

    public function employee()
    {
        $data = [
            'title' => 'Employee List',
            'currentSidebar' => 'user',
            'currentSubSidebar' => 'staff',
        ];

        render('user/staff_list', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'My Profile',
            'currentSidebar' => 'profile',
            'currentSubSidebar' => 'profile',
            'userID' => session()->get('userID'),
        ];

        render('profile/personal', $data);
    }

    public function adminView($adminEncodeID = null)
    {
        if (!empty($adminEncodeID)) {
            $data = [
                'title' => 'Administrator Details',
                'currentSidebar' => 'user',
                'currentSubSidebar' => 'admin',
                'userID' => decodeID($adminEncodeID),
            ];

            render('profile/personal', $data);
        } else {
            redirect('user/admin');
        }
    }

    public function staffView($staffEncodeID = null)
    {
        if (!empty($staffEncodeID)) {
            $data = [
                'title' => 'Employee Details',
                'currentSidebar' => 'user',
                'currentSubSidebar' => 'staff',
                'userID' => decodeID($staffEncodeID),
            ];

            render('profile/personal', $data);
        } else {
            redirect('user/employee');
        }
    }

    public function getAll()
    {
        json(users::all());
    }

    public function getListAdminDt()
    {
        echo $this->users->listAdmin();
    }

    public function getListStaffDt()
    {
        echo $this->users->listStaff();
    }

    public function getUsersByID()
    {
        $data = users::find($_POST['id'], NULL, ['qrcode', 'education', 'files', 'education.files', 'contact', 'leave']);
        json($data);
    }

    public function create()
    {
        $data = users::insert($_POST); // call static function
        json($data);
    }

    public function update()
    {
        $data = users::update($_POST); // call static function
        json($data);
    }

    public function save()
    {
        if (isset($_POST['user_password'])) {
            $_POST['user_password'] = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
        } else {
            $_POST['user_password'] = password_hash($_POST['user_nric'], PASSWORD_DEFAULT);
        }

        $data = users::updateOrInsert($_POST); // call static function
        json($data);
    }

    public function register()
    {
        $generateQrCode = false;
        if ($_POST['user_id'] == '') {

            $user_no = $this->RunningNo->generateEmployeeNo();
            // $user_qrcode = generateQR($user_no, $folderQR);

            $_POST['user_password'] = password_hash($_POST['user_nric'], PASSWORD_DEFAULT);
            $_POST['user_no'] = $user_no;
            $generateQrCode = true;
        }

        $data = users::save($_POST); // call static function

        if (isset($data['resCode']) == 200) {

            // update user running no
            $this->RunningNo->updateEmployeeNo();

            $userID = $data['id'];

            if ($generateQrCode) {

                // generate folder for qr
                $folderQR = folder('directory', $_POST['user_fullname'], 'qrcode');

                //generate QR Code
                $qrCode = generateQR($user_no, $folderQR);

                // move qr code to specific folder
                $moveQr = moveFile(
                    $qrCode['qrFilename'],
                    $qrCode['qrPath'],
                    $folderQR,
                    [
                        'type' => 'User_model',
                        'file_type' => 'QR_CODE',
                        'entity_id' => $userID,
                        'user_id' => $userID,
                    ],
                );

                if (!empty($moveQr)) {
                    Files::save($moveQr);
                }
            }

            // register contact person
            if (isset($_POST['contact_name'])) {
                foreach ($_POST['contact_name'] as $key => $level) {
                    $contact = Contact::save(
                        [
                            'contact_id' => $_POST['contact_id'][$key],
                            'contact_name' => $_POST['contact_name'][$key],
                            'contact_relation' => $_POST['contact_relation'][$key],
                            'contact_phone_1' => $_POST['contact_phone_1'][$key],
                            'contact_phone_2' => $_POST['contact_phone_2'][$key],
                            'user_id' => $userID,
                        ]
                    );
                }
            }

            // register leave
            if (isset($_POST['leave_preset'])) {
                $preset = PLM::find($_POST['leave_preset']);
                $leave_id = explode(",", $preset['leave_id_array']);
                $duration = explode(",", $preset['leave_duration_array']);

                foreach ($leave_id as $key => $value) {
                    $leave = CLM::save(
                        [
                            'config_leave_id' => $_POST['config_leave_id'],
                            'leave_id' => $value,
                            'preset_id' => $_POST['leave_preset'],
                            'leave_duration' => $duration[$key],
                            'leave_year' => date('Y'),
                            'user_id' => $userID,
                        ]
                    );
                }
            }

            // register education
            if (isset($_POST['education_level'])) {
                foreach ($_POST['education_level'] as $key => $edu) {
                    $education = Edu::save(
                        [
                            'education_id' => $_POST['education_id'][$key],
                            'education_level' => $_POST['education_level'][$key],
                            'education_course' => $_POST['education_course'][$key],
                            'education_university' => $_POST['education_university'][$key],
                            'user_id' => $userID,
                        ]
                    );

                    if (isset($_FILES['education_file']['name'][$key])) {

                        $files = $_FILES['education_file'];
                        $folderEdu = folder('directory', $_POST['user_fullname'], 'certificate');

                        $dataFolder = [
                            'type' => 'Education_info_model',
                            'file_type' => 'CERTIFICATE',
                            'entity_id' => $education['id'],
                            'user_id' => $userID,
                        ];

                        $upload = upload($files, $folderEdu, $dataFolder, $key, true);

                        if (!empty($upload)) {
                            Files::save($upload);
                        }
                    }
                }
            }
        }

        json($data);
    }

    public function delete()
    {
        $data = users::delete($_POST['id']); // call static function
        json($data);
    }

    public function uploadProfile()
    {
        $data = $this->users->upload_save($_POST);

        if ($data['resCode'] == 200) {
            $currentUserID = session()->get('userID');
            if ($currentUserID == $_POST['user_id']) {
                session()->set('avatar', $data['data']['user_avatar']);
            }
        }

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