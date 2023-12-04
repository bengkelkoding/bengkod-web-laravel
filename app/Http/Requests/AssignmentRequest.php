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
            'title' => 'required|string',
            'description' => 'string',
            'task_file' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:10000',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'deadline' => 'required|date_format:Y-m-d H:i:s|after:start_time',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'start_time' => Carbon::createFromFormat('d/m/Y, g:i A', $this->request->get('start_time'))->toDateTimeString(),
            'deadline' => Carbon::createFromFormat('d/m/Y, g:i A', $this->request->get('deadline'))->toDateTimeString(),
        ]);
    }
}
