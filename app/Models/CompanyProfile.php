<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

class CompanyProfile extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company_profile';
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $appends = ['icode'];
    protected $visible = ['id', 'company_name', 'country_code','company_no','company_zip', 'company_street','company_commune','user_id', 'company_slogan', 'company_hiring', 'company_no_emp', 'company_type', 'company_description', 'company_website', 'company_mission','company_about', 'logo', 'company_phone', 'company_address', 'company_email','company_facebook', 'company_twitter','company_linkedin','city_id', 'lat', 'lon', 'ip_addr', 'active'];
    
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
    protected $fillable = ['id', 'company_name', 'country_code','company_no','company_zip','company_street','company_commune', 'user_id', 'company_slogan', 'company_hiring', 'company_no_emp', 'company_type', 'company_description', 'company_website','company_about','company_mission', 'logo', 'company_phone', 'company_address', 'company_email', 'city_id', 'company_facebook','company_twitter','company_linkedin','lat', 'lon', 'ip_addr', 'active'];
    
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
    protected $dates = ['created_at', 'created_at'];
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    
}
