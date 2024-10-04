<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Models\CarBrand;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'Brands', description: 'API для управления марками автомобиля')]
class BrandController extends Controller
{
    #[OA\Get(
        path: '/brands',
        summary: 'Получить список марок',
        tags: ['Brands'],
        responses: [
            new OA\Response(response: 200, description: 'ok', content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/BrandResource'))),
        ]
    )]
    public function index(): AnonymousResourceCollection
    {
        return BrandResource::collection(CarBrand::all());
    }
}
