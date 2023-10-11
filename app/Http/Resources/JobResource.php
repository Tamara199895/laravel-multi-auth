<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'freelancer_id' => $this->freelancer_id,
            'customer_id' => $this->customer_id,
            'work_name' => $this->work_name,
            'work_description' => $this->work_description,
            'status' => $this->status,
            'rate' => $this->rate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
