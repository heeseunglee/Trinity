<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LvlTestMc extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lvl_test_mcs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['time_left',
        'started_at',
        'paused_at',
        'finished_at',
        'status',
        'proceed_step',
        'question_1',
        'answer_1',
        'question_2',
        'answer_2',
        'question_3',
        'answer_3',
        'question_4',
        'answer_4',
        'question_5',
        'answer_5',
        'question_6',
        'answer_6',
        'question_7',
        'answer_7',
        'question_8',
        'answer_8',
        'question_9',
        'answer_9',
        'question_10',
        'answer_10',
        'question_11',
        'answer_11',
        'question_12',
        'answer_12',
        'question_13',
        'answer_131',
        'answer_132',
        'question_14',
        'answer_141',
        'answer_142',
        'question_15',
        'answer_15',
        'question_16',
        'answer_16',
        'question_17',
        'answer_17',
        'question_18',
        'answer_18',
        'question_19',
        'answer_19',
        'question_20',
        'answer_20'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
