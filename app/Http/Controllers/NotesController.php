<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\User;
use App\Http\Requests\CreateNote;
use App\Http\Requests\UpdateNote;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
  


    public function __construct()
    {
        $this->middleware('auth');
    }



     public function index() {

     $id = Auth::id();
     $notes = Note::orderBy('id', 'desc')->where('user_id','=',$id)->paginate(10);
     $shared_notes = Note::where('user_id','=',$id)->orWhere('is_shared',true)->paginate(10);

     return view('notes.index')->with('notes',$notes)->with('shared_notes',$shared_notes);

      }


     public function new() {

     return view('notes.add_note');

     }


      public function edit($id) {

      $note = Note::findOrFail($id);
      return view('notes.edit_note')->with('note',$note);
      
      }



      public function postNoteEdit(UpdateNote $request) {
    
       $note_id = intval($request->get('note_id'));
       $note = Note::where( 'id', '=', $note_id )->first();
       $note->title = $request->get('title');
       $note->body = $request->get('body');
       $note->link = $request->get('link');
       $note->user_id = intval($request->get('user_id'));
       $note->is_public = $request->get('is_public');
       $note->updated_at = Carbon::now();
       $note->save();
       
       return redirect('notes');
      }



      public function postNoteCreate(CreateNote  $request) {

       $note = new Note();
       $note->title = $request->get('title');
       $note->body = $request->get('body');
       $note->link = $request->get('link');
       $note->user_id = intval($request->get('user_id'));
       $note->is_public = $request->get('is_public');
       $note->created_at = Carbon::now();
       $note->save();

       return redirect('notes');

       }
 


  

  public function shared_list() {

       $id = Auth::id();
       $shared_notes = DB::select( DB::raw("SELECT * FROM notes WHERE is_shared = 1 AND user_id =".$id) );
       return view('notes.shared_list')->with('shared_notes',$shared_notes);

      }


     public function new_shared_link() {

     return view('notes.new_shared');

     }


}
