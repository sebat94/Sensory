<?php
namespace App\Http\Controllers;
use App\News as News;
use App\Paragraphnews as Paragraphnews;

class NewsController extends Controller {

  public function readAll(){
      $news = News::all();
      $dataNews = array();

      foreach($news as $n){
          $new = array(
              'news' => $n
          );
          $new['paragraphs'] = Paragraphnews::where('news', '=', $n->id)->get();
          array_push($dataNews, $new);
      }


      $data = array(
          'news' => $dataNews
      );
      return view('news', $data);
  }

}
