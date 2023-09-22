<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'judul' => 'required|string',
            'deskripsi' => 'string',
            'file_soal' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:10000',
            'waktu_mulai' => 'required|date_format:Y-m-d H:i:s|after:now',
            'deadline' => 'required|date_format:Y-m-d H:i:s|after:waktu_mulai',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'waktu_mulai' => Carbon::createFromFormat('d/m/Y, g:i A', $this->request->get('waktu_mulai'))->toDateTimeString(),
            'deadline' => Carbon::createFromFormat('d/m/Y, g:i A', $this->request->get('deadline'))->toDateTimeString(),
        ]);
    }
}
