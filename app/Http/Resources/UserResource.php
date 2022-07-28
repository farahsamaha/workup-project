<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'    => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'birth_date' => $this->birth_date,
            'about' => $this->about,
            'featured_image' => $this->featured_image,
            'mobile' => $this->mobile,
            'location_id'=> $this->location_id,
            'skill_id'=> $this->skill_id,
            'certificate_id'=> $this->certificate_id,
            'experience_id' => $this->experience_id,
            'organization_id' => $this->organization_id,
        ];
    }
}
