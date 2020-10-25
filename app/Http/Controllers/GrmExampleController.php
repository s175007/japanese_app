<?php

namespace App\Http\Controllers;

use App\Models\Grammar;
use App\Models\GrmExample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GrmExampleController extends Controller
{
    private $itemPerPage = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grm_examples = GrmExample::with('grammar.lesson.book.category')->paginate($this->itemPerPage);

        // return $grm_examples;

        return view('admins.grm_examples.index', compact('grm_examples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grammars = Grammar::all();
        // return $categories;
        return view('admins.grm_examples.create', compact('grammars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), GrmExample::$create_rule)->validate();

        $grm_examples = new GrmExample();

        $grm_examples->grammar_id = $request->grammar_id;
        $grm_examples->japanese = $request->japanese;
        $grm_examples->vietnamese = $request->vietnamese;

        $grm_examples->save();

        return Redirect::route('admin.grm-examples.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrmExample  $grmExample
     * @return \Illuminate\Http\Response
     */
    public function show(GrmExample $grmExample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrmExample  $grmExample
     * @return \Illuminate\Http\Response
     */
    public function edit(GrmExample $grmExample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrmExample  $grmExample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrmExample $grmExample)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrmExample  $grmExample
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrmExample $grmExample)
    {
        //
    }
}
