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
    //     $request->validate([
    //         'name'=>'required|unique',
    //         'price'=>'required',
    //     ],
    //     [
    //        'name.required'=>'Name is required',
    //        'name.unique'=>'Name is allready taken',
    //        'price.required'=>'Name is required',
    //     ],
    //    );
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
}

