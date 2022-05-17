<?php

class Contact_info_model extends Model
{
    public $table      = 'staff_contact_info';
    public $primaryKey = 'contact_id';
    public $uniqueKey = [];
    public $foreignKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_name',
        'contact_relation',
        'contact_phone_1',
        'contact_phone_2',
        'user_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [
        'contact_name' => 'Contact Name',
        'contact_relation' => 'Relationship',
        'contact_phone_1' => 'Contact No.',
    ];

    /**
     * Call funtion relation
     *
     * @return array
     */
    public $with = [];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

    public function getListByUserID($userID, $decode = false)
    {
        if ($decode) {
            $userID = decodeID($userID);
        }

        //  server side datatables
        $cols = array(
            "hp.contact_name",
            "hp.contact_relation",
            "hp.contact_phone_1",
            "hp.contact_phone_2",
            "hp.contact_id",
            "hp.user_id"
        );

        $this->db->where("user.user_id", $userID);

        $this->db->join("user", "hp.user_id=user.user_id", "LEFT");
        $this->db->get($this->table . " hp", null, $cols); // get data to show in table

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->hide('user_id');

        if (session()->get('userID') == $userID) {
            $this->serversideDt->edit('contact_id', function ($data) {
                $del = $edit = '';
                $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ', \'contact\')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>';
                $edit = '<button class="btn btn-xs btn-info" onclick="updateRecord(' . $data[$this->primaryKey] . ', \'contact\')" title="Edit"><i class="fa fa-edit"></i> </button>';
    
                return "<center> $del $edit </center>";
            });
        } else {
        $this->serversideDt->hide('contact_id');
        }

        echo $this->serversideDt->generate();
    }

}
