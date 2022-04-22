<?php

use User_model as users;
use Master_role_model as roles;

class Auth extends Controller
{
    public function index()
    {
        redirect('auth/login', true);
    }

    public function login()
    {
        view('auth/login', ['title' => 'Login']);
    }

    public function register()
    {
        view('auth/register', ['title' => 'Register']);
    }

    public function authorize()
    {
        $username = escape($_POST['username']);
        $enteredPassword = escape($_POST['password']);

        $data = $this->users->getUserLogin($username);

        $redirectUrl = NULL;

        if (!empty($data)) {

            $status = $data['user_status'];
            $roleid = $data['role_id'];
            $avatar = (!empty($data['user_avatar'])) ? $data['user_avatar'] : 'default/user.png';
            $current_password = $data['user_password'];

            // role profile
            $role = roles::find($roleid);
            $rolename = $role['role_name'];

            $result = passDecrypt($current_password, $enteredPassword);

            if ($result) {
                if ($status == '1') {
                    // Set session a USING SESSION MANAGER
                    $this->session->set('userID', $data['user_id']);
                    $this->session->set('userFullname', $data['user_fullname']);
                    $this->session->set('userPreferredName', $data['user_preferred_name']);
                    $this->session->set('userEmail', $data['user_email']);
                    $this->session->set('avatar', $data['user_avatar']);
                    $this->session->set('roleID', $roleid);
                    $this->session->set('roleName', $rolename);
                    $this->session->set('avatar', $avatar);
                    $this->session->set('isLoggedIn', TRUE);

                    $response = 200;
                    $message = 'Login successful';
                    $redirectUrl = url('dashboard');
                } else {
                    $response = 500;
                    $message = 'Your account is inactive';
                }
            } else {
                $response = 500;
                $message = 'Invalid username or password';
            }
        } else {
            $response = 500;
            $message = 'Invalid username or password';
        }

        json(["response" => $response, "message" => $message, "redirectUrl" => $redirectUrl]);
    }

    public function logout()
    {
        $this->session->clear();
        redirect('auth/login', true);
        exit;
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