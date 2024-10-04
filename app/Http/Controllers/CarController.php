<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'Cars', description: 'API для управления автомобилями')]
class CarController extends Controller
{
    #[OA\Get(
        path: '/cars',
        summary: 'Получить список автомобилей',
        tags: ['Cars'],
        responses: [
            new OA\Response(response: 200, description: 'ok', content: new OA\JsonContent(type: 'array', items: new OA\Items(ref: '#/components/schemas/CarResource')))
        ]
    )]
    public function index(): AnonymousResourceCollection
    {
        return CarResource::collection(Car::all());
    }

    #[OA\Get(
        path: '/cars/{id}',
        summary: 'Получить одну запись',
        tags: ['Cars'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'string')
            )
        ],
        responses: [
            new OA\Response(response: 200, description: 'ok', content: new OA\JsonContent(ref: '#/components/schemas/CarResource')),
            new OA\Response(response: 404, description: 'not found'),
        ]
    )]
    public function show(Car $car): CarResource
    {
        return new CarResource($car);
    }

    #[OA\Post(
        path: '/cars',
        summary: 'Создать автомобиль',
        requestBody: new OA\RequestBody(
            description: 'Данные для создания автомобиля',
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/CarStoreRequest')
        ),
        tags: ['Cars'],
        responses: [
            new OA\Response(response: 201, description: 'ok', content: new OA\JsonContent(ref: '#/components/schemas/CarResource'))
        ]
    )]
    public function store(CarStoreRequest $request)
    {
        $car = Car::create($request->validateWithBrand());
        return response(new CarResource($car), 201);
    }

    #[OA\Put(
        path: '/cars/{id}',
        summary: 'Обновить автомобиль',
        requestBody: new OA\RequestBody(
            description: 'Данные для создания автомобиля',
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/CarUpdateRequest')
        ),
        tags: ['Cars'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'string')
            )
        ],
        responses: [
            new OA\Response(response: 201, description: 'ok', content: new OA\JsonContent(ref: '#/components/schemas/CarResource')),
            new OA\Response(response: 404, description: 'not found'),
        ]
    )]
    public function update(CarUpdateRequest $request, Car $car)
    {
        $car->update($request->validateWithBrand());
        return new CarResource($car);
    }

    #[OA\Delete(
        path: '/cars/{id}',
        summary: 'Удаление автомобиля',
        tags: ['Cars'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'string')
            )
        ],
        responses: [
            new OA\Response(response: 204, description: 'ok'),
            new OA\Response(response: 404, description: 'not found'),
        ]
    )]
    public function destroy(Car $car)
    {
        $car->delete();
        return response(null, 204);
    }
}
