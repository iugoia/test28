<?php

namespace App\Http\Requests;

use App\Models\CarModel;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CarUpdateRequest',
    properties: [
        new OA\Property(property: 'car_model_id', type: 'integer', example: 1),
        new OA\Property(property: 'year_of_manufacture', type: 'integer', example: 2024),
        new OA\Property(property: 'mileage', type: 'integer', example: 100),
        new OA\Property(property: 'color', type: 'string', example: 'Белый')
    ]
)]
class CarUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'car_model_id'        => ['sometimes', 'exists:car_models,id'],
            'year_of_manufacture' => ['nullable', 'integer', 'digits:4'],
            'mileage'             => ['nullable', 'integer'],
            'color'               => ['nullable', 'string', 'max:255'],
        ];
    }

    public function validateWithBrand()
    {
        $validated = $this->validated();
        if ($this->has('car_model_id')) {
            $validated['car_brand_id'] = CarModel::find($this->car_model_id)->car_brand_id;
        }
        return $validated;
    }
}
