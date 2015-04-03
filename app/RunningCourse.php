<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RunningCourse extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'running_courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_id',
        'session',
        'planned_start_datetime',
        'planned_end_datetime',
        'actual_start_datetime',
        'actual_end_datetime',
        'status',
        'daily_report'];
}
