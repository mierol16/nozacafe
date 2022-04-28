<?php

class Master_role_model extends Model
{
    public $table      = 'master_role';
    public $primaryKey = 'role_id';
    public $uniqueKey = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_name',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'role_id' => 'numeric',
        'role_name' => 'required|min:1|max:50',
    ];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [
        'role_name' => 'Role Name',
    ];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

    public function getlist()
    {
        //  server side datatables
        $cols = array(
            "role_name",
            "created_at", // dummy field
            "role_id",
        );

        $result = $this->db->get($this->table, null, $cols);
        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('created_at', function ($data) {
            return $this->countRoleInUser($data['role_id']);
        });

        $this->serversideDt->edit('role_id', function ($data) {
            $del = $edit =  '';
            if ($this->countRoleInUser($data['role_id']) == 0) {
                $del = '<button onclick="deleteRecord(' . $data[$this->primaryKey] . ')" data-toggle="confirm" data-id="' . $data[$this->primaryKey] . '" class="btn btn-xs btn-danger" title="Remove"> <i class="fa fa-trash"></i> </button>';
            }
            $edit = '<button class="btn btn-xs btn-info" onclick="updateRecord(' . $data[$this->primaryKey] . ')" title="Edit"><i class="fa fa-edit"></i> </button>';

            return "<center> $del $edit </center>";
        });

        echo $this->serversideDt->generate();
    }

    public function getAllRole()
    {
        $this->db->where('role_id', '1', '!=');

        return $this->db->get($this->table, null);
    }

    function countRoleInUser($roleID)
    {
        $this->db->where("role_id", $roleID);
        return $this->db->getValue('user', "count(*)");
    }
}
