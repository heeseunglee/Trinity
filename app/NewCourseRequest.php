<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NewCourseRequest extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'new_course_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hr_id',
        'company_id',
        'course_type_id',
        'instructor_visa_type_id',
        'instructor_gender',
        'instructor_career',
        'estimated_size',
        'start_datetime',
        'end_datetime',
        'meeting_datetime',
        'running_days',
        'location',
        'other_requests',
        'is_lvl_test',
        'status',
        'approved_by'];

    public function curriculums() {
        return $this->belongsToMany('App\CourseSubCurriculum',
                                    'new_course_requests_curriculums',
                                    'new_course_request_id',
                                    'course_sub_curriculum_id');
    }

    public function courseType() {
        return $this->belongsTo('App\CourseType', 'course_type_id');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function hr() {
        return $this->belongsTo('App\Hr', 'hr_id');
    }

}
