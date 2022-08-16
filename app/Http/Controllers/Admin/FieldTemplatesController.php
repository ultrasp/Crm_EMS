<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FieldTemplate;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\SaveTrait;

class FieldTemplatesController extends BaseController{

   	function __construct() {
   		$this->itemClass =  FieldTemplate::class;
       	parent::__construct();
	}

	// public function index(){
		
	// }
}
