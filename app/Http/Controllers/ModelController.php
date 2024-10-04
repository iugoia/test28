<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModelResource;
use App\Models\CarModel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'Models', description: 'API для управления моделями автомобиля')]
class ModelController extends Controller
{
    #[OA\Get(
        path: '/models',
        summary: 'Получить список моделей',
        tags: ['Models'],
        responses: [
            new OA\Response(response: 200, description: 'ok', content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/ModelResource'))),
        ]
    )]
    public function index(): AnonymousResourceCollection
    {
        return ModelResource::collection(CarModel::all());
    }
}
