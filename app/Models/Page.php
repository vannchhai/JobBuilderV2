<?php


namespace App\Models;

use App\Scopes\ActiveTranslationScope;
use Illuminate\Database\Eloquent\Model;

class Page extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    // protected $primaryKey = 'id';
    protected $appends = ['tid'];
    
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
    protected $fillable = ['type', 'parent_id', 'title', 'slug', 'content', 'active', 'lft', 'rgt', 'depth', 'translation_lang', 'translation_of'];
    protected $translatable = ['title', 'slug', 'content'];
    
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
    protected $dates = ['created_at', 'updated_at'];
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope(new ActiveTranslationScope());
    }
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function lang()
    {
        return $this->belongsToMany('App\Models\Lang');
    }
    
    public function parent()
    {
        return $this->belongsTo('App\Models\Page', 'parent_id');
    }
    
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
    public function getTidAttribute()
    {
        if (!is_null($this->attributes['translation_of']) and $this->attributes['translation_of'] != '' and $this->attributes['translation_of'] != 0) {
            return $this->attributes['translation_of'];
        } else {
            return $this->attributes['id'];
        }
    }
    
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
