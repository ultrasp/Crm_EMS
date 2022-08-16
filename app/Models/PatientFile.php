<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFile extends Model
{
    protected $fillable = ['name','size','patient_id','subscriber_id'];

    public function saveFile($requestFile){
        $this->name = $requestFile->getClientOriginalName();
        $fileName = time().'.'.$requestFile->getClientOriginalExtension();
        $filePath = $requestFile->storeAs('/sub'.$this->subscriber_id, $fileName, 'public_uploads');
        $this->file = $filePath;
        $this->size = $requestFile->getSize();
    }

    public static function saveItem($file, $patient_id){
        $m = new self();
        $m->patient_id = $patient_id; 
        $m->subscriber_id = auth()->user()->subscriber_id;
        $m->saveFile($file);
        $m->save();
    }

    public function getUploadUrl(){
        return asset('/uploads/'.$this->file);
    }

    function formatSizeUnits(){
        $bytes = $this->size;
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function remove(){
        if(is_file(public_path('uploads/'.$this->file))){
            unlink(public_path('uploads/'.$this->file));
        }
        $this->delete();
    }
}
