<?php

class Preset_leave_model extends Model
{
    public $table      = 'preset_leave';
    public $primaryKey = 'preset_leave_id';
    public $uniqueKey = ['role_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'preset_name',
        'leave_id_array',
        'leave_duration_array',
        'role_id'
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
            "preset_name",
            "role_name",
            "preset_leave_id",
        );

        $this->db->join("master_role role", "pl.role_id = role.role_id", "LEFT");
        $this->db->get($this->table . " pl", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('preset_leave_id', function ($data) {
            $del = $edit = '';
            $del = '<button onclick="deletePresetRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Remove"> <i class="fa fa-trash"></i> </button>';
            $edit = '<button class="btn btn-xs btn-info" onclick="updatePresetRecord(' . $data[$this->primaryKey] . ')" title="Edit"><i class="fa fa-edit"></i> </button>';

            return "<center> $del $edit </center>";
        });

        echo $this->serversideDt->generate();
    }
}
