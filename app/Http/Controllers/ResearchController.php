<?php
namespace App\Http\Controllers;
use App\Research as Research;
use App\Paragraphresearch as Paragraphresearch;
use App\Photoresearch as Photoresearch;

class ResearchController extends Controller {

  public function readAll(){
    $researches = Research::all();
    $dataResearches = array();

    foreach($researches as $r){
        $research = array(
            'research' => $r,
            'pics' => array()
        );
        $paragraphs = Paragraphresearch::where('research', '=', $r->id)->get();
        $research['paragraphs'] = $paragraphs;

        foreach($paragraphs as $p){
            $pics = Photoresearch::where('paragraph', '=', $p->id)->get();
            array_push($research['pics'], $pics);
        }
        array_push($dataResearches, $research);
    }

    $data = array(
        'researches' => $dataResearches
    );
    return view('research', $data);
  }

}
