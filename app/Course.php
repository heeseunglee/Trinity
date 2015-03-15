<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id',
        'is_pre_course',
        'name',
        'course_type_id',
        'start_datetime',
        'end_datetime',
        'location',
        'running_days',
        'status',
        'proceed_lvl_test'];

}
