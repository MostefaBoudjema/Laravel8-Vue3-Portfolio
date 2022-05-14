<?php

namespace App\Http\Controllers;

use App\Competance;
use App\Cv;
use Illuminate\Http\Request;

class CompetanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competance  $competance
     * @return \Illuminate\Http\Response
     */
    public function show(Competance $competance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competance  $competance
     * @return \Illuminate\Http\Response
     */
    public function edit(Competance $competance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competance  $competance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competance $competance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competance  $competance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competance $competance)
    {
        //
    }
    public function getCompetances() {

        $exp = Competance::all();
        // $exp = Competance::orderBy('updated_at','desc')->paginate(10)->get();
        // $obj = $exp->orderBy('updated_at','desc')->get();
        // dd($obj);
        return $exp;
      }
  
      public function getCompetancesId($id) {
  
        $cv1 = cv::find($id);
        // dd($cv1->user_id);
        $exp = Competance::select("*")
        ->where("cv_id", "=", $cv1->id)
        ->orderBy('updated_at','desc')
        // ->paginate(10)
        ->get();
        // error_log('1');
        return $exp;
      }
      public function addCompetances(Request $request) {
        error_log($request->cv_id);
        $exp = $request->isMethod('put') ? Competance::findOrFail($request->cv_id) : new Competance;
        // $exp = new Competance;        
        $exp->titre = $request->titre;
        $exp->presentation = $request->presentation;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true, 'id' => $exp->id
      ]);
      }

      public function updateCompetances(Request $request) {
        // $exp = $request->isMethod('put') ? Competance::findOrFail($request->cv_id) : new Competance;
        $exp = Competance::find($request->id);;        
        $exp->titre = $request->titre;
        $exp->presentation = $request->presentation;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true
      ]);
      }

      public function deleteCompetances($id) { 
        $exp = Competance::find($id);
        $exp->delete();
        return Response()->json(['etat' => true ]);
      }
}
