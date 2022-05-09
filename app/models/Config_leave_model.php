<?php

class Config_leave_model extends Model
{
    public $table      = 'config_leave';
    public $primaryKey = 'config_leave_id';
    public $uniqueKey = [];
    public $foreignKey = ['leave_id', 'preset_id', 'user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'leave_id',
        'preset_id',
        'preset_duration',
        'leave_year',
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

    public function getConfigByUserID($userID)
    {
        $this->db->where('user_id', $userID);
        $this->db->join("master_leave ml", "cl.leave_id=ml.leave_id", "LEFT");
        return $this->db->get($this->table . " cl", null);
    }
}
