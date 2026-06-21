<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "My Orders - Online Store";
        $viewData["subtitle"] = "My orders";
        $viewData["orders"] = Auth::user()->orders()->with('items.product')->get();

        return view('order.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $productsInSession = $request->session()->get("products");
        if (!$productsInSession) {
            return redirect()->route('cart.index');
        }

        $productsInCart = Product::findMany(array_keys($productsInSession));
        $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);

        $newOrder = new Order();
        $newOrder->setUserId(Auth::user()->id);
        $newOrder->setTotal($total);
        $newOrder->save();

        foreach ($productsInCart as $product) {
            $newItem = new Item();
            $newItem->setOrderId($newOrder->getId());
            $newItem->setProductId($product->getId());
            $newItem->setQuantity($productsInSession[$product->getId()]);
            $newItem->setPrice($product->getPrice());
            $newItem->save();
        }

        $request->session()->forget('products');

        return redirect()->route('order.index');
    }
}