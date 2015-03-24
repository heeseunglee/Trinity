<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherCertificate extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'other_certificates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['instructor_id',
        'name',
        'detail'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    public function instructors() {
        return $this->belongsTo('App\Instructor', 'instructor_id');
    }
}
