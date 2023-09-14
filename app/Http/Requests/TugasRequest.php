<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_mahasiswa' => 'nullable|string',
            'id_kursus' => 'nullable|string',
            'file_tugas' => 'nullable|string',
            'nilai_akhir' => 'nullable|string'
        ];
    }
}
