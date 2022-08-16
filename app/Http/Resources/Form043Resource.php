<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Form043Details;
use App\Models\Form043;

class Form043Resource extends JsonResource
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
        $form043 = $this->form043;
        $clinic = $this->clinic;
        if(empty($form043))
            $form043 = new Form043();
        $detail = Form043Details::getData($this->id);

        $data =  [
            'id' => $this->id,
            'clinic_address' =>  $clinic->address,
            'clinic_name' =>  $clinic->name,
            'clinic_kod_edropu' =>  $clinic->kod_edropu,
            'card_number' => "$this->card_number",
            'doc_year' => "$form043->doc_year",
            'name'=> $this->lastname .' ' . $this->name.' '. $this->surname,
            'birthdate' => "$this->birthday",
            'gender' => "$this->gender",
            'address' => "$this->address",
            'phone' => "$this->phone",
            'field5' => "$form043->field5",
            'field6' => "$form043->field6",
            'field7' =>  "$form043->field7",
            'field71' =>  "$form043->field71",
            'field72' =>  "$form043->field72",
            'field73' =>  "$form043->field73",
            'field74' =>  "$form043->field74",
            'field75' =>  "$form043->field75",
            'field76' =>  "$form043->field76",
            'field77' =>  "$form043->field77",
            'field78' =>  "$form043->field78",
            'field79' =>  "$form043->field79",
            'field80' =>  "$form043->field80",
            'field81' =>  "$form043->field81",
            'field82' =>  "$form043->field82",
            'field8' =>  "$form043->field8",
            'field9' =>  "$form043->field9",
            'field9time' => empty($form043->field9time) ? [] : json_decode($form043->field9time),
            'field9table' => empty($form043->field9table) ? [] : json_decode($form043->field9table),
            'field10' => "$form043->field10",
            'field11' => "$form043->field11",
            'field12' => "$form043->field12",
            'field13' => "$form043->field13",
            'field14' => "$form043->field14",
            'field15' => "$form043->field15",
            'field15text' => "$form043->field15text",
            'field16' => $detail['field16'],
            'field16dates' => $detail['field16dates'],
            'field17' => $detail['field17'],
            'field17dates' => $detail['field17dates'],
            'pages' => $detail['pages'],
            'doctors' => $detail['doctors'],
            'field18' => "$form043->field18",
            'field19' => "$form043->field19",
        ];
        // dd($data);
        return $data;
    }
}