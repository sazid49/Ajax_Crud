<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AjaxBOOKCRUDController extends Controller
{
    public function index()
    {
        $data['books'] = Book::orderBy('id','desc')->paginate(5);

        return view('ajax-book-crud',$data);
    }

    public function store(Request $request)
    {
        $book   =   Book::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'title' => $request->title,
                        'code' => $request->code,
                        'author' => $request->author,
                    ]);

        return response()->json(['success' => true]);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $book  = Book::where($where)->first();

        return response()->json($book);
    }

    public function destroy(Request $request)
    {
        $book = Book::where('id',$request->id)->delete();

        return response()->json(['success' => true]);
    }
}
