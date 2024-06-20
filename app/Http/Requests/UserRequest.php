<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'nama'=> 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'sometimes',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gol_darah' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'nip' => 'required',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {

            $rules = [
                'nama'=> 'required',
                'username' => 'sometimes',
                'password' => 'sometimes',
                'role' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'gol_darah' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'notlp' => 'required',
                'nip' => 'required',
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
