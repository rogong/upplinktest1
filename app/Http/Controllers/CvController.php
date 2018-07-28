<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;
use App\Resume;


class CvController extends Controller
{
     public function getCv()
     {
         return view('resume');
     }


     public function editCv()
     {
         return view('admin/editresume');
     }

     public function updateCv()
     {
         return view('admin/editresume');
     }



     public function createCv(Request $request)
     {

        $allCv = Resume::all();
    
        $cvCount = $allCv->count();

        // $this->validate($request, [
           
            
        //     'first_name' => 'required',
        //     'username' => 'required',  
        //     'phone' => 'required',  
        //     'email' => 'required',  
        //     'cover_letter' => 'required',  
        //     'imagePath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100',
        //     'resume' => 'required|max:2048',

        // ]);

        $cv = new Resume;

        $cv->first_name = $request->input('first_name');   
        $cv->surname = $request->input('surname');  
        $cv->phone = $request->input('phone'); 
        $cv->email = $request->input('email');
        $cv->cover_letter = $request->input('cover_letter'); 
        
       
      
    
        if(Input::hasFile('imagePath')){
            $file = Input::file('imagePath');
            $file->move(public_path().'/passport/',$file->getClientOriginalName());
            $url = URL::to("/"). '/passport/'.$file->getClientOriginalName();
           
        }

        if(Input::hasFile('resume')){
            $file = Input::file('resume');
            $file->move(public_path().'/resume/',$file->getClientOriginalName());
            $resumeurl = URL::to("/"). '/resume/'.$file->getClientOriginalName();
           
        }
       

          $cv->imagePath = $url;
          $cv->resume = $resumeurl;


      
          if( $cvCount <= 4)
          {
            $cv->save();
            return redirect()->route('getcv')->with('response', 'Your Application Submittedted Successfully');
          }else
          {
 
            return redirect()->route('getcv')->with('response', 'Sorry Application Closed');
          }

         
        

     }


}
