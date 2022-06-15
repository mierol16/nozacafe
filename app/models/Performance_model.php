<?php

class Performance_model extends Model
{
    public $table      = 'staff_performance';
    public $primaryKey = 'performance_id';
    public $uniqueKey = [];
    public $foreignKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'performance_date',
        'performance_year',
        'attendance_mark',
        'cooperation_mark',
        'responsibility_mark',
        'behavior_mark',
        'trust_mark',
        'total_mark',
        'performance_gred',
        'performance_status',
        'performance_comment',
        'performance_admin_remark',
        'admin_remark_date',
        'performance_staff_remark',
        'staff_remark_date',
        'user_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'performance_id' => 'numeric',
    ];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################
    function getlist($year, $userID = null)
    {
        //  server side datatables
        $cols = array(
            "user.user_fullname",
            "user.user_nric", //hide
            "per.performance_date",
            "per.performance_status",
            "per.performance_id",
        );

        if ($userID) {
            $this->db->where("per.user_id", $userID);
        }

        $this->db->where("per.performance_year", $year);
        $this->db->join("user", "per.user_id=user.user_id", "LEFT");
        $this->db->get($this->table . " per", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->hide('user_nric');

        $this->serversideDt->edit('user_fullname', function($data) {
            return $data['user_fullname'] . '<br>' . $data['user_nric'];
        });

        $this->serversideDt->edit('performance_date', function ($data) {
            return date('d/m/Y', strtotime($data['performance_date']));
        });

        $this->serversideDt->edit('performance_status', function ($data) {
            if ($data['performance_status'] == 1) {
                return '<h4 class="m-0"><span class="badge bg-success">View By Employee</span></h4>';
            } else {
                return '<h4 class="m-0"><span class="badge bg-danger">Not View</span></h4>';
            }
        });

        $this->serversideDt->edit('performance_id', function ($data) {
            $view = '<button class="btn btn-xs btn-success" onclick="viewDetail(' . $data[$this->primaryKey] . ')" title="View"><i class="fa fa-eye"></i> </button>';
            return "<center> $view </center>";
        });

        echo $this->serversideDt->generate();
    }

    function getDataById($evalID)
    {
        $this->db->where("per.performance_id", $evalID);
        $this->db->join("user", "per.user_id=user.user_id", "LEFT");
        return $this->db->fetchRow($this->table . " per", null);
    }

    function getYear()
    {
        $this->db->groupBy('performance_year');
        return $this->db->get($this->table, null);
    }
}
