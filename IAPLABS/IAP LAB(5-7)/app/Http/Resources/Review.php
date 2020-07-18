<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
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
            'car_id' => $this->car_id,
            'comment' => $this->comment,
            'updated_at' => $this->updated_at
        ];

        //return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'meta' => [
                'version' => '1.0.0',
                'author' => url("https://jeffreykingori.dev")
            ],
        ];
    }

}
