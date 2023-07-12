<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\DomainException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TournamentRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'tipo' => 'required|numeric|in:1,2',
            'partidos' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'tipo.in' => 'El campo tipo solo puede ser 1 para femenino o 2 para masculino.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}

