<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LvlTestMcPoolBeginner extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lvl_test_mc_pool_beginner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['session',
        'question',
        'example_1',
        'example_2',
        'example_3',
        'answer'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
