<?php

class Master_runningno_model extends Model
{
    public $table      = 'master_running_no';
    public $primaryKey = 'run_id';
    public $uniqueKey = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'run_prefix',
        'run_suffix',
        'run_type',
        'run_zerodigit',
        'run_currentno',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'run_id' => 'numeric',
        'run_prefix' => 'required|min:1|max:50',
        'run_suffix' => 'nullable|max:50',
        'run_type' => 'numeric',
        'run_zerodigit' => 'numeric',
        'run_currentno' => 'numeric',
    ];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [
        'run_prefix' => 'Prefix',
        'run_suffix' => 'Suffix',
        'run_type' => 'Type',
        'run_currentno' => 'Current No',
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

    public function getlist()
    {
        //  server side datatables
        $cols = array(
            "run_prefix",
            "run_suffix",
            "run_type",
            "run_currentno",
            "run_id",
        );

        $result = $this->db->get("" . $this->table . "", null, $cols);
        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('run_type', function ($data) {
            if ($data['run_type'] == 1) {
                return 'Employee No';
            } else if ($data['run_type'] == 2) {
                return 'Leave No';
            }
        });

        $this->serversideDt->edit('run_id', function ($data) {
            $del = $edit =  '';
            $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-sm btn-danger" title="Remove"> <i class="fa fa-trash"></i> </button>';
            $edit = '<button class="btn btn-sm btn-info" onclick="updateRecord(' . $data[$this->primaryKey] . ')" title="Edit"><i class="fa fa-edit"></i> </button>';

            return "<center> $del $edit </center>";
        });

        echo $this->serversideDt->generate();
    }

    public function generateEmployeeNo()
    {
        $this->db->where("run_type", 1); // get type student no
        $data = $this->db->fetchRow($this->table);

        $prefix = $data['run_prefix'];
        $suffix = (!empty($data['run_suffix'])) ? '|' . $data['run_suffix']  : NULL;
        $currentNo = $data['run_currentno'];
        $zerodigit = $data['run_zerodigit'];
        $no = str_pad($currentNo + 1, $zerodigit, 0, STR_PAD_LEFT);
        $runningNo = $prefix . '|' . $no . $suffix;

        return $runningNo;
    }

    public function updateEmployeeNo()
    {
        $this->db->where("run_type", 1); // get type application
        $data = $this->db->fetchRow($this->table);
        $dataUpdate = [
            'run_currentno' => $data['run_currentno'] + 1,
            'updated_at' => timestamp()
        ];

        return update($this->table, $dataUpdate, $data['run_id']);
    }

    public function generateLeaveNo()
    {
        $this->db->where("run_type", 2); // get type student no
        $data = $this->db->fetchRow($this->table);

        $prefix = $data['run_prefix'];
        $suffix = (!empty($data['run_suffix'])) ? '|' . $data['run_suffix']  : NULL;
        $currentNo = $data['run_currentno'];
        $zerodigit = $data['run_zerodigit'];
        $no = str_pad($currentNo + 1, $zerodigit, 0, STR_PAD_LEFT);
        $runningNo = $prefix . '|' . $no . $suffix;

        return $runningNo;
    }

    public function updateLeaveNo()
    {
        $this->db->where("run_type", 2); // get type application
        $data = $this->db->fetchRow($this->table);
        $dataUpdate = [
            'run_currentno' => $data['run_currentno'] + 1,
            'updated_at' => timestamp()
        ];

        return update($this->table, $dataUpdate, $data['run_id']);
    }
}
