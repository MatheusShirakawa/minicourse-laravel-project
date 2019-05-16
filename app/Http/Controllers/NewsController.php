<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\News;
use App\Category;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news =  News::all();

        return view('pages.news')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

       

        return view('forms.create_news')->with('categories' , $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();

        if($request->file('image') != null){

            $name = uniqid(date('HisYmd'));
            $extension = $request->file('image')->extension();
            $nameFile = "{$name}.{$extension}";

            $image = $request->file('image')->storeAs('images', $nameFile);

        }else{
            $image = '';
        }

        $news->category_id = $request->get('category_id');
        $news->title       = $request->get('title');
        $news->subtitle    = $request->get('subtitle');
        $news->description = $request->get('description');
        $news->image       = $image;
        
        $news->save();

        Session::flash('message', 'Cadastro registrado com sucesso!');
        return Redirect::to('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $categories = Category::all();

        return view('forms.create_news')->with('news', $news)
                                        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if($request->file('image') != null){

            $name = uniqid(date('HisYmd'));
            $extension = $request->file('image')->extension();
            $nameFile = "{$name}.{$extension}";

            $image = $request->file('image')->storeAs('images', $nameFile);

        }else{
            $image = '';
        }

        $news->category_id = $request->get('category_id');
        $news->title       = $request->get('title');
        $news->subtitle    = $request->get('subtitle');
        $news->description = $request->get('description');
        $news->image       = $image;
        
        $news->save();

        Session::flash('message', 'Cadastro atualizado com sucesso!');
        return Redirect::to('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        Session::flash('message', 'Cadastro deletado com sucesso!');
        return Redirect::to('news');
    }
}
