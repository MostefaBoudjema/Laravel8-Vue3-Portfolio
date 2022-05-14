<?php

namespace App\Http\Controllers;
use App\Cv;
use App\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
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
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        //
    }

    public function getFormations() {

        $exp = Formation::all();
        // $exp = Formation::orderBy('updated_at','desc')->paginate(10)->get();
        // $obj = $exp->orderBy('updated_at','desc')->get();
        // dd($obj);
        return $exp;
      }
  
      public function getFormationsId($id) {
  
        $cv1 = cv::find($id);
        // dd($cv1->user_id);
        $exp = Formation::select("*")
        ->where("cv_id", "=", $cv1->id)
        ->orderBy('updated_at','desc')
        // ->paginate(10)
        ->get();
        // error_log('1');
        return $exp;
      }
      public function addFormations(Request $request) {
        // error_log($request);
        $exp = $request->isMethod('put') ? Formation::findOrFail($request->cv_id) : new Formation;
        // $exp = new Formation;        
        $exp->titre = $request->titre;
        $exp->presentation = $request->presentation;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true, 'id' => $exp->id
      ]);
      }

      public function updateFormations(Request $request) {
        // $exp = $request->isMethod('put') ? Formation::findOrFail($request->cv_id) : new Formation;
        $exp = Formation::find($request->id);;        
        $exp->titre = $request->titre;
        $exp->presentation = $request->presentation;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true
      ]);
      }

      public function deleteFormations($id) { 
        $exp = Formation::find($id);
        $exp->delete();
        return Response()->json(['etat' => true ]);
      }
}
