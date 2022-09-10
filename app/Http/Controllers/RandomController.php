<?php

namespace App\Http\Controllers;

use App\Models\Random;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    //

    public function index(){

     // $amakuru = Random::all(); // Before using softdelete.

        $amakuru = Random::withTrashed()->get();

        return view('retrieve', ['abantu' => $amakuru]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $umuntu = new Random();


        if($file = $request->file('image') ) {

            $filename = time().$file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $umuntu->image = $filename;

        }

        $umuntu-> name = $request->input('name');
        $umuntu-> email = $request->input('email');
        $umuntu-> password = $request->input('password');

        $umuntu->save();

        return redirect()->route('random.index');
    }

    public function edit($id){
        $umuntu = Random::where('id', '=', $id)->first();

        // return $employee->name;

        return view('update', ['umuntu' => $umuntu]);
    }

    public function update(Request $request){
        // $image = "";

        if($request->hasFile('image')) {

            //store file into stamps folder
            $file = $request->file('image');

            $filename = time().$file->getClientOriginalExtension(); // ???
            $file->move(public_path('uploads'), $filename);

            $image = $filename;
            
        } else{ $image = Random::find($request->id)->image; }  

        

        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        // dd($image);

        
        Random::WHERE('id', $id)->update([
            'image' => $image,
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return redirect()->route('random.index'); //->with('aka_naga_session', 'Vyakunze petit, hagiyemwo ivyo wipfuza genda rero!!!');
    }

    // Restore our deleted data

    public function restore($id)
    {
        $restore = Random::WHERE ("id", $id)->restore();

        if($restore == true){
            return redirect()->route('random.index');

        } else{ echo 'error'; }



        // return redirect()->route('random.index');
    }


    public function delete($id)
    {

        // After using soft delete we won't have to delete from our database


        // if(file_exists(public_path('uploads/' . Random::find($id)->image))){

        //     unlink(public_path('uploads/' . Random::find($id)->image));
            
        // } else { dd("File doesn't exist"); }
        
        if(Random::find($id)->delete()){

            return redirect()->route('random.index')->with('aka_naga_session_kogufuta', 'Wamwishe ndakeee, yagiyeee... Byeeeeeeeeee!!!');

            // return response()->json(['result' => 'ok']);

        } // else {  }

    }

    public function destroy($id)
    {


        if(file_exists(public_path('/uploads/' . Random::onlyTrashed()->where('id', $id)->get()[0]->image))){

            unlink(public_path('/uploads/' . Random::onlyTrashed()->where('id', $id)->get()[0]->image));
                
        } else { dd("File doesn't exist"); }

        
        // if($request->hasFile('image')) {

        //     //store file into stamps folder
        //     $file = $request->file('image');

        //     $filename = time().$file->getClientOriginalExtension(); // ???
        //     $file->move(public_path('uploads'), $filename);

        //     $image = $filename;
            
        // } else{ $image = Random::find($request->id)->image; }  

        // $destroy = Random::WHERE ("id", $id)->forceDelete();

        if(Random::WHERE ("id", $id)->forceDelete()){
            return redirect()->route('random.index');

        } else{ echo 'error'; }

    }

}
