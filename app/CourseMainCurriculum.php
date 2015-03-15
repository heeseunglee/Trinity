<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMainCurriculum extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course_main_curriculums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
        'can_select_multiple'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
