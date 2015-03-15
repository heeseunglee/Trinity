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
        'lvl_test_mc_id',
        'lvl_test_mc_result',
        'is_complete'];

}
