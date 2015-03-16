<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'certificates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
        'grade'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    public function instructors() {
        return $this->belongsToMany('App\Instructor',
                                    'instructors_certificates',
                                    'certificate_id',
                                    'instructor_id');
    }
}
