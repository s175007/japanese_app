<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // return $categories;
        return view('admins.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Category::$create_rule)->validate();
        
        $category = new Category();
        $category->name = $request->name;
        $icon_name = Storage::disk('public')->put('icons', $request->file('icon'));
        $category->icon = $icon_name;
        $category->save();

        return Redirect::route('admin.categories.index')->with('success','Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admins.categories.show')->with('category' , $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admins.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('icon')){
            Validator::make($request->all(), Category::$create_rule)->validate();
        }else{
            Validator::make($request->all(), Category::$update_rule)->validate();
        }

        $category = Category::find($id);
        if(!empty($category)){
            $category->name = $request->name;
            if($request->hasFile('icon')){
                $icon_name = Storage::disk('public')->put('icons', $request->file('icon'));
                $category->icon = $icon_name;
            }
            // return $category;
            $category->save();
        }
        return Redirect::route('admin.categories.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(!empty($category)){
            $category->delete();
            return Redirect::back()->with('success','Xoá thành công');
        }
        return Redirect::back()->with('fail', 'Xoá thất bại');
    }
}
