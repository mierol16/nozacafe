<?php

class Notification_model extends Model
{
    protected $table      = 'notification';
    protected $primaryKey = 'noti_id';
    protected $uniqueKey = [];
    protected $foreignKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noti_type',
        'noti_text',
        'noti_redirect',
        'noti_status',
        'user_id',
        'user_preferred_name',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'noti_id' => 'numeric',
        'user_id' => 'numeric',
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

    public function notiListByUser()
    {
        $userID = session()->get('userID') ?? '1';

        $this->db->where("user_id", $userID);
        $this->db->where("noti_status", '0');
        return $this->db->get($this->table, 8); // set to 8 noti
    }

    public function countUnreadNotiByUser()
    {
        $userID = session()->get('userID') ?? '1';

        $this->db->where("user_id", $userID);
        $this->db->where("noti_status", '0');
        return $this->db->getValue($this->table, "count(*)");
    }
}
