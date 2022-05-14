<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\Cv;

use App\Experience;

use Auth;

use App\Http\Requests\cvRequest;
use Illuminate\Auth\Access\Response;

class CvController extends Controller
{

    public function __construct() {

         $this->middleware('auth');
    }

	//lister les cvs
    public function index() {
      $listcv = Cv::orderBy('updated_at', 'desc')->paginate(3); 
      // if(Auth::user()->is_admin) {
      //   $listcv = Cv::all();
      // }else{
      //   $listcv = Auth::user()->cvs;
      // }
        

        return view('cv.index', ['cvs' => $listcv]);
    }
    
    //Affiche le formulaire de creation de cv
    public function create() {
       return view('cv.create');
    }
     
    //Enregister un cv
    public function store(cvRequest $request) {
       
       $cv = new Cv();

       $cv->titre = $request->input('titre');
       $cv->presentation = $request->input('presentation');
       $cv->user_id = Auth::user()->id;
       
        if($request->hasFile('photo')) {
          $cv->photo = $request->photo->store('image');
        }

       $cv->save();
       
       session()->flash('success', 'Le cv à été bien enregistré !!');

       return redirect('cvs');
    }
    
    //permet de récupérer un cv puis de le mettre dans un le formulaire
    public function edit($id) {

       $cv = Cv::find($id);

       $this->authorize('update', $cv);

       return view('cv.edit', ['cv' => $cv]);
    }
    
    //permet de modifier un cv
    public function update(cvRequest $request, $id) {
        
        $cv = Cv::find($id);

        $this->authorize('update', $cv);

        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');

         if($request->hasFile('photo')) {
          $cv->photo = $request->photo->store('image');
        }
        
        $cv->save();

        return redirect('cvs');
    }


    public function show($id) {

      return view('cv.show', ['id' => $id]);
    }
    
    //permet de supprimer un cv
    public function destroy(Request $request, $id) {
       
       $cv = Cv::find($id);

       $this->authorize('delete', $cv);

       $cv->delete();

       return redirect('cvs');
    }


    public function cvExperienceCreate(Request $request, $id) {
        
        $cv = Cv::find($id);
        
        $experiences = [
           ["titre" => "Experience en laravel", "debut" => "2013-10-10", "fin" => "2010-12-10"],
           ["titre" => "Experience en symfony", "debut" => "2013-10-10", "fin" => "2010-12-10"],
           ["titre" => "Experience en Sécurité", "debut" => "2013-10-10", "fin" => "2010-12-10"],
           ["titre" => "Experience en Firebase", "debut" => "2013-10-10", "fin" => "2010-12-10"],
        ];


        foreach($experiences as $exp) {

            $experience = new Experience($exp);
      

            $cv->experiences()->save($experience);
        }

        
    }


    public function cvExperienceShow(Request $request, $id) {

        $cv = Cv::find($id);

        return view('experience.show', ['cv' => $cv]);
    }
    // public function getExperiences() {

    //   $exp = Cv::all();
    //   // dd($exp);
    //   return $exp;
    // }

    // public function getExperiencesId($id) {

    //   $exp = Cv::find($id);
    //   $tab=[$exp];
    //   // $data = json_decode($exp);
    //   //  dd($exp);
    //   // return $exp->experiences();
    //   // return $data;
    //   return $tab;
    // }
    // public function addExperiences(Request $request) {
    //   $exp = $request->isMethod('put') ? Experience::findOrFail($request->cv_id) : new Experience;
    //   // $exp = new Experience;
      
    //   // error_log('1');
    //   $exp->titre = $request->titre;
    //   $exp->debut = $request->debut;
    //   $exp->fin = $request->fin;
    //   $exp->cv_id = $request->cv_id;
    //   // dd($exp);
    //   $exp->save();
    //   return Response()->json(['etat' => true, 'id' => $exp->id
    // ]);
    // }

    public function getCv() {
  
      $cv1 = cv::select("*")
      ->orderBy('updated_at','desc')
      // ->paginate(3)
      ->get();
      // error_log($cv1);
      return $cv1;
    }

    
    public function deletecv($id) { 
      $cv = cv::find($id);
      $cv->delete();
      return Response()->json(['etat' => true ]);
    }
}
