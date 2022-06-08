<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
 
        return view('home');
    }

    public function get_suggestions()
    {
        $authenticatedUserId = \Auth::user()->id;
          $users=User::where('id','!=',\Auth::user()->id)
          //->whereDoesntHave('suggestions',  function($q) use($authenticatedUserId){
        //     $q->where('from_user_id', $authenticatedUserId )->where('status',    2);
        // })
        ->get();
        $userId  = [];
        $requests = Requests::get();
        foreach( $requests as $request){
            if($request->from_user_id == \Auth::user()->id){
                $tableField = 'to_user_id';
                $id = $request->to_user_id;
                 
            }else{
                $tableField = 'from_user_id';
                $id = $request->from_user_id;
            }
           
            $rqt = Requests::where($tableField,$id)->whereIn('status',[1,2])->first();
            
            $userId[]  = $id;
           
            
        }
         
        $suggestions = User::whereNotIn('id',$userId)->where('id','!=',\Auth::user()->id)->get();
         
        $url = url('send-request');

        return view('components.suggestion',['suggestions' => $suggestions, 'url' => $url, 'currentuserid' => $authenticatedUserId, 'count' => count($suggestions)])->render();

    }


    public function sent_requests()
    {
        $authenticatedUserId = \Auth::user()->id;
        $sent_requests = Requests::with('toUser')->where('from_user_id', '=',  $authenticatedUserId)->where('status',  1)->get();
       //print_r($sent_requests);
        //die;
        
        $url = url('withdraw-request');

        return view('components.request',['sent_requests' => $sent_requests, 'url' => $url, 'currentuserid' => $authenticatedUserId, 'count' => count($sent_requests), 'mode'=>'sent'])->render();

    }

    public function recieved_requests()
    {
        $authenticatedUserId = \Auth::user()->id;
        $recieved_requests = Requests::with('fromUser')->where('to_user_id', '=',  $authenticatedUserId)->where('status', '!=',  2)->get();
       //print_r($sent_requests);
        //die;
        
        $url = url('accept-request');

        return view('components.request',['recieved_requests' => $recieved_requests, 'url' => $url, 'currentuserid' => $authenticatedUserId, 'count' => count($recieved_requests), 'mode'=>'recieved'])->render();

    }

    public function withdraw_request(Request $request)
    {
        $arr = $request->all();

        $res = Requests::where('from_user_id', $arr['from_user_id'])->where('to_user_id', $arr['to_user_id'])->delete();

        
        echo "del";
    }

    public function accept_request(Request $request)
    {
        $arr = $request->all();

        Requests::where('from_user_id', $arr['from_user_id'])->where('to_user_id', $arr['to_user_id'])->update(['status' => 2]);
        
        echo "acc";
    }
    

}
