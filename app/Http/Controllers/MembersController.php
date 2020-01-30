<?php
namespace App\Http\Controllers;
use App\Member as Member;
use App\Categories as Categories;
use App\Photomember as Photomember;

class MembersController extends Controller {

  public function readAll(){
      $categories = Categories::all();
      $dataCat = array();

      foreach($categories as $c){
          $category = array(
              'c' => $c
          );
          $members = Member::where('category', '=', $c->id)->get();
          $category['members'] = $members;
          $pics = array();
          foreach($members as $m){
              array_push($pics, Photomember::where('member', '=', $m->id)->first());
          }
          $category['pics'] = $pics;
          array_push($dataCat, $category);
      }


      $data = array(
          'data' => $dataCat
      );
      return view('members', $data);
  }

}
