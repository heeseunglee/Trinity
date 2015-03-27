<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id',
        'position',
        'deputy'];

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function courses() {
        return $this->belongsToMany('App\Course',
                                    'courses_students',
                                    'student_id',
                                    'course_id')
            ->withPivot('lvl_test_id');
    }

    public function lvlTests() {
        return $this->hasMany('App\LvlTest', 'student_id');
    }

}
