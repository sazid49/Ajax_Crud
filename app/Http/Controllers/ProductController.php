<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('id','DESC')->paginate(5);
        return view('welcome',compact('data'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
        ]);

        Product::query()->create($request->all());
        return response()->json([
            'status'=>'success',
        ]);
       }

       public function allData()
       {
           $data = Product::orderBy('id','DESC')->get();
           return response()->json($data);
       }

       public function edit($id)
       {
         $data = Product::findOrFail($id);
         return response()->json($data);
       }

       function updateP(Request $request,$id)
       {

        $validatedData = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
        ]);

          $data = Product::findOrFail($id);
          $data->name=$request->name;
          $data->price=$request->price;
          $data->update();

          return response()->json([
            'status'=>'success',
         ]);

       }

       function deleteP($id)
       {
          $data = Product::findOrFail($id);
          $data->delete();
          return response()->json([
            'status'=>'success',
         ]);
       }


}

