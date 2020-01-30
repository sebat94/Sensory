<?php

namespace App\Http\Controllers;

use App\News as News;
use App\Paragraphnews as Paragraphnews;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use File;
use DB;

class BONewsController extends Controller {

  public function __construct(){
      $this->middleware('auth');
  }

  function createView(){
    return view('bo/newnews');
  }

  function readAll(){
    $news = News::all();

    $data = array(
      'news' => $news
    );
    return view('bo/news', $data);
  }

  function create(Request $req){
    $title = $req->input('title');
    $date = $req->input('date');
    $link = $req->input('link');

    $id = DB::table('news')->insertGetId(
      ['title' => $title, 'created_at' => $date, 'link' => $link]
    );

    $paragraphs = $req->paragraphs;
    if($paragraphs != null){
      foreach($paragraphs as $p){
        DB::table('paragraphnews')->insert(
          ['news' => $id, 'paragraph' => $p]
        );
      }
    }

    return redirect()->action('BONewsController@readAll');

  }

  function read($id){
    $news = News::where('id', '=', $id)->first();
    $paragraphs = Paragraphnews::where('news', '=', $id)->get();

    $data = array(
      'news' => $news,
      'paragraphs' => $paragraphs
    );
    return view('bo/newsview', $data);
  }

  function delete($id){
    $new = News::where('id', '=', $id)->first();
    News::destroy($id);
    return "200";
  }

  function edit($id){
    $news = News::where('id', '=', $id)->first();
    $paragraphs = Paragraphnews::where('news', '=', $id)->get();

    $data = array(
      'news' => $news,
      'paragraphs' => $paragraphs
    );
    return view('bo/editnews', $data);
  }

  function editData($id, Request $req){

    DB::table('news')
        ->where('id', $id)
        ->limit(1)
        ->update(
          array(
            'created_at' => $req->input('date'),
            'title' => $req->input('title'),
            'link' =>$req->input('link')
          )
        );

    return Redirect::back();
  }

  function createParagraph($id, Request $req){
    DB::table('paragraphnews')->insert(
      ['news' => $id, 'paragraph' => $req->paragraph]
    );

    return Redirect::back();
  }

  function updateParagraph($id, Request $req){
    DB::table('paragraphnews')
        ->where('id', $id)
        ->limit(1)
        ->update(
          array(
            'paragraph' => $req->input('paragraph')
          )
        );
    return Redirect::back();
  }

  function deleteParagraph($id){
    Paragraphnews::destroy($id);
    return Redirect::back();
  }

}
