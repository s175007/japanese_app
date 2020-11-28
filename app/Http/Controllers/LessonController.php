<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;

class LessonController extends Controller
{

    private $itemPerPage = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request->all();
        if ($request->has('category_id')) {
            $request->validate([
                'book_id' => 'required',
            ]);
        }
        $categories = Category::all();
        $lessons = Lesson::with('book.category');

        $arrPaging = array();

        foreach ($request->all() as $key => $val) {
            $arrPaging[$key] = $val;
            
            if ($key == "book_id") {
                $lessons->where($key, $val);
            }
            if ($key == "name") {
                $lessons->where($key, 'like', '%' . $val . '%');
            }
        }

        $lessons = $lessons->paginate($this->itemPerPage);
                
        $lessons->appends(
            $arrPaging
        );
        // return $lessons;

        return view('admins.lessons.index', compact('lessons', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('admins.lessons.create')->with(['books' => $books, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Lesson::$create_rule)->validate();

        $lesson = new Lesson();
        $lesson->book_id = $request->book_id;
        $lesson->name = $request->name;
        $lesson->description = $request->description;
        $img_path = Storage::disk('public')->put('icons', $request->file('img'));
        $lesson->img = $img_path;
        $lesson->save();

        return Redirect::route('admin.lessons.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::with('book.category')->find($id);
        return view('admins.lessons.show')->with('lesson', $lesson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $books = Book::all();
        // return $book;
        if (!empty($books)) {
            return view('admins.lessons.edit')->with([
                'lesson' => $lesson,
                'books' => $books,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('img')) {
            Validator::make($request->all(), Lesson::$create_rule)->validate();
        } else {
            Validator::make($request->all(), Lesson::$update_rule)->validate();
        }

        $lesson = Lesson::find($id);
        if (!empty($lesson)) {
            //　Lưu tên
            $lesson->book_id = $request->book_id;
            $lesson->name = $request->name;

            if ($request->hasFile('image')) {
                //Xoá ảnh củ
                Storage::disk('public')->delete($lesson->img);
                //Lưu ảnh mới
                $img_path = Storage::disk('public')->put('icons', $request->file('img'));
                $lesson->img = $img_path;
            }

            $lesson->description = $request->description;

            $lesson->save();

            return Redirect::route('admin.lessons.index')->with('success', 'Cập nhật thành công');
        }

        return Redirect::route('admin.lessons.index')->with('fail', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        if (!empty($lesson)) {
            $lesson->delete();
            return Redirect::back()->with('success', 'Xoá thành công');
        }
        return Redirect::back()->with('fail', 'Xoá thất bại');
    }
}
