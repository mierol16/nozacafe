<?php

class Staff_leave_model extends Model
{
    public $table      = 'staff_leave';
    public $primaryKey = 'staff_leave_id';
    public $uniqueKey = ['config_leave_id', 'user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'config_leave_id',
        'leave_date_from',
        'leave_date_to',
        'leave_duration',
        'leave_status',
        'leave_remark',
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
    protected $messages = [];

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

    public function getList()
    {
    }

    public function getListByUserID($userID)
    {
        //  server side datatables
        $cols = array(
            "ml.leave_name",
            "ul.leave_date_from",
            "ul.leave_date_to",
            "ul.created_at",
            "ul.leave_status",
            "ul.staff_leave_id",
        );

        $this->db->where("ul.user_id", $userID);
        $this->db->join("config_leave cl", "ul.config_leave_id=cl.config_leave_id", "LEFT");
        $this->db->join("master_leave ml", "cl.leave_id=ml.leave_id", "LEFT");

        $result = $this->db->get($this->table . " ul", null, $cols);
        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('leave_date_from', function ($data) {
            return date('d.m.Y', strtotime($data['leave_date_from'])) . ' - ' . date('d.m.Y', strtotime($data['leave_date_to']));
        });

        $this->serversideDt->hide('leave_date_to');

        $this->serversideDt->edit('created_at', function ($data) {
            return date('d.m.Y h:i a', strtotime($data['created_at']));
        });

        $this->serversideDt->edit('leave_status', function ($data) {
            if ($data['leave_status'] == '1') {
                return '<span class="badge bg-success">Approved</span>';
            } elseif ($data['leave_status'] == '2') {
                return '<span class="badge bg-danger">Not Approved</span>';
            } else {
                return '<span class="badge bg-warning">Waiting for Approval</span>';
            }
        });

        $this->serversideDt->edit('staff_leave_id', function ($data) {
            $del = $view = '';
            $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Cancel"> <i class="fa fa-trash"></i> </button>';
            $view = '<button class="btn btn-xs btn-success" onclick="viewRecord(' . $data[$this->primaryKey] . ')" title="View"><i class="fa fa-eye"></i> </button>';

            return "<center> $del $view </center>";
        });

        echo $this->serversideDt->generate();
    }
}
