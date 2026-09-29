<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
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

        foreach ($products as &$p) {
            if (!isset($p['status'])) {
                if ($p['stock'] <= 5) $p['status'] = 'Kritis';
                else if ($p['stock'] <= 20) $p['status'] = 'Menipis';
                else $p['status'] = 'Aman';
            }
        }

        return view('stok', compact('products'));
    }

    public function store(Request $request)
    {
        $products = $request->session()->get('products', []);
        
        $newProduct = [
            'id' => time(), 
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'image_path' => $request->input('image_path') ?? '',
            'status' => $request->input('stock') <= 5 ? 'Kritis' : ($request->input('stock') <= 20 ? 'Menipis' : 'Aman')
        ];

        $products[] = $newProduct;
        $request->session()->put('products', $products);

        return redirect()->route('stok');
    }

    public function update(Request $request, $id)
    {
        $products = $request->session()->get('products', []);

        foreach ($products as &$product) {
            if ($product['id'] == $id) {
                $product['product_name'] = $request->input('product_name');
                $product['price'] = $request->input('price');
                $product['stock'] = $request->input('stock');
                $product['image_path'] = $request->input('image_path') ?? '';
                $product['status'] = $request->input('stock') <= 5 ? 'Kritis' : ($request->input('stock') <= 20 ? 'Menipis' : 'Aman');
                break;
            }
        }

        $request->session()->put('products', $products);

        return redirect()->route('stok');
    }

    public function destroy(Request $request, $id)
    {
        $products = $request->session()->get('products', []);
        
        $products = array_filter($products, function($product) use ($id) {
            return $product['id'] != $id;
        });

        $products = array_values($products);
        $request->session()->put('products', $products);

        return redirect()->route('stok');
    }
}
