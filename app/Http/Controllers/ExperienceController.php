<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use App\Experience;

class ExperienceController extends Controller
{
    public function create(Request $request, $id) {
        
       
    }

    public function getExperiences() {

        $exp = Experience::all();
        // $exp = Experience::orderBy('updated_at','desc')->paginate(10)->get();
        // $obj = $exp->orderBy('updated_at','desc')->get();
        // dd($obj);
        return $exp;
      }
  
      public function getExperiencesId($id) {
  
        $cv1 = cv::find($id);
        // dd($cv1->user_id);
        $exp = Experience::select("experiences.*","cvs.titre as cvtitre")
        ->where("cv_id", "=", $cv1->id)
        ->leftJoin('cvs', 'cvs.id', '=', 'experiences.cv_id')
        ->orderBy('updated_at','desc')
        // ->paginate(10)
        ->get();
        // error_log($exp);
        return $exp;
      }
      public function addExperiences(Request $request) {
        $exp = $request->isMethod('put') ? Experience::findOrFail($request->cv_id) : new Experience;
        // $exp = new Experience;        
        $exp->titre = $request->titre;
        $exp->body = $request->body;
        $exp->debut = $request->debut;
        $exp->fin = $request->fin;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true, 'id' => $exp->id
      ]);
      }

      public function updateExperiences(Request $request) {
        // $exp = $request->isMethod('put') ? Experience::findOrFail($request->cv_id) : new Experience;
        $exp = Experience::find($request->id);;        
        $exp->titre = $request->titre;
        $exp->body = $request->body;
        $exp->debut = $request->debut;
        $exp->fin = $request->fin;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true
      ]);
      }

      public function deleteExperiences($id) { 
        $exp = Experience::find($id);
        $exp->delete();
        return Response()->json(['etat' => true ]);
      }
}
