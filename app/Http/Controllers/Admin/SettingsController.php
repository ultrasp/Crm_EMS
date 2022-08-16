<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SettingsController extends Controller{

	public function index(){
		$items = Settings::getItems();
		$v = Settings::getValues();
		// dd($v);
	    return view('admin.settings.index',compact('items','v'));
	}

	public function store(Request $request){
		Settings::saveValues($request->except('_token'));
		return redirect()->back();
	}

}
