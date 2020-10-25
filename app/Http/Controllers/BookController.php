<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    private $itemPerPage = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->paginate($this->itemPerPage);
        return view('admins.books.index',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // return $categories;
        return view('admins.books.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Book::$create_rule)->validate();

        $book = new Book();
        $book->category_id = $request->category_id;
        $book->name = $request->name;
        $img_path = Storage::disk('public')->put('icons', $request->file('image'));
        $book->img = $img_path;
        $book->save();

        return Redirect::route('admin.books.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with('category')->find($id);
        return view('admins.books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        // return $book;
        if(!empty($book)){
            return view('admins.books.edit')->with([
                'book' => $book,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            Validator::make($request->all(), Book::$create_rule)->validate();
        } else {
            Validator::make($request->all(), Book::$update_rule)->validate();
        }

        $book = Book::find($id);
        if (!empty($book)) {
            //　Lưu tên
            $book->category_id = $request->category_id;
            $book->name = $request->name;

            if ($request->hasFile('image')) {
                //Xoá ảnh củ
                Storage::disk('public')->delete($book->img);
                //Lưu ảnh mới
                $img_path = Storage::disk('public')->put('icons', $request->file('image'));
                $book->img = $img_path;
            }

            $book->save();

            return Redirect::route('admin.books.index')->with('success', 'Cập nhật thành công');
        }

        return Redirect::route('admin.books.index')->with('fail', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!empty($book)) {
            $book->delete();
            return Redirect::back()->with('success', 'Xoá thành công');
        }
        return Redirect::back()->with('fail', 'Xoá thất bại');
    }
}
