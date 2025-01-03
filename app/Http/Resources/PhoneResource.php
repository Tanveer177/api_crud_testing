<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'model' => $this->model,
            'descriptions' => $this->descriptions,
            'user_id' => new UserResource($this->user_id),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
