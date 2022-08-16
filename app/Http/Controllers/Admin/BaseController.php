<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\PromoCode;
use App\Models\RatePlan;
use App\Models\Document;
use App\Models\VideoInstruction;
use App\Models\FieldTemplate;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\SaveTrait;
use App\Models\FieldCategory;

class BaseController extends Controller{

    use SaveTrait;

   	function __construct() {
        if(!empty($this->itemClass))
		  $this->reflectionClass = new $this->itemClass();
   	}

    protected $itemClass;
    private $reflectionClass;
    private $rawColumns = ['action'];

	public function index(Builder $builder){
		// dd(new $this->itemClass());;
	    if (request()->ajax()) {
	        $dt = DataTables::of(method_exists($this->reflectionClass,'getListQuery') ? $this->reflectionClass::getListQuery() : $this->reflectionClass::query());
            if($this->reflectionClass->show_action){
                $dt->addColumn('action', function ( $item) {
                    $html = '';
                    if($this->reflectionClass->showEdit)
                    $html .= ' &nbsp;
                            <a href="' . route($this->reflectionClass->url_prefix.'.item', ['id' => $item->id]) . '" class="btn btn-primary btn-sm "><i class="fa fa-edit"></i></a>';
                    if(method_exists($this->reflectionClass,'getCustomRowButtons')){
                        foreach ($this->reflectionClass::getCustomRowButtons() as $key => $button) {
                            $html .= ' &nbsp;'.$item->{$button['function']}();
                        }
                    }
                    if($this->reflectionClass->showDelete){
                        $html .= ' &nbsp;
                            <button data-id="' . $item->id.'" class="btn btn-danger btn-sm deleteRow"><i class="fa fa-trash"></i></button>';

                    }
                    return $html;
                });
                $this->rawColumns = ['action'];
            }
            $dt = $this->editColumns($dt);
            $dt->rawColumns($this->rawColumns);
            return $dt->toJson();
	    }

	    $html = $builder
                ->columns($this->showColumns())
                ->parameters([
                    'language' => [
                        'url' => url('//cdn.datatables.net/plug-ins/1.10.24/i18n/Russian.json')
                    ],
                ]);
        $title = method_exists($this->reflectionClass,'getTitle') ? $this->reflectionClass->getTitle() : $this->reflectionClass->multi_items;
        $topButtons = $this->reflectionClass->getTopButtons();
        $urlPrefix = $this->reflectionClass->url_prefix;
        $footer_text = method_exists($this->reflectionClass,'getFooter') ? $this->reflectionClass->getFooter() : '';

	    return view('admin.base.index',compact('html','title','topButtons','urlPrefix','footer_text'));
	}

    public function showColumns(){
        $list = $this->reflectionClass::showColumns();
        if($this->reflectionClass->show_action){
            $list[] = ['data' => 'action', 'name' => 'action', 'title' => ''];
        }
        return $list;
    }

    public function editColumns($dt){
        foreach ($this->reflectionClass::showColumns() as $key => $column) {
            if(isset($column['function'])){
                $dt->editColumn($column['name'], function($obj) use ($column) {
                    return $obj->{$column['function']}($obj->{$column['name']});
                });
                $this->rawColumns[] = $column['name'];
                // $dt->editColumn($column['name'],$this->reflectionClass->{$column['function']}());
            }
        }
        return $dt;
    }

	public function form($id = null){
		$item = empty($id) ? new $this->reflectionClass() : $this->reflectionClass->where('id',$id)->first();
	    return view('admin.base.store',compact('item'));
	}

	public function getRules($item){
		return $this->reflectionClass::rules($item);
	}

	public function store(Request $request){
        $item = empty($request->id) ? new $this->reflectionClass() : $this->reflectionClass->where('id',$request->id)->first();
        if (!(($validator = $this->validateRequest($item)) instanceof \Illuminate\Validation\Validator)) {
            return $validator;
        }
        $data = $request->except(['_token']);
        // dd($request->file);
        if(isset($item->files)){
            foreach ($item->files as $key => $attr) {
                if(!empty($request->$attr)){
                    $fileName = time().'.'.$request->$attr->getClientOriginalExtension();
                    $filePath = $request->$attr->storeAs('', $fileName, 'public_uploads');
                    $data[$attr] = $filePath;
                    // dd(public_path('upload/'.$item->$attr));
                    if(!empty($item->$attr) && is_file(public_path('uploads/'.$item->$attr))){
                        unlink(public_path('uploads/'.$item->$attr));
                    }
                }
            }
        }
        $faq = $item->fill($data)->save();
        return $this->createResponse(route($this->reflectionClass->url_prefix.'.index'));;
    }

    public function delete($item,Request $request){
        $class = $this->getItemClass($item)::query();
        $item = $class->where('id',$request->id)->first();
        if(method_exists($item,'remove')){
            $item->remove();
        }else{
            $item->delete();
        }
    }

    public function getItemClass($name){
        $list =  [
            'faq' => Faq::class,
            'promocode' => PromoCode::class,
            'rateplan' => RatePlan::class,
            'document' => Document::class,
            'videoinstruction' => VideoInstruction::class,
            'fieldcategory' => FieldCategory::class,
            'fieldtemplate' => FieldTemplate::class
        ];
        return $list[$name];
    }

}
