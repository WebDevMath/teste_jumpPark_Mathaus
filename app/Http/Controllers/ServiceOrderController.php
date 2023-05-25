<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;

class ServiceOrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehiclePlate' => 'required|string',
            'entryDateTime' => 'required|date',
            'exitDateTime' => 'required|date',
            'priceType' => 'required|string',
            'price' => 'required|numeric',
            'userId' => 'required|exists:users,id',
        ]);

        $serviceOrder = ServiceOrder::create($validatedData);

        return response()->json($serviceOrder, 201);
    }

    public function index(Request $request)
    {
        $query = ServiceOrder::query()->with('user');

        if ($request->has('vehiclePlate')) {
            $query->where('vehiclePlate', $request->input('vehiclePlate'));
        }

        $serviceOrders = $query->paginate(5);

        return response()->json($serviceOrders);
    }
}
