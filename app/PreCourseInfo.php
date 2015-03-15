<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PreCourseInfo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pre_course_infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hr_id',
        'number_of_students',
        'course_type_id',
        'instructor_visa_type_id',
        'instructor_gender',
        'instructor_career',
        'start_datetime',
        'end_datetime',
        'running_days',
        'meeting_datetime',
        'other_requests',
        'is_confirmed',
        'confirmed_by'];
}
