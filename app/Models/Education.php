<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

class Education extends BaseModel
{
	/*
      * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'education';
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $appends = ['icode'];
    protected $visible = ['e_id', 'u_id', 'e_school', 'e_sdate', 'e_edate', 'e_level', 'e_field_study', 'e_grade', 'e_description'];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    // public $timestamps = false;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =['e_id', 'u_id', 'e_school', 'e_sdate', 'e_edate', 'e_level', 'e_field_study', 'e_grade', 'e_description'];
    
    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    // protected $hidden = [];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
   
}
