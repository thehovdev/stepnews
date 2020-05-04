<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryLangsRequest;
use App\Category;
use App\CategoryLang;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(8);
        return view('categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\StoreCategoryLangsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryLangsRequest $request)
    {
        $validatedData = $request->validated();
        $category = new Category();
        $category->save();
        foreach ($validatedData as $key => $value) {
            if (in_array($key, config('app.locales'))) {;
                $lang = new CategoryLang();
                $lang->category_id = $category->id;
                $lang->lang = $key;
                $lang->name = $value['name'];
                $lang->save();
            }
        }
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('categories.show')->withCategory(Category::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('categories.edit')->withCategory(Category::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\StoreCategoryLangsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryLangsRequest $request, $id)
    {
        $validatedData = $request->validated();
        foreach ($validatedData as $key => $value) {
            if (in_array($key, config('app.locales'))) {;
                $lang = CategoryLang::where([
                    'category_id' => $id, 
                    'lang' => $key
                    ])->first();
                $lang->name = $value['name'];
                $lang->save();
            }
        }
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryLang::where('category_id', $id)->delete();
        Category::find($id)->delete();

        return redirect()->route('categories.index');
    }
}
