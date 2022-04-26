<?php

class Files_model extends Model
{
    protected $table      = 'files';
    protected $primaryKey = 'files_id';
    protected $uniqueKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'files_name',
        'files_type',
        'files_folder',
        'files_extension',
        'files_path',
        'table_ref',
        'table_id',
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

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

}
