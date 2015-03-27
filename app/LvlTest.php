<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LvlTest extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lvl_tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id',
        'course_id',
        'start_date',
        'end_date',
        'lvl_test_mc_id',
        'lvl_test_mc_result',
        'is_complete'];

    public function student() {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function Course() {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function lvlTestMc() {
        return $this->belongsTo('App\LvlTestMc', 'lvl_test_mc_id');
    }

}
