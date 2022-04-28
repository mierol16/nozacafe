<?php

class Master_leave_model extends Model
{
    public $table      = 'master_leave';
    public $primaryKey = 'leave_id';
    public $uniqueKey = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'leave_name',
        'leave_description',
        'leave_carry',
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
    protected $messages = [];

    public $with = [];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

    public function getlist()
    {
        //  server side datatables
        $cols = array(
            "leave_name",
            "leave_description", // dummy field
            "leave_id",
        );

        $result = $this->db->get($this->table, null, $cols);
        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('leave_id', function ($data) {
            $del = $edit =  $assign = '';
            $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Remove"> <i class="fa fa-trash"></i> </button>';
            $edit = '<button class="btn btn-xs btn-info" onclick="updateRecord(' . $data[$this->primaryKey] . ')" title="Edit"><i class="fa fa-edit"></i> </button>';
            $assign = '<button class="btn btn-xs btn-dark" onclick="assignRecord(' . $data[$this->primaryKey] . ')" title="Assign"><i class="fas fa-list"></i> </button>';

            return "<center> $del $edit $assign </center>";
        });

        echo $this->serversideDt->generate();
    }
}
