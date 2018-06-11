<?php


namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Language extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'abbr';
    public $incrementing = false;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;
    
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
    protected $fillable = ['abbr', 'locale', 'name', 'native', 'flag', 'app_name', 'script', 'active', 'default'];
    
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
    // protected $dates = [];
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope(new ActiveScope());
    }
    
    public static function getActiveLanguagesArray()
    {
        $active_languages = Language::where('active', 1)->get()->toArray();
        $localizable_languages_array = [];
        
        if (count($active_languages)) {
            foreach ($active_languages as $key => $lang) {
                $localizable_languages_array[$lang['abbr']] = $lang;
            }
            
            return $localizable_languages_array;
        }
        
        return config('laravellocalization.supportedLocales');
    }
    
    public static function findByAbbr($abbr = false)
    {
        return Language::where('abbr', $abbr)->first();
    }
    
    public function getDefaultHtml()
    {
        if ($this->default == 1) {
            return '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
        } else {
            return '<i class="fa fa-square-o" aria-hidden="true"></i>';
        }
    }
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getIdAttribute($value)
    {
        return $this->attributes['abbr'];
    }
    
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
