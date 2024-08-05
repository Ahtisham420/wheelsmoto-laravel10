<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Event::orderBy('id', 'desc')->paginate(8);

        return view('events.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("events.create");
//
//        $request->validate([
//            'event_name' => ['required', 'string', 'min:1', 'max:255'],
//            'author_name' => ['required', 'string', 'min:1', 'max:255'],
//            'subtitle' => ['nullable', 'string', 'min:1', 'max:255'],
//            'post_body' => ['required', 'max:2000000'], //medium text
//            'meta_desc' => ['nullable', 'string', 'min:1', 'max:1000'],
//            'short_description' => ['required', 'string', 'max:30000'],
//            'slug' => [
//                'nullable', 'string', 'min:1', 'max:150', 'alpha_dash', Rule::unique("posts", "slug") // this field should have some additional rules, which is done in the subclasses.
//            ],
//            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'categories' => ['nullable', 'array'],
//        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'event_name'=>'required',
            'event_host'=>'required',
            'event_decription'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'image'=>'required',
            'location'=>'required'
        ]);
        $event  = new  Event();
        $event->event_name = $request->event_name;
        $event->started_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->event_description = $request->event_decription;
        $event->event_host = $request->event_host;
        $event->user_id = Auth::user()->id;
        $event->location = $request->location;
        $event->map_lat = $request->maplat;
        $event->map_lng = $request->maplng;
         if ($request->file('image')){
        $cover = $request->file('image');

        $extension = $cover->getClientOriginalExtension();
        $feature_img_name = time().'.'.$extension;
          $destinationPath = public_path('event_images/');
            $cover->move($destinationPath, $feature_img_name);
            $event->img = $feature_img_name;
        }
        if($event->save()){
            return redirect()->route('events.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Event::find($id);
        return view('events.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name'=>'required',
            'event_host'=>'required',
            'start_date'=>'required',
            'event_decription'=>'required',
            'end_date'=>'required',
            'location'=>'required'
        ]);

        $event  = Event::find($id);
        $event->event_name = $request->event_name;
        $event->started_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->event_description = $request->event_decription;
        $event->event_host = $request->event_host;
        $event->location = $request->location;
        $event->map_lat = $request->maplat;
        $event->map_lng = $request->maplng;
        $event->user_id = Auth::user()->id;
        if ($request->file('image')){
            $cover = $request->file('image');

            $extension = $cover->getClientOriginalExtension();
            $feature_img_name = time().'.'.$extension;
            $destinationPath = public_path('event_images/');
            $cover->move($destinationPath, $feature_img_name);
            $event->img = $feature_img_name;
        }
        if($event->save()){
            return redirect()->route('events.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public  function UserViewEvent(){
      //
        $events = Event::orderBy('created_at','desc')->paginate(4);
     return  view('frontend.event-list',compact('events'));
           }

           public  function  EventDetail($id){
            $id=base64_decode($id);
           // dd($id);
           $sidevent = Event::orderBy('created_at','desc')->take(4)->get();
           $result = Event::where('id','=',$id)->first();
           return view('frontend.event-detail',compact('result','sidevent'));
           }

           public function EventSearch($search)
           {
               $result = Event::orderBy('created_at','desc')->where('location','like','%'.$search.'%')->limit(4)->get();
               if (!empty($result) && count($result) > 0 ) {
                   return response()->json(["status" => 1, "result" => $result]);
               }
               return response()->json(["status" => 0, "result" => ""]);
           }

}
