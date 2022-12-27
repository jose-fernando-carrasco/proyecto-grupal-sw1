<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotaRequest extends FormRequest
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
                "nombre" => "required|min:2|max:40",
                "edad" => "required",
                "color" => "required",
                "raza_id" => "required|exists:razas,id",
                "duenho_id" => "required|exists:users,id",
            ],
            "PUT" => [
                "nombre" => "required|min:2|max:40",
                "edad" => "required",
                "color" => "required",
                "raza_id" => "required|exists:razas,id",
                "duenho_id" => "required|exists:users,id",
            ],
        };
    }
}
