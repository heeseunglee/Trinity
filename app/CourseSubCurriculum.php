<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSubCurriculum extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course_sub_curriculums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_main_curriculum_id',
        'name'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    public function courseMainCurriculum() {
        return $this->belongsTo('CourseMainCurriculum', 'course_main_curriculum_id');
    }
}
