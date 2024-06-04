<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SuplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nama' => 'required | unique:supliers,nama',
            'alamat' => 'required',
            'kota' => 'required',
            'notlp' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {

            $rules = [
                'nama' => 'sometimes|unique:supliers,nama',
                'alamat' => 'sometimes',
                'kota' => 'sometimes',
                'notlp' => 'sometimes',
                'nama_bank' => 'sometimes',
                'no_rekening' => 'sometimes',
            ];
        }

        return $rules;


    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], 422));
    }
}
