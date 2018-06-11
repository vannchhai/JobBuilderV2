<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class BaseModel extends Model
{
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    
    // ...
}
