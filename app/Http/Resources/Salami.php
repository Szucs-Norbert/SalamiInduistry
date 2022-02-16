<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Salami extends JsonResource
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
            "id"=>$this->id,
            "Name"=>$this->name,
            "Price"=>$this->price,
            "Production time"=>$this->productionTime->format('d/m/Y'),
            "iid"=>$this->iid,
        ];
    }
}
