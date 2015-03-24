<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerDetail extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'career_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['instructor_id',
        'company_name',
        'type',
        'description',
        'period'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    public function instructor() {
        return $this->belongsTo('App\Instructor', 'instructor_id');
    }
}
