<?php

namespace App\Http\Controllers\Back;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->paginate(5);
        $count_categories=Category::count();

        return view('back.categories.categories',compact('categories','count_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.categories.create-categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(CreateCategoryRequest $request)
    {
        $category=Category::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug')
        ]);
        if ($category) {
            return redirect(route('admin.categories.index'))->with('successCreateCategory','دسته بندی مورد نظر ثبت گردید');
        }else{
            return redirect()->back()->with('errorCreateCategory','دسته بندی مورد نظر ثبت نشد');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return void
     */
    public function edit($slug)
    {
        $category=Category::where('slug',$slug)->get();
         return view('back.categories.edit-categories',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param Category $category
     * @return Category
     */
    public function update(UpdateCategoryRequest $request,Category $category)
    {

        try {
            $category->name=$request->input('name');
            $category->slug=$request->input('slug');
            $category->save();
        } catch (Exception $exception) {
            if ($exception->getCode() == 23000) {
                return redirect()->back()->with('slugError','نام مستعار وارد شده تکراری میباشد');
            }
        }
        return redirect(route('admin.categories.index'))->with('successUpdateCategory','بروز رسانی پست مورد نظر با موفقیت روبرو گردید');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return void
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('successDeleteCategory','دسته بندی مورد نظر حذف شد');

    }
}
