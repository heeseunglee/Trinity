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
        'payday',
        'gender',
        'age',
        'instructor_visa_type_id'];

    public function user() {
        return $this->morphOne('User', 'userable');
    }

}
