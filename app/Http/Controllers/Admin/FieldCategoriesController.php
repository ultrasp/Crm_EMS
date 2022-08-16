<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FieldCategory;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\SaveTrait;

class FieldCategoriesController extends BaseController{

   	function __construct() {
   		$this->itemClass =  FieldCategory::class;
       	parent::__construct();
	}
}
