<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LvlTestMcPoolElementary extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lvl_test_mc_pool_elementary';

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
        'answer'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
