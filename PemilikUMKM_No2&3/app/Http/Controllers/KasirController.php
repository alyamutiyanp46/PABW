<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    private function getDummyProducts()
    {
        return [
            ['id' => 1, 'product_name' => 'Nasi Goreng Spesial', 'price' => 25000, 'stock' => 50, 'image_path' => ''],
            ['id' => 2, 'product_name' => 'Ayam Geprek', 'price' => 20000, 'stock' => 30, 'image_path' => ''],
            ['id' => 3, 'product_name' => 'Es Teh Manis', 'price' => 5000, 'stock' => 100, 'image_path' => ''],
            ['id' => 4, 'product_name' => 'Kopi Hitam', 'price' => 10000, 'stock' => 80, 'image_path' => ''],
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->has('products')) {
            $request->session()->put('products', $this->getDummyProducts());
        }

        $products = $request->session()->get('products');

        return view('kasir', compact('products'));
    }

    public function checkout(Request $request)
    {
        $cart = json_decode($request->input('cart_data'), true);
        
        if (empty($cart)) {
            return redirect()->route('kasir')->with('error', 'Keranjang kosong!');
        }

        $products = $request->session()->get('products', []);
        
        $totalSales = 0;

        foreach ($cart as $item) {
            foreach ($products as &$product) {
                if ($product['id'] == $item['id']) {
                    $product['stock'] = max(0, $product['stock'] - $item['qty']);
                    $totalSales += ($product['price'] * $item['qty']);
                    break;
                }
            }
        }

        $request->session()->put('products', $products);
        $currentRevenue = $request->session()->get('total_revenue', 8750000);
        $request->session()->put('total_revenue', $currentRevenue + $totalSales);

        return redirect()->route('kasir')->with('success_total', $totalSales);
    }
}
