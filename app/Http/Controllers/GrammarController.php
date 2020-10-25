<?php

namespace App\Http\Controllers;

use App\Models\Grammar;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GrammarController extends Controller
{
    private $itemPerPage = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grammars = Grammar::with('lesson.book.category')->paginate($this->itemPerPage);

        return view('admins.grammars.index', compact('grammars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::all();
        // return $categories;
        return view('admins.grammars.create')->with('lessons', $lessons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Grammar::$create_rule)->validate();

        $grammar = new Grammar();

        $grammar->lesson_id = $request->lesson_id;
        $grammar->title = $request->title;
        $grammar->mean = $request->mean;
        $grammar->using = $request->using;

        $grammar->save();

        return Redirect::route('admin.grammars.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grammar = Grammar::with('lesson.book.category')->find($id);

        return view('admins.grammars.show', compact('grammar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grammar = Grammar::find($id);
        $lessons = Lesson::all();

        if (!empty($grammar)) {
            return view('admins.grammars.edit', compact('grammar','lessons'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), Grammar::$create_rule)->validate();

        $grammar = Grammar::find($id);
        if (!empty($grammar)) {
            $grammar->lesson_id = $request->lesson_id;
            $grammar->title = $request->title;
            $grammar->mean = $request->mean;
            $grammar->using = $request->using;

            $grammar->save();

            return Redirect::route('admin.grammars.index')->with('success', 'Lưu thành công');
        }

        return Redirect::route('admin.grammars.index')->with('success', 'Lưu thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grammar  $grammar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grammar = Grammar::find($id);
        if (!empty($grammar)) {
            $grammar->delete();
            return Redirect::back()->with('success', 'Xoá thành công');
        }
        return Redirect::back()->with('fail', 'Xoá thất bại');
    }
}
