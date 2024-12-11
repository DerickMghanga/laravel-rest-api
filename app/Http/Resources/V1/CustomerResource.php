<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// "Resource" controls all JSON responses format and presentation
class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [  // $this  behaves like a model class
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postalCode' => $this->postal_code,
            // inlude invoices if available in query string
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices'))
        ];
    }
}
