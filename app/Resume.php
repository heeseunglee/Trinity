<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resumes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['instructor_id',
        'content'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
