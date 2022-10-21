<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductManagementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aData = array();
        $aData['All_Products'] = Product::paginate(10);
        return view('product_managements.list', $aData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_managements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        if ($request->image) {
            $destination_path = public_path() . '/uploads/images/';
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $input['image'] = $filename;
            $file->move($destination_path, $filename);
        }

        $product = new Product();
        $product->product_name = $input['product_name'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        $product->image = $input['image'];
        $product->save();
        return redirect()->route('product_managements.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aData = array();
        $aData['aProducts'] = Product::find($id);
        return view('product_managements.edit', $aData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    // dd($request->all);

        $input = $request->all();
        $this->validate($request,[
            'product_name' => 'required',
            'description'=>'required',
            'price'=>'required|numeric'
        ]);

        if($request->image){ 
            $destination_path = public_path().'/uploads/images/';
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();   
            $filename = time().'.'.$extenstion;  
            $input['image'] = $filename;                 
            $file->move($destination_path, $filename);            
        }  

        $product = Product::findOrFail($id);
        $product->product_name = $input['product_name'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        if($request->image){ 
            $product->image = $input['image'];
        }
        $product->save();
        return redirect()->route('product_managements.index')->with('success', 'Product Updated Successfully'); 
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return back()->with('error', 'Product deleted successfully');
    }
}
