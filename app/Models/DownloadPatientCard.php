<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadPatientCard extends Model{

    protected $fillable = [
        'card_range',
        'subscriber_id',
    ];

    const STATUS_NEW = 1;
    const STATUS_PROCESS = 2;
    const STATUS_FINISHED = 3;
    const STATUS_REMOVED = 4;

    private $pdf_folder = 'public/pdf/';


	public static function makeNew($card_range){
		$item = new self();
        $item->card_range = $card_range; 
        $item->subscriber_id = auth()->user()->subscriber_id;
        $item->creator_id = auth()->id(); 
        $item->status = self::STATUS_NEW;
		$item->save();
	}

    public static function getOnQueque(){
        $wait = self::where('status', self::STATUS_NEW)->first();
        if(!empty($wait))
            $wait->start();
        return $wait;
    }

    public function start(){
        $this->status = self::STATUS_PROCESS;
        $this->save();
    }

    public function finish($error){
        $this->remove_time = date('Y-m-d H:i:s');
        $this->status = self::STATUS_FINISHED;
        $this->error_ = $error;
        $this->save();
    }

    public function downloaded(){
        $this->download_at = date('Y-m-d H:i:s');
        $this->save();
    }

    public function getPdfFolder(){
        return $this->pdf_folder .$this->id;
    }

    public function getZipPath(){
        return storage_path('app/pdfzips/'.$this->id.'.zip');
    }

    public function removeZip(){
        if (is_file($this->getZipPath())) {
            unlink($this->getZipPath());
        }
    }

    public function getUrl(){
        return route('download.zip',['id'=>$this->id]);
    }
}
