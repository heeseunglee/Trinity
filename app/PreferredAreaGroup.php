<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferredAreaGroup extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'preferred_area_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

}
