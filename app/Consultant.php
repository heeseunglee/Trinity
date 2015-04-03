<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'consultants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['is_admin'];

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }

    public function hrs() {
        return $this->hasMany('App\Hr', 'consultant_id');
    }

}
