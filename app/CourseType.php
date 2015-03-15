<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_type'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
