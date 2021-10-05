<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermitResource extends JsonResource
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
            'user_id' => $this->user_id,
            'file' => $this->file,
            'description' => $this->description,
            'date' => $this->dates,
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'status'    => 200,
            'error'     => 0
        ];
    }
}
