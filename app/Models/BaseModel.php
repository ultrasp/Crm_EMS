<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $showEdit = true;

    public function getFormatedDate($value){
        return empty($value) ? __('Not seted') : date('d.m.Y',strtotime($value));
    }

    public function getFileUrl($value){
    	return empty($value) ? '' : "<a href=".asset('uploads/'.$value)." target='_blank'>".$value."</a>";
    }

    public function saveFile($requestFile, $attr){
    	
    	$old_value = $this->$attr;

        $fileName = time().'.'.$requestFile->getClientOriginalExtension();
        $filePath = $requestFile->storeAs('', $fileName, 'public_uploads');
        $this->$attr = $filePath;

        if(!empty($old_value) && is_file(public_path('uploads/'.$old_value))){
            unlink(public_path('uploads/'.$old_value));
        }

    }
}
