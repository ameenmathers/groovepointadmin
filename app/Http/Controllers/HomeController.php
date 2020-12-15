<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $events = event::all();
        $news = news::all();

        return view('home',[

            'events' => $events,
            'news'  => $news,
        ]);
    }



    public function uploadEvent()
    {
        return view('upload-event');
    }

    public function postUploadEvent(Request $request){

        try{

            $event = new event();
            $event->name = $request->input('name');
            $event->location = $request->input('location');
            $event->desc = $request->input('desc');
            $event->tag = $request->input('tag');
            $event->date = $request->input('date');
            $event->time = $request->input('time');
            $event->link = $request->input('link');



            if($request->hasFile('image')){
                $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName() ;
                $file->move("uploads", $fileName);
                $event->image = url('uploads/'.$fileName );
            }

            if($request->hasFile('video')){
                $file = $request->file('video') ;
                $fileName = $file->getClientOriginalName() ;
                $file->move("uploads", $fileName);
                $event->image = url('uploads/'.$fileName );
            }

            if($request->hasFile('audio')){
                $file = $request->file('audio') ;
                $fileName = $file->getClientOriginalName() ;
                $file->move("uploads", $fileName);
                $event->image = url('uploads/'.$fileName );
            }

            $event->save();






            $request->session()->flash('success','Event Added.');

            return redirect('upload-event');

        }catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return redirect( 'upload-event');

        }


    }

    public function uploadNews()
    {
        return view('upload-news');
    }

    public function postUploadNews(Request $request){

        try{

            $news = new news();
            $news->name = $request->input('name');
            $news->desc = $request->input('desc');
            $news->tag = $request->input('tag');
            $news->link = $request->input('link');



            if($request->hasFile('image')){
                $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName() ;
                $file->move("uploads", $fileName);
                $news->image = url('uploads/'.$fileName );
            }

            if($request->hasFile('image2')){
                $file = $request->file('image2') ;
                $fileName = $file->getClientOriginalName() ;
                $file->move("uploads", $fileName);
                $news->image2 = url('uploads/'.$fileName );
            }

            if($request->hasFile('video')){
                $file = $request->file('video') ;
                $fileName = $file->getClientOriginalName() ;
                $file->move("uploads", $fileName);
                $news->image = url('uploads/'.$fileName );
            }

            if($request->hasFile('audio')){
                $file = $request->file('audio') ;
                $fileName = $file->getClientOriginalName() ;
                $file->move("uploads", $fileName);
                $news->image = url('uploads/'.$fileName );
            }


            $news->save();

            $request->session()->flash('success','News Added.');

            return redirect('upload-news');

        }catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return redirect( 'upload-news');

        }


    }



    public function eventsTable()
    {

        $events = event::latest()->paginate(20);
        return view('events-table',[
            'events'=> $events
        ]);


    }



    public function newsTable()
    {

        $news = news::all();
        return view('news-table',[
            'news'=> $news
        ]);


    }





    public function deleteEvent(Request $request, $eid)
    {
        event::destroy($eid);

        $request->session()->flash('success','Event Deleted.');
        return redirect('events-table');
    }


    public function deleteNews(Request $request,$nid)
    {
        news::destroy($nid);

        $request->session()->flash('success','News Deleted.');
        return redirect('news-table');
    }

    public function settings()
    {
        return view('settings');
    }

    public function postSettings(Request $request)
    {
        try{
            $user = User::find(Auth::user()->uid);
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->save();
            $request->session()->flash('success','Profile Updated');
        } catch(\Exception $exception){
            $request->session()->flash('error','Sorry An Error Occurred.');
        }

        return redirect('settings');
    }


    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
