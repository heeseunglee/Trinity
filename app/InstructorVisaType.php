<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorVisaType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'instructor_visa_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
        'visa_type'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;
}
