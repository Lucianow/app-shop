<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::orderBy('name')->get();
        //  return view('admin.products.create')->with(compact('categories')); // formulario de registro
        return view('admin.categories.create'); // formulario de registro
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'max:200',
        ];

        $this->validate($request, $rules);
        $category = Category::create($request->only('name', 'description'));
        if ($request->hasFile('image')){

            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            if ($moved) {
                $category->image = $fileName;
                $category->save(); // INSERT
            }
            return back();
        }

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//        $category = Category::find($id);
        return view('admin.categories.edit')->with(compact('category')); // form de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
        ];

        $this->validate($request, $rules);
        $category->update($request->only('name', 'description'));
        if ($request->hasFile('image')){

            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            if ($moved) {
                $previusPath  = $path .'/'. $category->image;

                $category->image = $fileName;
                $saved = $category->save(); // INSERT
                if ($saved)
                    File::delete($previusPath);
            }
        }

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete(); // DELETE
        return back();
    }
}
