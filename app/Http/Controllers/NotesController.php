<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;
use Illuminate\Support\Facades\Storage;
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $notes = Notes::all();
        return view('Notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file =$request->file('imgpost');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images',$fileName);
        
        $empData = [
            'ownerpost' => $request->ownerPost,
            'descriptionpost' => $request->descriptionPost,
            'imgpost' => $fileName,
            'tags' =>  implode(",", $request->tags)
        ];
        Notes::create($empData);
        
       

        return response()->json([
            'status'=> 200
        ]);
    }

    //este seria lo del edit
    public function showhowdata(Request $request)
    {
        //Mostrar datos
        $note = Notes::findOrFail($request->id);
        return response()->json($note);

    }

    public function update(Request $request)
    {
        $fileName ='';
        $note = Notes::findOrFail($request->note_id);
        if ($request->hasFile('imgpost')) {
            $file =$request->file('imgpost');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/images',$fileName);
            if ($note->imgpost) {
                Storage::delete('public/images/' . $note->imgpost);
            }
      
         } else {
        $fileName = $request->img_note;
        }
         
        $empData = [
            'ownerpost' => $request->ownerPost,
            'descriptionpost' => $request->descriptionPost,
            'imgpost' => $fileName,
            'tags' =>  implode(",", $request->tags)
        ];
         $note->update($empData);
        return response()->json([
            'status'=> 200
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
		$note = Notes::find($id);
		if (Storage::delete('public/images/' . $note->imgpost)) {
			Notes::destroy($id);
		}
	}
 
}
