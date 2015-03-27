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

    public function instructors() {
        return $this->belongsToMany('App\Instructor',
                                    'instructors_curriculums',
                                    'course_sub_curriculum_id',
                                    'instructor_id');
    }

    public function newCourseRequests() {
        return $this->belongsToMany('App\NewCourseRequest',
                                    'new_course_requests_curriculums',
                                    'course_sub_curriculum_id',
                                    'new_course_request_id');
    }

    public function courses() {
        return $this->belongsToMany('App\Course',
                                    'courses_curriculums',
                                    'course_sub_curriculum_id',
                                    'course_id');
    }

}
