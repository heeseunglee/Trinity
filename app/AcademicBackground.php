<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicBackground extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'academic_backgrounds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
