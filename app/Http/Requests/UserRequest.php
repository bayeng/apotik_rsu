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
            'username' => 'required | unique:users,username',
            'password' => 'required',
            'email' => 'required ',
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
                'nama'=> 'sometimes',
                'email' => 'sometimes|unique:users.email ',
                'username' => 'sometimes|unique:users,username',
                'password' => 'sometimes',
                'role' => 'sometimes',
                'jenis_kelamin' => 'sometimes',
                'tempat_lahir' => 'sometimes',
                'tgl_lahir' => 'sometimes',
                'gol_darah' => 'sometimes',
                'agama' => 'sometimes',
                'alamat' => 'sometimes',
                'notlp' => 'sometimes',
                'nip' => 'sometimes',
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
