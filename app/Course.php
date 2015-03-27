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
        'hr_id',
        'is_pre_course',
        'is_lvl_test',
        'name',
        'course_type_id',
        'start_datetime',
        'end_datetime',
        'location',
        'running_days',
        'status'];

    public function curriculums() {
        return $this->belongsToMany('App\CourseSubCurriculum',
                                    'courses_curriculums',
                                    'course_id',
                                    'course_sub_curriculum_id');
    }

    public function hr() {
        return $this->belongsTo('App\Hr', 'hr_id');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function courseType() {
        return $this->belongsTo('App\CourseType', 'course_type_id');
    }

    public function students() {
        return $this->belongsToMany('App\Student',
                                    'courses_students',
                                    'course_id',
                                    'student_id')
            ->withPivot('lvl_test_id');
    }

}
