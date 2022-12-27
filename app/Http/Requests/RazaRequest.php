<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RazaRequest extends FormRequest
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
    public function rules(): array
    {
        return match ($this->method()) {
            "POST" => [
                "nombre" => "required|min:2|max:40|unique:razas",
            ],
            "PUT" => [
                "nombre" => "required|min:2|max:40|unique:razas",
            ],
        };
    }
}
