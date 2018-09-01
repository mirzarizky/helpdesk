<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Session;
use Auth;
Use Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;


class UserProfileController extends Controller
{

    /**
     * Add auth middleware upon initialisation.
     *
     * @author Klola
     */
    public function __construct()
    {
        // Allow access to only authenticated users
        $this->middleware('web');
        $this->middleware('auth'); // Some reason adding both middleware is the only way to go!
    }

    /**
     * Get the current user profile.
     *
     * @return View
     * @author Klola
     */
     public function index()
     {
         $ticket_count = DB::table('ticketid')->where('user_id',Auth::id())->count();;
         $forum_comment_count     = DB::table('chatter_post')->where('user_id',Auth::id())->count();;
         $forum_discussion_count  = DB::table('chatter_discussion')->where('user_id',Auth::id())->count();;
         return view('users.dashboard', [
           'ticket_count' => $ticket_count,
           'forum_comment_count'    => $forum_comment_count,
           'forum_discussion_count' => $forum_discussion_count]) ;
     }


    public function viewProfile(Request $request)
    {
        $user = User::find($request->user()->id);
        return view('users.viewProfile', ['user' => $user]) ;
    }

    /**
     * Validate any alterations and save them.
     *
     * @param Request $request
     * @return back with errors
     * @author Klola
     */
    public function editProfile(Request $request)
    {
        $user = User::find($request->user()->id);
        if ($request["name"]) {
            $this->validate($request, [
                'name' => 'max:255|required'
            ]);
            $user->name = $request["name"];
        }
        if ($request["email"]) {
            $this->validate($request, [
                'email' => 'max:255|email|required|unique:users'
            ]);
            $user->email = $request["email"];
        }
        if($request->hasFile('avatar')){
          $this->validate($request,[
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);
      		$avatar = $request->file('avatar');
      		$filename = time() . '.' . $avatar->getClientOriginalExtension();
      		Image::make($avatar)->resize(150, 150)->save( public_path('/storage/users/' . $filename ) );
      		$user->avatar = 'users/'.$filename;
      	}
        $user->save();
        Session::flash('message', "Profile Successfully Updated!");
        return redirect()->back();
    }


    /**
     * Validate any alterations and save them.
     *
     * @param Request $request
     * @return back with errors
     * @author Klola
     */
     public function viewPassword(Request $request)
     {
           $user = User::find($request->user()->id);
           return view('users.changePassword', ['user' => $user]) ;
     }


    public function editPassword(Request $request)
    {

          $user = User::find($request->user()->id);
          if ($request["password"]) {
              $this->validate($request, [
                  'old_password'        => 'required|old_password:' . Auth::user()->password,
                  'password'            => 'min:6|required',
                  'password_confirmed'  => 'min:6|required|same:password'
              ]);
              $user->password = bcrypt($request["password"]);
          }

          $user->save();
          Session::flash('message', "Password Successfully Updated!");
          return redirect()->back();
    }

}
