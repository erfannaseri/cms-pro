<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

use App\Http\Requests\CreatePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios=Portfolio::orderBy('id','DESC')->paginate(5);
        $count_portfloios=Portfolio::count();

        return view('back.portfolios.portfolios',compact('portfolios','count_portfloios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.portfolios.create-portfolio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(CreatePortfolioRequest $request)
    {

        $portfolio=Portfolio::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'link'=>$request->input('link'),
            'tag'=>$request->input('tag'),
            'image'=>$request->input('image')
        ]);
        if ($portfolio) {
            return redirect(route('admin.portfolios.index'))->with('successCreateCategory','دسته بندی مورد نظر ثبت گردید');
        }else{
            return redirect()->back()->with('errorCreateCategory','دسته بندی مورد نظر ثبت نشد');
        }

    }

    public function show(Portfolio $portfolio)
    {
        return view('back.portfolios.show-portfolio',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return void
     */
    public function edit(Portfolio $portfolio)
    {

        return view('back.portfolios.edit-portfolio',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param Category $category
     * @return Category
     */
    public function update(UpdatePortfolioRequest $request,Portfolio $portfolio)
    {
        if ($request->input('image')) {
            $portfolio->name=$request->input('name');
            $portfolio->description=$request->input('description');
            $portfolio->link=$request->input('link');
            $portfolio->tag=$request->input('tag');
            $portfolio->image=$request->input('image');
            $portfolio->save();

            return redirect(route('admin.portfolios.index'))->with('success','بروز رسانی پست مورد نظر با موفقیت روبرو گردید');
        }else{
            $portfolio->name=$request->input('name');
            $portfolio->description=$request->input('description');
            $portfolio->link=$request->input('link');
            $portfolio->tag=$request->input('tag');
            $portfolio->save();

            return redirect(route('admin.portfolios.index'))->with('success','بروز رسانی پست مورد نظر با موفقیت روبرو گردید');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return void
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return back()->with('success','نمونه کار مورد نظر مورد نظر حذف شد');

    }

}
