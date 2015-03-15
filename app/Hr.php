<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hr extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hrs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id',
        'consultant_id'];

    public function user() {
        return $this->morphOne('User', 'userable');
    }

}
