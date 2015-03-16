<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'instructors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rating',
        'career_years',
        'end_of_contract_date',
        'name_chn',
        'date_of_birth',
        'residence_number',
        'bank_id',
        'bank_account_number',
        'available_morning_from',
        'available_morning_to',
        'available_afternoon_from',
        'available_afternoon_to',
        'available_night_from',
        'available_night_to',
        'payday',
        'gender',
        'age',
        'instructor_visa_type_id'];

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }

    public function certificates() {
        return $this->belongsToMany('App\Certificate',
                                    'instructors_certificates',
                                    'instructor_id',
                                    'certificate_id');
    }

    public function otherCertificates() {
        return $this->belongsToMany('App\OtherCertificate',
                                    'instructors_other_certificates',
                                    'instructor_id',
                                    'other_certificate_id');
    }
}
