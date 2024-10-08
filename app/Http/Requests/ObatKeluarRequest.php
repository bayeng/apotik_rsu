<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ObatKeluarRequest extends FormRequest
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
        return [
            'id_user' => 'required',
            'id_tujuan' => 'required',
            'total_harga' => 'required',
            'nama_obat' => 'required',
            'nama_obat.*' => 'required',
            'jumlah' => 'required',
            'jumlah.*' => 'required',
            'harga' => 'required',
            'harga.*' => 'required',
            'catatan' => 'required',
            'image' => 'sometimes|image:jpeg,png,jpg,gif,svg',
        ];
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
