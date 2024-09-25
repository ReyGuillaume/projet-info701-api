<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveryResource;
use App\Models\Delivery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $delivery = Delivery::all();
        return $this->sendResponse(
            DeliveryResource::collection($delivery),
            'Deliveries retrieved successfully.'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $delivery = Delivery::create($request->all());

        return $this->sendResponse(
            new DeliveryResource($delivery),
            'Delivery created successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $delivery = Delivery::find($id);
        if (is_null($delivery)) {
            return $this->sendError('Delivery not found.');
        }
        return $this->sendResponse(
            new DeliveryResource($delivery),
            'Delivery retrieved successfully.'
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $delivery = Delivery::find($id);
        if (is_null($delivery)) {
            return $this->sendError('Delivery not found.');
        }

        $request->validate([
            'name' => ['string'],
            'quantity' => ['integer', 'min:1'],
        ]);

        if ($request->has('name')) {
            $delivery->name = $request['name'];
        }

        if ($request->has('quantity')) {
            $delivery->quantity = $request['quantity'];
        }

        $delivery->save();
        return $this->sendResponse(
            new DeliveryResource($delivery),
            'Delivery updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $delivery = Delivery::find($id);
        if (is_null($delivery)) {
            return $this->sendError('Delivery not found.');
        }

        $delivery->delete();
        return $this->sendResponse($delivery, 'Delivery deleted successfully.');
    }
}
