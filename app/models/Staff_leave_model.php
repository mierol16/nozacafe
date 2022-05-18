<?php

class Staff_leave_model extends Model
{
    public $table      = 'staff_leave';
    public $primaryKey = 'staff_leave_id';
    public $foreignKey = ['config_leave_id', 'user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'config_leave_id',
        'leave_no',
        'leave_date_from',
        'leave_date_to',
        'leave_duration',
        'leave_comment',
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
    public $with = ['files'];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

    public function filesRelation($data)
    {
        return hasOne('Files_model', 'entity_id', $data[$this->primaryKey], ['entity_file_type' => 'LEAVE']);
    }

    public function getlist($status = null)
    {
        //  server side datatables
        $cols = array(
            "user.user_fullname",
            "ul.leave_no",
            "ml.leave_name",
            "ul.leave_date_from",
            "ul.leave_date_to",
            "ul.leave_remark",
            "ul.leave_status",
            "ul.staff_leave_id",
        );

        if(!empty($status)) {
            $this->db->where("ul.leave_status", $status);
        }
        $this->db->join("config_leave cl", "ul.config_leave_id=cl.config_leave_id", "LEFT");
        $this->db->join("master_leave ml", "cl.leave_id=ml.leave_id", "LEFT");
        $this->db->join("user", "ul.user_id=user.user_id", "LEFT");

        $result = $this->db->get($this->table . " ul", null, $cols);
        $this->serversideDt->query($this->getInstanceDB->getLastQuery());
        
        $this->serversideDt->hide('leave_no');

        $this->serversideDt->edit('leave_name', function ($data) {
            return $data['leave_name'] . '<br>' . $data['leave_no'];
        });

        $this->serversideDt->edit('leave_date_from', function ($data) {
            return date('d/m/Y, l', strtotime($data['leave_date_from'])) . ' - ' . date('d/m/Y, l', strtotime($data['leave_date_to']));
        });

        $this->serversideDt->hide('leave_date_to');

        if($status == 1) {
            $this->serversideDt->hide('leave_remark');
        }

        $this->serversideDt->edit('leave_status', function ($data) {
            if ($data['leave_status'] == 1) {
                return '<h4 class="m-0"><span class="badge bg-warning">Waiting for Approval</span></h4>';
            } elseif ($data['leave_status'] == 2) {
                return '<h4 class="m-0"><span class="badge bg-success">Approved</span></h4>';
            } elseif ($data['leave_status'] == 3) {
                return '<h4 class="m-0"><span class="badge bg-danger">Not Approved</span></h4>';
            } else {
                return '';
            }
        });

        $this->serversideDt->edit('staff_leave_id', function ($data) {
            $del = $edit = $view = '';
            if ($data['leave_status'] == 1) {
                $del = '<button onclick="approvalLeave(' . $data[$this->primaryKey] . ', 3)" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Reject"> <i class="fa fa-times"></i> </button>';
                $edit = '<button class="btn btn-xs btn-info" onclick="approvalLeave(' . $data[$this->primaryKey] . ', 2)" title="Approve"><i class="fa fa-check"></i> </button>';
            } else if ($data['leave_status'] == 2 || $data['leave_status'] == 3) {
                $view = '<button class="btn btn-xs btn-success" onclick="viewDetail(' . $data[$this->primaryKey] . ')" title="View"><i class="fa fa-eye"></i> </button>';
            }

            return "<center> $del $edit $view </center>";
        });

        echo $this->serversideDt->generate();
    }

    public function getListByUserID($userID)
    {
        //  server side datatables
        $cols = array(
            "ml.leave_name",
            "ul.leave_no",
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

        $this->serversideDt->hide('leave_no');
        
        $this->serversideDt->edit('leave_name', function ($data) {
            return $data['leave_name'] . '<br>' . $data['leave_no'];
        });

        $this->serversideDt->edit('leave_date_from', function ($data) {
            return date('d/m/Y, l', strtotime($data['leave_date_from'])) . ' - ' . date('d/m/Y, l', strtotime($data['leave_date_to']));
        });

        $this->serversideDt->hide('leave_date_to');

        $this->serversideDt->edit('created_at', function ($data) {
            return date('d.m.Y h:i a', strtotime($data['created_at']));
        });

        $this->serversideDt->edit('leave_status', function ($data) {
            if ($data['leave_status'] == 1) {
                return '<h4 class="m-0"><span class="badge bg-warning">Waiting for Approval</span></h4>';
            } elseif ($data['leave_status'] == 2) {
                return '<h4 class="m-0"><span class="badge bg-success">Approved</span></h4>';
            } elseif ($data['leave_status'] == 3) {
                return '<h4 class="m-0"><span class="badge bg-danger">Not Approved</span></h4>';
            } else {
                return '';
            }
        });

        $this->serversideDt->edit('staff_leave_id', function ($data) {
            $del = $view = '';
            if ($data['leave_status'] == 1) {
                $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Cancel"> <i class="fa fa-trash"></i> </button>';
            }
            $view = '<button class="btn btn-xs btn-success" onclick="viewDetail(' . $data[$this->primaryKey] . ')" title="View"><i class="fa fa-eye"></i> </button>';

            return "<center> $del $view </center>";
        });

        echo $this->serversideDt->generate();
    }

    public function getDetailByID($leaveID)
    {
        $this->db->where("ul.staff_leave_id", $leaveID);
        $this->db->join("config_leave cl", "ul.config_leave_id=cl.config_leave_id", "LEFT");
        $this->db->join("master_leave ml", "cl.leave_id=ml.leave_id", "LEFT");
        $this->db->join("user", "ul.user_id=user.user_id", "LEFT");

        return $this->db->fetchRow($this->table . " ul", null);
    }

    public function countLve($status)
    {
        $this->db->where("leave_status", $status);
        return $this->db->getValue($this->table, "count(*)");
    }
}
