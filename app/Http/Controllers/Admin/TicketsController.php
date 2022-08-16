<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\SaveTrait;

class TicketsController extends BaseController{

   	function __construct() {
   		$this->itemClass =  Ticket::class;
       	parent::__construct();
	}

	public function changeStaus($id){
		$ticket = Ticket::where('id',$id)->first();
		$ticket->close();
		return redirect()->back();
	}
}
