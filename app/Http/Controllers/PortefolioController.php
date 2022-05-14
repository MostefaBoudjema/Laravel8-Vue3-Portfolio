<?php

namespace App\Http\Controllers;
use App\Cv;
use App\Portefolio;
use Illuminate\Http\Request;

class PortefolioController extends Controller
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
     * @param  \App\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portefolio $portefolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portefolio $portefolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portefolio $portefolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portefolio $portefolio)
    {
        //
    }

    public function getPortefolios() {

        $exp = Portefolio::all();
        // $exp = Portefolio::orderBy('updated_at','desc')->paginate(10)->get();
        // $obj = $exp->orderBy('updated_at','desc')->get();
        // dd($obj);
        return $exp;
      }
  
      public function getPortefoliosId($id) {
  
        $cv1 = cv::find($id);
        // dd($cv1->user_id);
        $exp = Portefolio::select("*")
        ->where("cv_id", "=", $cv1->id)
        ->orderBy('updated_at','desc')
        // ->paginate(10)
        ->get();
        // error_log('1');
        return $exp;
      }
      public function addPortefolios(Request $request) {
        error_log($request->cv_id);
        $exp = $request->isMethod('put') ? Portefolio::findOrFail($request->cv_id) : new Portefolio;
        // $exp = new Portefolio;        
        $exp->titre = $request->titre;
        $exp->presentation = $request->presentation;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true, 'id' => $exp->id
      ]);
      }

      public function updatePortefolios(Request $request) {
        // $exp = $request->isMethod('put') ? Portefolio::findOrFail($request->cv_id) : new Portefolio;
        $exp = Portefolio::find($request->id);;        
        $exp->titre = $request->titre;
        $exp->presentation = $request->presentation;
        $exp->cv_id = $request->cv_id;
        // dd($exp);
        $exp->save();
        return Response()->json(['etat' => true
      ]);
      }

      public function deletePortefolios($id) { 
        $exp = Portefolio::find($id);
        $exp->delete();
        return Response()->json(['etat' => true ]);
      }
}
