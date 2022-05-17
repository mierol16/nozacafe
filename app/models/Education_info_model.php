<?php

class Education_info_model extends Model
{
    public $table      = 'staff_education_info';
    public $primaryKey = 'education_id';
    public $uniqueKey = [];
    public $foreignKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'education_level',
        'education_course',
        'education_university',
        'user_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'education_id' => 'numeric',
        'education_level' => 'required|min:1|max:20',
        'education_course' => 'required|min:1|max:30',
        'education_university' => 'required|min:1|max:50',
    ];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [
        'education_level' => 'Education Level',
        'education_course' => 'Course Name',
        'education_university' => 'University Name',
    ];

    /**
     * Call funtion relation
     *
     * @return array
     */
    public $with = [
        'user',
        'files',
    ];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

    public function userRelation($data)
    {
        return hasOne('User_model', 'user_id', $data['user_id']);
    }

    public function filesRelation($data)
    {
        return hasOne('Files_model', 'entity_id', $data[$this->primaryKey], ['entity_file_type' => 'CERTIFICATE']);
    }

    public function getListByUserID($userID, $decode = false)
    {
        if ($decode) {
            $userID = decodeID($userID);
        }

        //  server side datatables
        $cols = array(
            "edu.education_university",
            "edu.education_level",
            "edu.education_course",
            "edu.education_id",
            "edu.user_id"
        );

        $this->db->where("user.user_id", $userID);

        $this->db->join("user", "edu.user_id=user.user_id", "LEFT");
        $this->db->get($this->table . " edu", null, $cols); // get data to show in table

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->hide('user_id');

        $this->serversideDt->edit('education_id', function ($data) {
            $del = $edit = $view = '';
            if (session()->get('userID') == $data['user_id']) {
                $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ', \'education\')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>';
                $edit = '<button class="btn btn-xs btn-info" onclick="updateRecord(' . $data[$this->primaryKey] . ', \'education\')" title="Edit"><i class="fa fa-edit"></i> </button>';
            } else {
                $view = '<button class="btn btn-xs btn-success" onclick="viewRecord(' . $data[$this->primaryKey] . ')" title="View"><i class="fa fa-eye"></i> </button>';
            }

            return "<center> $del $edit $view </center>";
        });

        echo $this->serversideDt->generate();
    }
}
