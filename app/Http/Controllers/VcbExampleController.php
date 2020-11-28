<?php

namespace App\Http\Controllers;

use App\Models\VcbExample;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class VcbExampleController extends Controller
{
    private $itemPerPage = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vcb_examples = VcbExample::with('vocabulary')->paginate($this->itemPerPage);
        return view('admins.vcb_examples.index',compact('vcb_examples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vocabularies = Vocabulary::all();

        // return $vocabularies;

        return view('admins.vcb_examples.create',compact('vocabularies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), VcbExample::$create_rule)->validate();
        
        $vcb_examples = new VcbExample();
        $vcb_examples->vocabulary_id = $request->vocabulary_id;
        $vcb_examples->examples = $request->examples;

        $vcb_examples->save();

        return Redirect::route('admin.vcb-examples.index')->with('success', 'Tạo thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VcbExample  $vcbExample
     * @return \Illuminate\Http\Response
     */
    public function show(VcbExample $vcbExample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VcbExample  $vcbExample
     * @return \Illuminate\Http\Response
     */
    public function edit(VcbExample $vcbExample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VcbExample  $vcbExample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VcbExample $vcbExample)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VcbExample  $vcbExample
     * @return \Illuminate\Http\Response
     */
    public function destroy(VcbExample $vcbExample)
    {
        //
    }
}
