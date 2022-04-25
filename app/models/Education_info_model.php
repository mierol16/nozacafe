<?php

class Education_info_model extends Model
{
    protected $table      = 'staff_education_info';
    protected $primaryKey = 'education_id';
    protected $uniqueKey = ['user_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'education_level',
        'education_course',
        'education_university',
        'user_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [
        'education_id' => 'numeric',
        'education_level' => 'required|min:1|max:20',
        'education_course' => 'required|min:1|max:30',
        'education_university' => 'required|min:1|max:50',
    ];

    /**
     * Custom message for validation
     *
     * @return array
     */
    protected $messages = [
        'education_level' => 'Education Level',
        'education_course' => 'Course Name',
        'education_university' => 'University Name',
    ];

    ###################################################################
    #                                                                 #
    #               Start custom function below                       #
    #                                                                 #
    ###################################################################

}
