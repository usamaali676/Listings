<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\Business;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BusinessCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $businessCategory = BusinessCategory::withcount('businesses')->get();
        return view('bcategory.Index', compact('srno','businessCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bcategory.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $request->validate([
        'slug' => 'required|unique:business_categories',
           'name'=> 'required'
       ]);
       $category = new BusinessCategory();
       $category->name = $request->name;
       $request->slug = preg_replace('/\s+/', '-', $request->slug);
       $category->slug = $request->slug;
       $category->icon = $request->icon;
       $category->save();
       Alert::success('Success', 'Business Category Added Successfully');
       return redirect()->route('bc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BusinessCategory::where('id', $id)->first();
        return view('bcategory.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'slug' => 'required|unique:business_categories,slug,'.$request->id,
            'name'=> 'required'
        ]);
        $input['name']=$request->name;
        $request->slug = preg_replace('/\s+/', '-', $request->slug);
        $input['slug'] = $request->slug;
        $input['icon'] = $request->icon;
       BusinessCategory::where('id', $request->id)->update($input);
       Alert::success('Success','BusinessCategory Updated Successfully');
        return redirect()->route('bc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $businessCategory = BusinessCategory::where('id', $id)->first();
        $businessCategory->delete();
        Alert::success('Success', 'Business Category Deletd Succesfully');
        return redirect()->route('bc.index');
    }
}
