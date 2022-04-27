<?php

// Import all model want to use
// REMINDER : Make sure alias or 'as' are not same as any class name
use User_model as users;
use Education_info_model as Edu;
use Contact_info_model as Contact;
use Files_model as Files;

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

    // open page list 2
    public function employee()
    {
        $data = [
            'title' => 'Employee List',
            'currentSidebar' => 'user',
            'currentSubSidebar' => 'staff',
        ];

        render('user/staff_list', $data);
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
        $data = users::find($_POST['id']); // call static function
        $data['education'] = Edu::where(['user_id' => $_POST['id']], 'get', ['files']);
        $data['contact'] = Contact::where(['user_id' => $_POST['id']]);
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
        $_POST['user_password'] = password_hash($_POST['user_nric'], PASSWORD_DEFAULT);

        // $data = users::save($_POST);
        $data = users::updateOrInsert($_POST); // call static function

        $userID = $data['id'];

        foreach ($_POST['education_level'] as $key => $value) {
            $education = Edu::save(
                [
                    'education_id' => $_POST['education_id'][$key],
                    'education_level' => $_POST['education_level'][$key],
                    'education_course' => $_POST['education_course'][$key],
                    'education_university' => $_POST['education_university'][$key],
                    'user_id' => $userID,
                ]
            );

            $fileName = $fileExtension = $path = '';
            if (isset($_FILES['education_file'])) {

                $fileTmpPath = $_FILES['education_file']['tmp_name'][$key];
                $fileName = $_FILES['education_file']['name'][$key];
                $fileSize = $_FILES['education_file']['size'][$key];
                $fileType = $_FILES['education_file']['type'][$key];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $fileNameNew = $userID . "_" . date('dFY') . "_" . date('his') . '.' . $fileExtension;
                $folder = folder('certificate', $_POST['user_fullname'], 'directory');
                $path = $folder . '/' . $fileNameNew;

                if (move_uploaded_file($fileTmpPath, $path)) {
                    Files::save(
                        [
                            'files_id' => $_POST['files_id'][$key],
                            'files_name' => $fileNameNew,
                            'files_type' => get_mime_type($fileName),
                            'files_folder' => $folder,
                            'files_extension' => $fileExtension,
                            'files_path' => $path,
                            'table_ref' => 'staff_education_info',
                            'table_id' => $education['id'],
                            'user_id' => $userID,
                        ]
                    );
                }
            }
        }

        foreach ($_POST['contact_name'] as $key => $value) {
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

        json($data);
    }

    public function delete()
    {
        $data = users::delete($_POST['id']); // call static function
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