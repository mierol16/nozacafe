<?php

class Preset_leave_model extends Model
{
    public $table      = 'preset_leave';
    public $primaryKey = 'preset_leave_id';
    public $foreignKey = ['role_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'preset_name',
        'leave_id_array',
        'leave_duration_array',
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

    public function getlist()
    {
        //  server side datatables
        $cols = array(
            "preset_name",
            "leave_id_array",
            "preset_leave_id",
        );

        // $this->db->join("master_role role", "pl.role_id = role.role_id", "LEFT");
        $this->db->get($this->table . " pl", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('leave_id_array', function($data) {
            $ids = explode(",", $data['leave_id_array']);
            return count($ids);
        });

        $this->serversideDt->edit('preset_leave_id', function ($data) {
            $del = $edit = '';
            if ($this->countLeaveInConfig($data['preset_leave_id']) == 0) {
                $del = '<button onclick="deletePresetRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Remove"> <i class="fa fa-trash"></i> </button>';
            }
            $edit = '<button class="btn btn-xs btn-info" onclick="updatePresetRecord(' . $data[$this->primaryKey] . ')" title="Edit"><i class="fa fa-edit"></i> </button>';

            return "<center> $del $edit </center>";
        });

        echo $this->serversideDt->generate();
    }

    function countLeaveInConfig($presetID)
    {
        $this->db->where('preset_id', $presetID);
        return $this->db->getValue('config_leave', "count(*)");
    }
}
