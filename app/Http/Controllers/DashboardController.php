<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use App\Http\Requests\SearchNote;
use App\Http\Requests\SharedLink1;
use App\Http\Requests\SharedLink2;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
public function index() {

$notes = Note::orderBy('id', 'desc')->where('is_public',true)->paginate(10);
$shared_notes=Note::orderBy('id', 'desc')->where('is_shared','=',1)->paginate(10);
  
return view('dashboard.index')->with('notes',$notes)->with('shared_notes',$shared_notes);

}



public function search(SearchNote $request) {

$query = $request->get('query');
$notes = Note::where('body', 'LIKE', "%$query%")->where('is_public',false)->paginate(10);

$total = Note::where('body', 'LIKE', "%$query%")->where('is_public',false)->count();

return view('dashboard.search')->with('notes',$notes)->with('query',$query)->with('total',$total);


}


public function new_shared_link($id) {

$users = User::all();
$note = Note::findOrFail($id);

return view('dashboard.add_shared1')->with('note',$note)->with('users',$users);

}


public function new_link(Request $request) {

$note_id = $request->session()->get('note_id');

$note = Note::findOrFail($note_id);

return view('dashboard.add_shared2')->with('note',$note);

}




public function postSharedLink1(SharedLink1 $request) {

 $user_email =$request->get('user_email');
 $note_id = intval($request->get('note_id'));
 
 $found_user = User::where( 'email', '=', $user_email )->count();

 if ($found_user > 0) {

 $data = [

'email'=> $user_email,
'title'=>$request->get('title'),
'link'=>$request->get('link'),
];
 
       $note = Note::where( 'id', '=', $note_id )->first();
       $note->title = $request->get('title');
       $note->link = $request->get('link');
       $note->is_shared = 1;
       $note->updated_at = Carbon::now();
       $note->save();


\Mail::send('emails.shared_link_msg', $data, function($message)  use ($user_email)
{
$message->from(env('MAIL_FROM'));
$message->to($user_email, env('MAIL_NAME'));
$message->subject('New Shared Link to You');
});

return redirect('dashboard');

}


else { 
      
 $request->session()->put('note_id', $note_id);

}

return redirect('new_link');


}


public function postSharedLink2(SharedLink2 $request) {

 $email =$request->get('email');
 $note_id = $request->session()->get('note_id');

    $data = [
    'email'=> $email,
    'title'=>$request->get('title'),
    'link'=>$request->get('link'),
    ];


\Mail::send('emails.shared_link_msg', $data, function($message) use($email)
{
$message->from(env('MAIL_FROM'));
$message->to($email, env('MAIL_NAME'));
$message->subject('New Shared Link to You');
});

       $note = Note::where( 'id', '=', $note_id )->first();
       $note->title = $request->get('title');
       $note->link = $request->get('link');
       $note->is_shared = 1;
       $note->updated_at = Carbon::now();
       $note->save();

    

return redirect('dashboard');


}


}
