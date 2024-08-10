<?php

// app/Http/Controllers/CoffeeShopController.php
namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $coffeeShops = Shop::all();
        // sleep(10);
        return view('shops.index', compact('coffeeShops'));
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        $products = $shop->products;
        // sleep(10);
        return view('shops.show', compact('shop', 'products'));
    }
}
