<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return match ($this->method()) {
            "POST" => [
                "tipo_vacuna" => "required",
                "mascota_id" => "required",
                "fecha" => "required",
                "detalle" => "max:150",
            ],
            "PUT" => [
                "tipo_vacuna" => "required",
                "mascota_id" => "required",
                "fecha" => "required",
                "detalle" => "max:150",
            ],
        };
    }
}
