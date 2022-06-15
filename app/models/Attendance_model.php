<?php

class Attendance_model extends Model
{
    public $table      = 'staff_attendance';
    public $primaryKey = 'attendance_id';
    public $uniqueKey = [];
    public $foreignKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attendance_date',
        'attendance_time_in',
        'attendance_time_out',
        'attendance_day',
        'attendance_month',
        'attendance_year',
        'attendance_status',
        'attendance_remark',
        'user_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'attendance_id' => 'numeric',
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
    function getlist($year, $month, $userID = null)
    {
        //  server side datatables
        $cols = array(
            "user.user_fullname",
            "user.user_nric", //hide
            "att.attendance_date",
            "att.attendance_time_in",
            "att.attendance_time_out",
            "att.attendance_id", // hide
        );

        if ($userID) {
            $this->db->where("att.user_id", $userID);
        }

        $this->db->where("att.attendance_year", $year);
        $this->db->where("att.attendance_month", $month);
        $this->db->join("user", "att.user_id=user.user_id", "LEFT");
        $this->db->get($this->table . " att", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->hide('user_nric');
        $this->serversideDt->hide('attendance_id');

        $this->serversideDt->edit('user_fullname', function($data) {
            return $data['user_fullname'] . '<br>' . $data['user_nric'];
        });

        $this->serversideDt->edit('attendance_date', function ($data) {
            return date('d/m/Y', strtotime($data['attendance_date']));
        });

        $this->serversideDt->edit('attendance_time_in', function ($data) {
            return date('h:i a', strtotime($data['attendance_time_in']));
        });

        $this->serversideDt->edit('attendance_time_out', function ($data) {
            return ($data['attendance_time_out'] != NULL) ? date('h:i a', strtotime($data['attendance_time_out'])) : '<i> No data </i>';
        });

        echo $this->serversideDt->generate();
    }

    function getlistTable($year, $month, $userID = null)
    {
        if ($userID) {
            $this->db->where("att.user_id", $userID);
        }

        $this->db->where("att.attendance_year", $year);
        $this->db->where("att.attendance_month", $month);
        $this->db->join("user", "att.user_id=user.user_id", "LEFT");
        return $this->db->get($this->table . " att", null);
    }

    function countStudAttendance($studentID, $year, $month)
    {
        $this->db->where("stud_id", $studentID);
        $this->db->where("attendance_year", $year);
        $this->db->where("attendance_month", $month);
        return $this->db->getValue($this->table, "count(*)");
    }

    public function getListByStudID($studentID, $dateCombine, $decode = false)
    {
        if ($decode) {
            $studentID = decodeID($studentID);
        }

        $this->db->where("stud_id", $studentID);
        $this->db->where("attendance_date", $dateCombine);

        return $this->db->fetchRow($this->table, null);
    }

    function getAttendanceRecordByStudDetail($studentID, $academicID, $levelID, $date)
    {
        
        $this->db->where("stud_id", $studentID);
        $this->db->where("academic_id", $academicID);
        $this->db->where("level_id", $levelID);
        $this->db->where("attendance_date", $date);
        // return $this->db->getValue($this->table, "count(*)");
        return $this->db->fetchRow($this->table, null);
    }

    function getYear()
    {
        $this->db->groupBy('attendance_year');
        return $this->db->get($this->table, null);
    }
}
