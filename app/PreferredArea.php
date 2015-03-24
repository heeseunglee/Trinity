<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferredArea extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'preferred_areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['preferred_area_group_id',
        'name'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    public function preferredAreaGroup() {
        return $this->belongsTo('App\PreferredAreaGroup', 'preferred_area_group_id');
    }

    public function instructors() {
        return $this->belongsToMany('App\Instructor',
                                    'instructors_preferred_areas',
                                    'preferred_area_id',
                                    'instructor_id');
    }
}
