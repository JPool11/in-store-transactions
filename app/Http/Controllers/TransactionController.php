<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'products' => 'required|array',
            'products.*.name' => 'required|string',
            'products.*.price' => 'required|numeric',
            'products.*.quantity' => 'required|integer',
            'date' => 'required|date'
        ]);

        $customer = Customer::firstOrCreate(['name' => $validated['name']]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'date' => $validated['date'],
        ]);

        foreach ($validated['products'] as $productData) {
            $product = Product::firstOrCreate(
                ['name' => $productData['name']],
                ['price' => $productData['price']]
            );

            $order->products()->attach($product->id, ['quantity' => $productData['quantity']]);
        }

        return response()->json(['message' => 'Transaction created successfully!', 'order' => $order], 201);
    }

    public function summary()
    {
        $orders = Order::with('customer', 'products')->get();

        $summary = [];
        foreach ($orders as $order) {
            $totalSpent = $order->products->sum(function($product) {
                return $product->pivot->quantity * $product->price;
            });

            $summary[] = [
                'name' => $order->customer->name, // Cambiado de client a name
                'total_spent' => $totalSpent,
                'products' => $order->products->map(function($product) {
                    return [
                        'name' => $product->name, // Nombre del producto
                        'quantity' => $product->pivot->quantity, // Cantidad
                        'price' => $product->price // Precio
                    ];
                }),
                'date' => $order->date, // Fecha
            ];
        }

        usort($summary, function ($a, $b) {
            return $b['total_spent'] <=> $a['total_spent'];
        });

        return response()->json($summary);
    }
}
