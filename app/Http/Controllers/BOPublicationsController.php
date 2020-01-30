<?php

namespace App\Http\Controllers;

use App\Publications as Publications;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Storage;
use DB;
use File;
use URL;

class BOPublicationsController extends Controller {

  public function __construct(){
      $this->middleware('auth');
  }

  function createView(){
    return view('bo/newpublications');
  }

  public function readAll(){
    $publications = Publications::all();

    $data = array (
      'publications' => $publications
    );

    return view('bo/publications', $data);
  }

  public function create(Request $request){
    $id = -1;
    try {
      $id = DB::table('publications')->insertGetId(
        ['title' => $request->input('title'),
         'authors' => $request->input('authors'),
         'place' => $request->input('place'),
         'link' => $request->input('link'),
         'type' => $request->input('type')]
      );

      return redirect()->action('BOPublicationsController@readAll');
    } catch(Exception $ex) {
      $this->delete($id);
      exit("ERROR");
    }

  }

  public function read($id){
    $publications = Publications::where('id', '=', $id)->first();

    $data = array (
      'p' => $publications
    );

    return view('bo/publicationsView', $data);
  }

  public function delete($id){
    // Borramos la publication de la bbdd
    Publications::destroy($id);
    return "200";

  }

  function editView($id){
      $p = Publications::where('id', '=', $id)->first();

      $data = array(
        'p' => $p
      );

      return view('bo/editpublications', $data);
  }

  function edit($id, Request $req){
      DB::table('publications')
          ->where('id', $id)
          ->limit(1)
          ->update(
            array(
              'title' => $req->input('title'),
              'authors' => $req->input('authors'),
              'link' =>$req->input('link'),
              'place' =>$req->input('place'),
              'type' =>$req->input('type')
            )
          );

      return Redirect::back();
  }

}
