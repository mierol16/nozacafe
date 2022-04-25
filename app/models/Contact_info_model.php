<?php

class Contact_info_model extends Model
{
    protected $table      = 'staff_contact_info';
    protected $primaryKey = 'contact_id';
    protected $uniqueKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_name',
        'contact_relation',
        'contact_phone_1',
        'contact_phone_2',
        'user_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        
    ];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [
        'contact_name' => 'Contact Name',
        'contact_relation' => 'Relationship',
        'contact_phone_1' => 'Contact No.',
    ];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

}
