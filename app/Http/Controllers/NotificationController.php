<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Notification::orderBy('id', 'desc')->paginate(8);
        return view('notifications.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view("notifications.create", compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // test repo
        $request->validate([
            'title' => ['string','max:255',Rule::unique('notifications')],
            'content' => ['required_if:type,1','string',Rule::unique('notifications')],
            // 'schedule_time' => 'required_if:type,1',
            'slug' => [
                'nullable', 'string', 'min:1', 'max:150', 'alpha_dash', Rule::unique("notifications", "slug") // this field should have some additional rules, which is done in the subclasses.
            ],
        ]);

        $schedule_time = Carbon::now()->getTimestamp();
//        dd($schedule_time);
//        dd($request->schedule_time);
        if(!empty($request->schedule_time)) {
            $schedule_time = Carbon::createFromTimeStamp(strtotime($request->schedule_time))->getTimeStamp();
        }
//        dd($schedule_time);
        $new_blog_post = new Notification($request->all());

        if($request->is_email == 'on'){
            $new_blog_post->is_email = 1;
        }

        if($request->is_push_notification == 'on'){
            $new_blog_post->is_push_notification = 1;
        }
        if($schedule_time) {
            $new_blog_post->data_time = $schedule_time;
        }
        $new_blog_post->save();
//        dd($new_blog_post);

//        print_r($new_blog_post->data_time );
//        dd("sdsdd");


        if ($new_blog_post) {
            return redirect()->route('notifications.index')->with('success', 'Operation Create Successfull!');
        } else {
            return redirect()->route('notifications.index')->with('failure', 'Operation Create Failed!');
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

        $post = Notification::findOrFail($id);
        $users = User::all();
        return view("notifications.edit", compact('post','users'));
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
            'title' => ['required','string','max:255',Rule::unique('notifications')->ignore($id)],
            'content' => ['required_if:type,1','string',Rule::unique('notifications')->ignore($id)],
            'schedule_time' => 'required_if:type,1',
            'slug' => [
                'nullable', 'string', 'min:1', 'max:150', 'alpha_dash', 'unique:notifications,slug,' . $id
            ],
        ]);

        $post = Notification::findOrFail($id);
        $post->fill($request->all());
        $schedule_time = Carbon::createFromTimeStamp(strtotime($request->schedule_time))->getTimeStamp();
        // $this->processUploadedImages($request, $post);
        if($request->is_email == 'on'){
            $post->is_email = 1;
        }

        if($request->is_push_notification == 'on'){
            $post->is_push_notification = 1;
        }
        if($schedule_time) {
            $post->data_time = $schedule_time;
        }

        $post->save();


        if ($post) {
            return redirect()->route('notifications.index')->with('success', 'Operation update Successfull!');
        } else {
            return redirect()->route('notifications.index')->with('failure', 'Operation update Failed!');
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
        //
    }
}
