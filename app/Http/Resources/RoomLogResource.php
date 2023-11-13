<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'nim' => $this->nim,
                'session' => $this->session,
                'status' => $this->status,
                'access_status' => $this->access_status,
                'accessed' => $this->accessed,
            ],
            'meta' => [
                'success' => true,
                'message' => 'Success Create Room Log',
                'pagination' => (object)[],
            ],
        ];
    }
}
