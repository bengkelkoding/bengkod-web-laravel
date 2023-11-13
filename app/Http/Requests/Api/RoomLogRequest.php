<?php

namespace App\Http\Requests\Api;

class RoomLogRequest extends BaseApiRequest
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
            'nim' => 'required|string|max:50',
            'session' => 'string|max:50',
            'status' => 'required|string|max:50',
            'access_status' => 'required|string|max:50',
            'accessed' => 'required|date|date_format:Y-m-d H:i:s',
        ];
    }
}
