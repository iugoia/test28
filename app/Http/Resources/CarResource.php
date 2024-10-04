<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CarResource',
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'year_of_manufacture', type: 'string', example: '2010'),
        new OA\Property(property: 'mileage', type: 'integer', example: 100),
        new OA\Property(property: 'color', type: 'string', example: 'Белый'),
        new OA\Property(property: 'brand', properties: [
            new OA\Property(property: 'id', type: 'integer', example: 1),
            new OA\Property(property: 'name', type: 'string', example: 'Название марки')
        ], type: 'object'),
        new OA\Property(property: 'model', properties: [
            new OA\Property(property: 'id', type: 'integer', example: 1),
            new OA\Property(property: 'name', type: 'string', example: 'Название модели')
        ], type: 'object'),
    ]
)]

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                  => $this->id,
            'year_of_manufacture' => $this->year_of_manufacture,
            'mileage'             => $this->mileage,
            'color'               => $this->color,
            'brand'               => [
                'id'   => $this->car_brand_id,
                'name' => $this->car_brand->name,
            ],
            'model'               => [
                'id'   => $this->car_model_id,
                'name' => $this->car_model->name
            ]
        ];
    }
}
