<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Blogresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'email' => $this->email,
            'detail_link'=>route('show',$this->id),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
