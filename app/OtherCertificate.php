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
    protected $fillable = ['name',
        'detail'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    public function instructors() {
        return $this->belongsToMany('App\Instructor',
                                    'instructors_other_certificates',
                                    'other_certificate_id',
                                    'instructor_id');
    }
}
