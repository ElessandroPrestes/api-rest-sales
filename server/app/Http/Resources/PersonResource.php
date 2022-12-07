<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
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
            'id' =>$this->id,
            'name' =>$this->name,
            'cpf' =>$this->cpf,
            'cep' =>$this->cep,
            'public_area' =>$this->public_area,
            'number' =>$this->number,
            'district' =>$this->district,
            'complement' =>$this->complement,
            'city' =>$this->city,
            'birth_date' =>$this->birth_date,
           ];

    }
}
