<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Form043Details;
use App\Models\Form025;
use App\Models\Form025Conclusions;

class Form025Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->resource);
        $form025 = $this->form025;
        $clinic = $this->clinic;
        if(empty($form025))
            $form025 = new Form025();
        $detail = Form043Details::getData($this->id);
        
        $data =  [
            'id' => $this->id,
            'clinic_address' =>  $clinic->address,
            'clinic_name' =>  $clinic->name,
            'clinic_kod_edropu' =>  $clinic->kod_edropu,
            'card_number' => "$this->card_number",
            'doc_year' => "$form025->doc_year",
            'name'=> $this->lastname .' ' . $this->name.' '. $this->surname,
            'birthdate' => "$this->birthday",
            'gender' => "$this->gender",
            'address' => "$this->address",
            'phone' => "$this->phone",
            'field5' => "$form025->field5",
            'field6' => "$form025->field6",
            'field8text' =>  "$form025->field8text",
            'field8' =>  "$form025->field8",
            'field9' =>  "$form025->field9",
            'field10' =>  "$form025->field10",
            'field10text' =>  "$form025->field10text",
            'field11' =>  "$form025->field11",
            'field11text' =>  "$form025->field11text",
            'blood' =>  "$form025->blood",
            'rezus' =>  "$form025->rezus",
            'blood_transfusion' =>  "$form025->blood_transfusion",
            'diabet' =>  "$form025->diabet",
            'infection' =>  "$form025->infection",
            'hirurgion' =>  "$form025->hirurgion",
            'allergy' =>  "$form025->allergy",
            'preparate' =>  "$form025->preparate",
            'factor_risk' =>  "$form025->factor_risk",
            'maket2_doctor' => $form025->getDoctor(),
            'field16' => $detail['field16'],
            'field16dates' => $detail['field16dates'],
            'concData' => (object)Form025Conclusions::getData($this->id),
            'pages' => $detail['pages'],
            'doctors' => $detail['doctors'],
        ];
        // dd($data);
        return $data;
    }
}