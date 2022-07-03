<?php

namespace App\Http\Resources;

use App\Models\PhysicalPerson;
use Illuminate\Http\Resources\Json\JsonResource;


class PersonResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'persons';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'street' => $this->street,
            'streetNumber' =>$this->streetNumber,
            'neighborhood' =>$this->neighborhood,
            'zipcode' =>$this->zipcode,
            'city' =>$this->city,
            'UF' =>$this->UF,
            'physicalPersons' => $this->physicalPersons,
            'contacts' => $this->contacts,
        ];

       
    }

    public function withResponse($request, $response)
    {
        if ($response->getData()) {
            $response->setStatusCode(200);
        } else {
            $response->setStatusCode(404);
        }
        parent::withResponse($request, $response);
    }
   
}
