<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AddCart;



class ProductController extends Controller
{
    public function index()
    {
        $aData = array();
        $aData['All_Products'] = Product::paginate(10);
        return view('all_product.list', $aData);
    }

    public function add_to_cart($id)
    {
        $user_id = Session::get('logged_in.id');
        $carts = new AddCart();
        $carts->product_id = $id;
        $carts->user_id = $user_id;
        $carts->save();
        return redirect('all_product')->with('success', 'Product Added To Cart Successfully');
    }

    public function cart_model()
    {
        $aData = array();
        $aData['user_id'] = Session::get('logged_in.id');
        $product_id = AddCart::where('user_id', $aData['user_id'])->select('product_id')->get();
        $aData['data'] = array();
        foreach ($product_id as $val) {
            $Product = Product::where('id', $val->product_id)->get();
            array_push($aData['data'] , $Product);
        }
        return view('all_product.cart', $aData);
    }
   
}
