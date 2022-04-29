<?php

class User_model extends Model
{
    public $table      = 'user';
    public $primaryKey = 'user_id';
    public $uniqueKey = ['user_email', 'user_username'];
    public $foreignKey = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_no',
        'user_fullname',
        'user_preferred_name',
        'user_nric',
        'user_gender',
        'user_email',
        'user_contact_no',
        'user_dob',
        'user_address',
        'user_postcode',
        'user_city',
        'user_state',
        'user_race',
        'user_religion',
        'user_username',
        'user_password',
        'user_avatar',
        'user_qrcode',
        'user_status',
        'role_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'user_id' => 'numeric',
    ];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [
        'user_fullname' => 'name',
        'user_preferred_name' => 'preferred name',
        'user_gender' => 'gender',
        'user_email' => 'email',
        'user_contact_no' => 'contact no',
        'user_address' => 'address',
        'user_postcode' => 'postcode',
        'user_city' => 'city',
        'user_state' => 'state',
        'user_race' => 'race',
        'user_religion' => 'religion',
        'user_username' => 'username',
        'user_password' => 'password',
    ];

    public $with = [
        'education',
        'files',
        'contact',
        'leave',
    ];

    public function educationRelation($data)
    {
        return hasMany('Education_info_model', 'user_id', $data[$this->primaryKey]);
    }

    public function filesRelation($data)
    {
        return hasMany('Files_model', 'user_id', $data[$this->primaryKey]);
    }

    public function contactRelation($data)
    {
        return hasMany('Contact_info_model', 'user_id', $data[$this->primaryKey]);
    }

    public function leaveRelation($data)
    {
        return hasMany('Config_leave_model', 'user_id', $data[$this->primaryKey]);
    }

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

    public function listAdmin()
    {
        //  server side datatables
        $cols = array(
            "user_fullname",
            "user_nric",
            "user_email",
            "user_contact_no",
            "user_status",
            "user_id",
        );

        $this->db->where('user.role_id', '2');
        $result = $this->db->get($this->table . " user", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->hide('user_nric'); // hides 'created_at' column from the output

        $this->serversideDt->edit('user_fullname', function ($data) {
            return '<a href="javascript:void(0)" onclick="viewRecord(' . $data['user_id'] . ', \'' . encodeID($data['user_id']) . '\', \'' . base_url . '\')">' . $data['user_fullname'] . '<br>' . $data['user_nric'] . ' </a>';
        });

        $this->serversideDt->edit('user_status', function ($data) {
            if ($data['user_status'] == 0) {
                return '<span class="badge bg-label-warning">Inactive</span>';
            } else if ($data['user_status'] == 1) {
                return '<span class="badge bg-label-success">Active</span>';
            } else if ($data['user_status'] == 2) {
                return '<span class="badge bg-label-danger">Terminate</span>';
            } else {
                return '';
            }
        });

        $this->serversideDt->edit('user_id', function ($data) {
            $del = $edit =  '';
            $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>';
            $edit = '<button class="btn btn-xs btn-info" onclick="updateRecord(' . $data[$this->primaryKey] . ')" title="Edit"><i class="fa fa-edit"></i> </button>';

            return "<center> $del $edit </center>";
        });

        echo $this->serversideDt->generate();
    }

    public function listStaff()
    {
        //  server side datatables
        $cols = array(
            "user_fullname",
            "user_no",
            "user_email",
            "user_contact_no",
            "user_status",
            "user_id",
        );

        $this->db->where('user.role_id', '3');
        $result = $this->db->get($this->table . " user", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->hide('user_no'); // hides 'created_at' column from the output

        $this->serversideDt->edit('user_fullname', function ($data) {
            return '<a href="javascript:void(0)" onclick="viewRecord(' . $data['user_id'] . ', \'' . encodeID($data['user_id']) . '\', \'' . base_url . '\')">' . $data['user_fullname'] . '<br>' . $data['user_no'] . ' </a>';
        });

        $this->serversideDt->edit('user_status', function ($data) {
            if ($data['user_status'] == '0') {
                return '<span class="badge bg-warning">Inactive</span>';
            } else if ($data['user_status'] == '1') {
                return '<span class="badge bg-success">Active</span>';
            } else if ($data['user_status'] == '2') {
                return '<span class="badge bg-danger">Terminate</span>';
            } else {
                return '';
            }
        });

        $this->serversideDt->edit('user_id', function ($data) {
            $del = $edit =  '';
            $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>';
            $edit = '<button class="btn btn-xs btn-info" onclick="updateRecord(' . $data[$this->primaryKey] . ')" title="Edit"><i class="fa fa-edit"></i> </button>';

            return "<center> $del $edit </center>";
        });

        echo $this->serversideDt->generate();
    }

    // public function getUsersByID($userID, $decode = false) 
    // {
    //     if ($decode) {
    //         $userID = decodeID($userID);
    //     }

    //     $this->db->where('user.user_id', $userID);

    //     $this->db->join('staff_education_info edu', "user.user_id=edu.user_id", "LEFT");
    //     $this->db->join('staff_contact_info hp', "user.user_id=hp.user_id", "LEFT");
    //     return $this->db->get($this->table . " user", null);
    // }

    public function getUserLogin($params = NULL)
    {
        $this->db->where('user_email', $params);
        $this->db->orWhere('user_username', $params);
        return $this->db->fetchRow($this->table);
    }

    public function getProfileByID($params = NULL)
    {
        $this->db->where($this->primaryKey, $params);
        return $this->db->fetchRow($this->table);
    }

    public function upload_save($data)
    {
        $image = $data['image'];
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);

        $image = base64_decode($image);
        $userID = $data['user_id'];
        $roleID = $data['role_id'];
        $filename = $data['filename'];

        $fileNameNew = $userID . "_" . date('dFY') . "_" . date('his') . '.jpg';
        $path = 'upload/image/user/' . $fileNameNew;

        if (file_put_contents($path, $image)) {

            $dataUser = $this->getProfileByID($userID);
            $oldPic = $dataUser['user_avatar'];

            chown($path, 666);
            if (!empty($oldPic)) {
                if ($oldPic != 'default/user.png') {
                    $removePath = 'upload/image/user/' . $oldPic;

                    if (unlink($removePath)) {
                        $data = [
                            'user_id' =>  $userID,
                            'user_avatar' => $fileNameNew,
                        ];

                        return updateOrInsert($this->table, $data);
                    } else {
                        return ['resCode' => 400, 'message' => "Ops. Update unsuccessful"];
                    }
                } else {
                    $data = [
                        'user_id' =>  $userID,
                        'user_avatar' => $fileNameNew,
                    ];

                    return updateOrInsert($this->table, $data);
                }
            } else {
                $data = [
                    'user_id' =>  $userID,
                    'user_avatar' => $fileNameNew,
                ];


                return updateOrInsert($this->table, $data);
            }
        } else {
            return ['resCode' => 400, 'message' => "Ops. Profile upload failed"];
        }
    }
}
