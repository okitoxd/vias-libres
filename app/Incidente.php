<?php

namespace ViasLibres;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    protected $table='incident';
    protected $primaryKey='id';
    public $timestamps=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'incident_status', 'user_id','long_location','lat_location','imagen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        
    ];
}
