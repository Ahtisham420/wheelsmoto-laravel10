<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use Illuminate\Validation\Rule;
use App\Post;
use Carbon\Carbon;
use Auth;
use  App\BlogLike;
use App\Comment;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags_names = "";
        $tags = Tags::all();
        foreach ($tags as $tag) {

            $tt = explode(",", $tag->tags);
            foreach ($tt as $t) {
                $tags_names .= "'" . $t  . "',";
            }
        }

        $tags_names  = substr_replace($tags_names, "", -1);

        return view("posts.create")->withTags($tags_names);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'posted_at' => ['nullable'],
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'subtitle' => ['nullable', 'string', 'min:1', 'max:255'],
            'post_body' => ['required', 'max:2000000'], //medium text
            'meta_desc' => ['nullable', 'string', 'min:1', 'max:1000'],
            'short_description' => ['required', 'string', 'max:30000'],
            'slug' => [
                'required', 'string', 'min:1', 'max:150', 'alpha_dash', Rule::unique("posts", "slug") // this field should have some additional rules, which is done in the subclasses.
            ],
            'feature_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'author_pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => ['nullable', 'array'],
        ]);


        $new_blog_post = new Post($request->all());

        if (!$new_blog_post->posted_at) {
            $new_blog_post->posted_at = Carbon::now();
        }

        if ($request->hasFile('author_pic')) {
            $cover_author = $request->file('author_pic');

            $extension = $cover_author->getClientOriginalExtension();
            $file_orignal_name = $cover_author->getClientOriginalName();
            //$feature_img_name = $blog_slug . '-' . $file_orignal_name;
            $author_img_name = $file_orignal_name.'.'.$extension;
            $destinationPath_author = public_path('author_pics/');
            $cover_author->move($destinationPath_author, $author_img_name);
            $new_blog_post->author_pic = $author_img_name;
        }
        
$new_blog_post->author_name = $request->author_name;
        $new_blog_post->user_id = Auth::user()->id;
        $new_blog_post->save();
        if ($request->category) {
            $new_blog_post->categories()->sync(array_keys($request->category));
        }



        if ($request->hasFile('feature_image')) {
            $cover = $request->file('feature_image');

            $extension = $cover->getClientOriginalExtension();
            $blog_slug = $new_blog_post->slug;
            $file_orignal_name = $cover->getClientOriginalName();

            //$feature_img_name = $blog_slug . '-' . $file_orignal_name;
            $feature_img_name = $blog_slug.'.'.$extension;

            $destinationPath = public_path('blog_images/');
            $cover->move($destinationPath, $feature_img_name);

            $post_cloumn_update = Post::find($new_blog_post->id);

            // Make sure you've got the Page model
            if ($post_cloumn_update) {
                $post_cloumn_update->image_large = $feature_img_name;
                $post_cloumn_update->save();
            }
        }



        if ($new_blog_post) {
            return redirect()->route('posts.index')->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('posts.index')->with('failure', 'Operation Failed!');
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
        $tags_names = "";
        $tags = Tags::all();
        foreach ($tags as $tag) {

            $tt = explode(",", $tag->tags);
            foreach ($tt as $t) {
                $tags_names .= "'" . $t  . "',";
            }
        }

        $tags_names  = substr_replace($tags_names, "", -1);
        $post = Post::findOrFail($id);
        return view("posts.edit")->withPost($post)->withTags($tags_names);
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
            'posted_at' => ['nullable'],
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'subtitle' => ['nullable', 'string', 'min:1', 'max:255'],
            'post_body' => ['required_without:use_view_file', 'max:2000000'], //medium text
            'meta_desc' => ['nullable', 'string', 'min:1', 'max:1000'],
            'short_description' => ['nullable', 'string', 'max:30000'],
            'slug' => [
                'required', 'string', 'min:1', 'max:150', 'alpha_dash', 'unique:posts,slug,' . $id
            ],
            'categories' => ['nullable', 'array'],
            'feature_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $post = Post::findOrFail($id);
        $post->fill($request->all());

        // $this->processUploadedImages($request, $post);


        if ($request->category) {
            $post->categories()->sync(array_keys($request->category));
        }

        if ($request->hasFile('author_pic')) {
            $cover_author = $request->file('author_pic');

            $extension = $cover_author->getClientOriginalExtension();
            $file_orignal_name = $cover_author->getClientOriginalName();
            $author_img_name = $file_orignal_name.'.'.$extension;
            $destinationPath_author = public_path('author_pics/');
            $cover_author->move($destinationPath_author, $author_img_name);
            $post->author_pic =$author_img_name ;
        }
        if ($request->hasFile('feature_image')) {
            $cover = $request->file('feature_image');

            $extension = $cover->getClientOriginalExtension();
            $blog_slug = $post->slug;
            $file_orignal_name = $cover->getClientOriginalName();

            // $feature_img_name = $blog_slug;
            $feature_img_name = $blog_slug.'.'.$extension;

            $destinationPath = public_path('blog_images/');
            $cover->move($destinationPath, $feature_img_name);

            // $post_cloumn_update = Post::find($new_blog_post->id);

            // Make sure you've got the Page model
            $post->image_large = $feature_img_name;
        }
        $post->author_name = $request->author_name;
        $post->save();


        if ($post) {
            return redirect()->route('posts.index')->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('posts.index')->with('failure', 'Operation Failed!');
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
//    public  function  UserView($id = null)
//    {
//
//        if (!empty($id)){
//            $id = base64_decode($id);
//            $posts = Post::where('id','=',$id)->first();
//        }else{
//            $posts = Post::orderBy('created_at', 'desc')->first();
//        }
//
//        $sideposts = Post::where('id','!=',$posts->id)->orderBy('created_at', 'desc')->take(4)->get();
//
//        return view('frontend.blog', compact('posts','sideposts'));
//    }


    public  function  UserView($id = null)
    {
        if (!empty($id)){
            $id = base64_decode($id);
            $posts = Post::where('id','=',$id)->first();
        }else{
            $posts = Post::orderBy('created_at', 'desc')->where('is_published','=',1)->first();
        }
        $likecount = BlogLike::where('post_id','=',$posts->id)->get();
        $sideposts = Post::where('id','!=',$posts->id)->where('is_published','=',1)->orderBy('created_at', 'desc')->take(4)->get();
        $comment = Comment::with('user')->orderBy('created_at','desc')->where('post_id','=',$posts->id)->get();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $like  = BlogLike::where('post_id','=',$posts->id)->where('user_id','=',session('userDetails')->id)->first();
            return view('frontend.blog', compact('posts','sideposts','comment','like','likecount'));
        }
        return view('frontend.blog', compact('posts','sideposts','comment','likecount'));
    }

    public  function  BlogSearch($search){
        $result = Post::orderBy('created_at','desc')->where('title','like','%'.$search.'%')->limit(4)->get();
        if (!empty($result)) {
            return response()->json(["status" => 1, "result" => $result]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }


    public  function  BlogSaveList($c_id){

             $save = new BlogLike();
        $id =session('userDetails')->id;
        if($car=BlogLike::where("user_id","=",$id)->where("post_id","=",$c_id)->first()){
            if($car->delete()){
                $count = BlogLike::where("post_id","=",$c_id)->count();
                return response()->json(["status" => 1, "result" => "Car deleted","count"=>$count]);
            }
        }

        $save->user_id=$id;
        $save->post_id=$c_id;
        if($save->save()){
            $count = BlogLike::where("post_id","=",$c_id)->count();
            return response()->json(["status" => 1, "result" => "okay","count"=>$count]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }

}
