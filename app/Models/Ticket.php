<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Ticket extends BaseModel
{
    use HasFactory;

    public $url_prefix = 'ticket';
    public $show_action = true;
    public $single_item = 'Ticket';
    public $multi_items = 'Tickets';
    public $showDelete = false;
    public $showEdit = false;

    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;

    public static function showColumns(){
    	return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'title', 'name' => 'title', 'title' => __('Title')],
            ['data' => 'question', 'name' => 'question', 'title' => __('Question')],
            ['data' => 'file', 'name' => 'file', 'title' => __('File'),'function'=>'getFileUrl'],
            ['data' => 'adminName', 'name' => 'adminName', 'title' => __('Admin name'),'function'=>'getAdminName'],
            ['data' => 'adminContact', 'name' => 'adminContact', 'title' => __('Admin contact'),'function'=>'getAdminContact'],
            // ['data' => 'adminPhone', 'name' => 'adminPhone', 'title' => __('Admin Phone'),'function'=>'getAdminName'],
            ['data' => 'clinicName', 'name' => 'clinicName', 'title' => __('Clinic name'),'function'=>'getClinicName'],
            ['data' => 'status', 'name' => 'status', 'title' => __('Status_'),'function'=>'getStatus'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created_at'),'function'=>'getCreatdAt'],
    	];
    }

    public static function rules(){
    	return [
    		'title' => 'required',
            'question' => 'required',
            'file' => 'nullable|file|mimes:pdf,jpeg,bmp,png,doc,docx'
    	];
    }

    public function getTopButtons(){
        return [
        ];
    }

    protected $fillable = ['title','description']; 

    public function getCreatdAt(){
        return date('d.m.Y',strtotime($this->created_at));
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscribe::class,'subscriber_id');
    }

    public static function addItem($title,$question,$upfile){
        $ticket = new self(); 
        $ticket->title = $title;
        $ticket->question = $question;
        if(!empty($upfile))
            $ticket->saveFile($upfile,'file');
        $ticket->created_by = auth()->id();
        $ticket->subscriber_id = auth()->user()->subscriber_id;
        $ticket->status  = self::STATUS_OPEN;
        $group = self::max('group_id');
        $ticket->group_id =  empty($group) ? 1 : $group + 1;
        $ticket->save();
    }

    public function getAdminName(){
        $owner = $this->subscriber->owner;
        return !empty($owner) ? $owner->fullname : '';
    }

    public function getAdminContact(){
        $owner = $this->subscriber->owner;
        return !empty($owner) ? $owner->phone.' '.$owner->email : '';
    }

    public function getClinicName(){
        return $this->subscriber->clinic->name;
    }

    public static function getStatuses(){
        return [
            self::STATUS_OPEN => __('open'),
            self::STATUS_CLOSED => __('closed')
        ];
    }

    public function getStatus(){
        return self::getStatuses()[$this->status];
    }

    public static function openTicketCount(){
        return self::where('status',self::STATUS_OPEN)->count();
    }

    public static function getListQuery(){
        return self::query()->orderBy('created_at','desc');
    }

    public function getChangeStatusBtn(){
        return  $this->status == self::STATUS_OPEN ? '<a href="' . route($this->url_prefix.'.item.changeStaus', ['id' => $this->id]) . '" class="btn btn-primary btn-sm "><i class="fa fa-check"></i></a>' : '';

    }

    public function close(){
        $this->status = self::STATUS_CLOSED;
        $this->save();
    }

    public static function getCustomRowButtons(){
        return [
            ['function' => 'getChangeStatusBtn']
        ];
    }
}
