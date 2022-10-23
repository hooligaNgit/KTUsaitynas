<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoxResource extends JsonResource
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
        'id'=>(string)$this->id,
        'type'=>'Boxes',
        'attributes'=>[
            'name'=>$this->name,
            'status'=>$this->status,
            'dispatch_date'=>$this->dispatch_date,
            'delivery_date'=>$this->delivery_date,
            'gift'=>$this->gift
        ]
    ];
    }
}
