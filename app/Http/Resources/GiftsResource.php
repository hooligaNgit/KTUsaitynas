<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftsResource extends JsonResource
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
            'type'=>'Gifts',
            'attributes'=>[
                'name'=>$this->name,
                'unit_price'=>$this->unit_price,
                'units_owned'=>$this->units_owned,
                'type_id'=>$this->type_id,
                'box' => $this->box
            ]
        ];
    }
}
