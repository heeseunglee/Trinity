<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LvlTestMcPoolIntermediate extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lvl_test_mc_pool_intermediate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['session',
        'text',
        'question',
        'example_1',
        'example_2',
        'example_3',
        'example_4',
        'answer',
        'question_2',
        'example_5',
        'example_6',
        'example_7',
        'example_8',
        'answer_2'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
