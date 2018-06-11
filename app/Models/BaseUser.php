<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Larapen\CRUD\CrudTrait;

class BaseUser extends Authenticatable
{
	use CrudTrait;
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

	public function getActiveHtml()
	{
		if (!isset($this->active)) return false;

		$id = $this->{$this->primaryKey};
		$lineId = 'active' . $id;
		$data = 'data-table="' . $this->getTable() . '" 
			data-field="active" 
			data-line-id="' . $lineId . '" 
			data-id="' . $id . '" 
			data-value="' . $this->active . '"';

		// Decoration
		if ($this->active == 1) {
			$html = '<i id="' . $lineId . '" class="fa fa-check-square-o" aria-hidden="true"></i>';
		} else {
			$html = '<i id="' . $lineId . '" class="fa fa-square-o" aria-hidden="true"></i>';
		}
		$html = '<a href="" class="ajax-request" ' . $data . '>' . $html . '</a>';

		return $html;
	}
    
    // ...
}
