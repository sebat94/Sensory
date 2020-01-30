<?php

namespace App\Http\Controllers;

use App\Categorymember as Categorymember;
use App\Categories as Categories;
use App\Member as Member;
use App\Photomember as Photomember;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use File;
use DB;

class BOMembersController extends Controller {

  public function __construct(){
      $this->middleware('auth');
  }

  function readAll(){
    $categories = Categories::all();
    $cat_users = array();
    foreach($categories as $c){
      array_push($cat_users, DB::table('members')->where('category', $c->id)->get());
    }

    $data = array(
      'categories' => $categories,
      'cat_users' => $cat_users
    );
    return view('bo/members', $data);
  }

  function createView(){
    $categories = Categories::all();
    $data = array(
      'categories' => $categories
    );
    return view('bo/newmember', $data);
  }

  function create(Request $req){
    $name = $req->input('name');
    $email = $req->input('email');
    $category = $req->input('category');
    $pic = $req->pic;

    $id = DB::table('members')->insertGetId(
      ['name' => $name, 'email' => $email, 'category' => $category]
    );

    if($pic != null){
      $filename = $pic->getClientOriginalName();
      $ext = explode(".", $filename)[1];
      $idPhoto = DB::table('photomembers')->insertGetId(
        ['member' => $id, 'ext' => $ext]
      );
      $pic->move(public_path().'/img/members/', $idPhoto . '.' . $ext);
    }

    return redirect()->action('BOMembersController@readAll');

  }

  function read($id){
    $member = Member::where('id', '=', $id)->first();
    $pic = Photomember::where('member', '=', $id)->first();

    $data = array (
      'member' => $member,
      'pic' => $pic
    );

    return view('bo/memberview', $data);
  }

  function edit($id){
    $member = Member::where('id', '=', $id)->first();
    $pic = Photomember::where('member', '=', $id)->first();
    $categories = Categories::all();
    $data = array (
      'm' => $member,
      'pic' => $pic,
      'categories' => $categories
    );

    return view('bo/editmember', $data);
  }

  function editData($id, Request $req){

    DB::table('members')
        ->where('id', $id)
        ->limit(1)
        ->update(
          array(
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'category' => $req->input('category')
          )
        );

    return Redirect::back();
  }

  function updatePic($id, Request $req){
    $pic = Photomember::where('member', '=', $id)->first();

    if($pic != null) {
      File::delete(public_path() . '/img/members/' . $pic->id . '.' . $pic->ext);
      Photomember::destroy($pic->id);
    }

    $photo = $req->pic;
    if($photo != null){
      $filename = $photo->getClientOriginalName();
      $ext = explode(".", $filename)[1];
      $idPhoto = DB::table('photomembers')->insertGetId(
        ['member' => $id, 'ext' => $ext]
      );
      $photo->move(public_path().'/img/members/', $idPhoto . '.' . $ext);
    }

    return Redirect::back();
  }

  function delete($id){
    $pic = Photomember::where('member', '=', $id)->first();

    if($pic != null) {
      File::delete(public_path() . '/img/members/' . $pic->id . '.' . $pic->ext);
    }

    Member::destroy($id);
    return Redirect::back();
  }

  function newCategory(){
    return view('bo/newcategory');
  }

  function newCategoryPost(Request $req){
    DB::table('categories')->insert(
      ['nombre' => $req->input('name')]
    );
    return redirect()->action('BOMembersController@readAll');
  }

  function deleteCategory($id){
    $members = Member::where('category', '=', $id)->get();
    foreach($members as $m){
      $pic = Photomember::where('member', '=', $m->id)->first();
      if($pic != null) {
        File::delete(public_path() . '\img\members\\' . $pic->id . '.' . $pic->ext);
      }

    }
    Categories::destroy($id);

  }

  function editCategory($id){
    $cat = Categories::where('id', '=', $id)->first();
    $data = array(
      'category' => $cat
    );
    return view('/bo/editcategory', $data);
  }

  function editCategoryPost($id, Request $req){
    DB::table('categories')
        ->where('id', $id)
        ->limit(1)
        ->update(
          array(
            'nombre' => $req->input('name')
          )
        );

    return redirect()->action('BOMembersController@readAll');
  }

}
