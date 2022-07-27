<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'id'    => $this->id,
            'title' => $this->title,
            'location_id' => $this->location_id,
            'category_id' => $this->category_id,
            'type_id' => $this->type_id,
            'place_id' => $this->place_id,
            'email' => $this->email,
            'description' => $this->description,

        ];
    }
}
