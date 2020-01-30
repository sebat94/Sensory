<?php

namespace App\Http\Controllers;

use App\Research as Research;
use App\Photoresearch as Photoresearch;
use App\Paragraphresearch as Paragraphresearch;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Storage;
use DB;
use File;
use URL;

class BOResearchController extends Controller {

  public function __construct(){
      $this->middleware('auth');
  }

  function createView(){
    return view('bo/newresearch');
  }

  public function readAll(){
    $researches = Research::all();

    $data = array (
      'research' => $researches
    );

    return view('bo/research', $data);
  }

  public function create(Request $request){
    $id = -1;
    try {
      $id = DB::table('researches')->insertGetId(
        ['title' => $request->input('title')]
      );

      $paragraphs = $request->paragraphs;

      if($paragraphs != null) {
        foreach($paragraphs as $key=>$p){

          $idParagraph = DB::table('paragraphresearches')->insertGetId(
            ['research' => $id, 'paragraph' => $p]
          );

          $nombre = "photos" . $key;
          $photos = $request->$nombre;
          if($photos != null){
            foreach($photos as $key=>$photo){
              $filename = $photo->getClientOriginalName();
              $ext = explode(".", $filename)[1];
              $idPhoto = DB::table('photoresearches')->insertGetId(
                ['paragraph' => $idParagraph, 'ext' => $ext]
              );
              $photo->move(public_path().'/img/research/', $idPhoto . '.' . $ext);
            }
          }
        }
      }

      return redirect()->action('BOResearchController@readAll');
    } catch(Exception $ex) {
      $this->delete($id);
      exit("ERROR");
    }


  }

  public function read($id){
    $research = Research::where('id', '=', $id)->first();
    $paragraphs = Paragraphresearch::where('research', '=', $id)->get();
    $photos = array();

    foreach($paragraphs as $p){
      $pic = Photoresearch::where('paragraph', '=', $p->id)->get();
      array_push($photos, $pic);
    }

    $data = array (
      'research' => $research,
      'paragraphs' => $paragraphs,
      'photos' => $photos
    );

    return view('bo/researchview', $data);
  }

  public function delete($id){
    $research = Research::where('id', '=', $id)->first();
    $paragraphs = Paragraphresearch::where('research', '=', $id)->get();

    foreach($paragraphs as $p){

      $photos = Photoresearch::where('paragraph', '=', $p->id)->get();
      foreach($photos as $ph) {
        // Borramos la foto
        File::delete(public_path() . '/img/research/' . $ph->id . '.' . $ph->ext);
      }

    }

    // Borramos la research de la bbdd
    Research::destroy($id);
    return "200";

  }

  function edit($id){
    $research = Research::where('id', '=', $id)->first();
    $paragraphs = Paragraphresearch::where('research', '=', $id)->get();
    $photos = array();

    foreach($paragraphs as $p){
      $pic = Photoresearch::where('paragraph', '=', $p->id)->get();
      array_push($photos, $pic);
    }

    $data = array (
      'researches' => $research,
      'paragraphs' => $paragraphs,
      'photos' => $photos
    );

    return view('bo/editresearch', $data);
  }

  function updateTitle($id, Request $req){
    DB::table('researches')
        ->where('id', $id)
        ->limit(1)
        ->update(
          array(
            'title' => $req->input('title')
          )
        );
    return Redirect::back();
  }

  function deletePhoto($id){
    $pic = Photoresearch::where('id', '=', $id)->first();
    File::delete(public_path() . '/img/research/' . $pic->id . '.' . $pic->ext);
    Photoresearch::destroy($id);
    return Redirect::back();
  }

  function updateParagraph($para, Request $req){
    DB::table('paragraphresearches')
        ->where('id', $para)
        ->limit(1)
        ->update(
          array(
            'paragraph' => $req->input('paragraph')
          )
        );
    $photos = $req->photos;
    if($photos != null) {
      foreach($photos as $p){
        $filename = $p->getClientOriginalName();
        $ext = explode(".", $filename)[1];
        $id = DB::table('photoresearches')->insertGetId(
          ['paragraph' => $para, 'ext' => $ext]
        );
        $p->move(public_path().'/img/research/', $id . '.' . $ext);
      }
    }
    return Redirect::back();
  }

  function createParagraph($research, Request $req){
    $idParagraph = DB::table('paragraphresearches')->insertGetId(
      ['research' => $research, 'paragraph' => $req->input('paragraph')]
    );

    $photos = $req->photos;
    if($photos != null){
      foreach($photos as $photo){
        $filename = $photo->getClientOriginalName();
        $ext = explode(".", $filename)[1];
        $idP = DB::table('photoresearches')->insertGetId(
          ['paragraph' => $idParagraph, 'ext' => $ext]
        );
        $photo->move(public_path().'/img/research/', $idP . '.' . $ext);
      }
    }
    return Redirect::back();
  }

  function deleteParagraph($para){
    $paragraph = Paragraphresearch::where('id', '=', $para)->first();

    $photos = Photoresearch::where('paragraph', '=', $para)->get();
    foreach($photos as $ph) {
      // Borramos la foto
      File::delete(public_path() . '/img/research/' . $ph->id . '.' . $ph->ext);
    }

    Paragraphresearch::destroy($para);
    return Redirect::back();
  }

}
