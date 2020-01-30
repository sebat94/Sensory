<?php
namespace App\Http\Controllers;
use App\Publications as Publications;

class PublicationsController extends Controller {

  public function readAll(){
    $publications = Publications::all();

    $chapters = array();
    $revisions = array();
    $articles = array();

    foreach($publications as $n){
        if($n->type == 'c') array_push($chapters, $n);
        elseif($n->type == 'a') array_push($articles, $n);
        else array_push($revisions, $n);
    }

    $data = array(
        'chapters' => $chapters,
        'articles' => $articles,
        'revisions' => $revisions
    );

    return view('publications', $data);
  }

}
