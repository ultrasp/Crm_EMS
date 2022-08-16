<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait SaveTrait
{

    public $messages = [
        'required' => '',
        'unique' => 'Дане значення вже використовується',
        'min' => 'Мінімальна довжина :min символу (-ів)',
        'max' => 'Максимальна довжина :max символу (-ів)',
        'phone' => 'Перевірте правильність телефону',
        'exists' => 'Перевірте коректність',
        'email' => 'Вкажіть релаьний email',
        'case_diff' => 'Повинен містити букви різного регістра (z і Z)',
        'symbols' => 'Повинен містити хоча б 1 символ (@, /% & ^% @ #)',
        'numbers' => 'Повинен містити хоча б 1 число',
        'letters' => 'Повинен містити хоча б 1 букву',
        'confirmed' => 'Повторіть вказаний пароль нижче',
        'dimensions' => 'Зображення повинно бути квадратним',
        'mimes' => 'Неправильний формат файлу',
        'image_fix' => 'Неправильний формат файлу (imageFix)',
    ];

    public function validateRequest($item,$rules = null){
        $validator = Validator::make(request()->all(), !empty($rules) ? $rules : $this->getRules($item), $this->messages);
        if ($validator->fails()) {
            return request()->ajax() ? response(['status' => 0, 'errors' => $validator->errors()]) : back()->withErrors($validator)->withInput();
        }

        return $validator;
    }


    public function updateResponse($instance, $callbackResult)
    {
        return request()->ajax() ? response(['status' => 1, 'message' => 'Зміни збережені']) : back()->with(['status' => 1, 'message' => 'Зміни збережені']);
    }

    public function createResponse($route= null)
    {
        $data = ['status' => 1, 'message' => 'Запис успішно створений'];
        if(!empty($route))
            $data['redirect'] = $route;

        return request()->ajax() ? response($data) : back()->with($data);
    }


}