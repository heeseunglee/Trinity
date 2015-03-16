<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
        'postcode_1',
        'postcode_2',
        'address_1',
        'address_2',
        'contact_email',
        'contact_number_1',
        'contact_number_2',
        'logo_image'];

    public function courses() {
        return $this->hasMany('App\Course', 'company_id');
    }

    public function hrs() {
        return $this->hasMany('App\Hr', 'company_id');
    }

    public function students() {
        return $this->hasMany('App\Student', 'company_id');
    }

}
