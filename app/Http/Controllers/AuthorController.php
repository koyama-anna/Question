<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors=Author::all();
        return view('index',['authors'=>$authors]);
    }

    public function find()
    {
        return view('find',['input'=>'']);
    }

    public function search(Request $request)
    {
        $author=Author::where('name','LIKE BINARY',"%{$request->input}%")->first();
        $param =[
            'author'=>$author,
            'input'=>$request->input
        ];
        return view('find',$param);
    }

    public function add()
    {
        return view('add');
    }

    public function create(AuthorRequest $request)
    {
        $form=$request->all();
        Author::create($form);
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $author=Author::find($request->id);
        return view('edit',['form'=>$author]);
    }

    public function update(AuthorRequest $request)
    {
        $form=$request->all();
        unset($form['_token']);
        Author::where('id',$request->id)->update($form);
        return redirect('/');
    }

    //消すデータをidで検索して取得・
    public function delete(Request $request)
    {
        $author=Author::find($request->id);
        return view('delete',['form'=>$author]);
    }

    //取得したデータを削除・
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }

    public function bind(Author $author)
    {
        $data=[
            'author'=>$author,
        ];
        return view('author.binds',$data);
    }

    public function get(){
        $text=[
            'content'=>'自由に入力して下さい',
        ];
        return view('middleware',$text);
    }

    public function post(Request $request){
        $content=$request->content;
        $text=[
            'content'=>$content . 'と入力しましたね'
        ];
        return view('middleware',$text);
    }

    public function relate(Request $request)
    {
        $authors=Author::all();
        return view('author.index',['authors'=>$authors]);
    }
}
