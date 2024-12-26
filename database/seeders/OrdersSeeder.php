<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(base_path('data/orders.json'));
        $data = json_decode($json, true);

        foreach ($data as $orderData) {
            $customer = Customer::firstOrCreate(['name' => $orderData['cliente']]);

            $order = Order::create([
                'customer_id' => $customer->id,
                'date' => $orderData['fecha'],
            ]);

            foreach ($orderData['productos'] as $productData) {
                $product = Product::firstOrCreate(
                    ['name' => $productData['nombre']],
                    ['price' => $productData['precio']]
                );

                $order->products()->attach($product, ['quantity' => $productData['cantidad']]);
            }
        }
    }
}

