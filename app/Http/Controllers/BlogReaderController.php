<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Viewing blog'; // default title...

        $posts = Post::query();
        $posts = $posts->orderBy("posted_at", "desc")
            ->paginate(10);

        return view("blogs.index", [
            'posts' => $posts,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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


    /**
     * View a single post and (if enabled) it's comments
     *
     * @param Request $request
     * @param $blogPostSlug
     * @return mixed
     */
    public function viewSinglePost(Request $request, $blogPostSlug)
    {
        // the published_at + is_published are handled by BlogEtcPublishedScope, and don't take effect if the logged in user can manage log posts
        $blog_post = Post::where("slug", $blogPostSlug)
            ->firstOrFail();

        $posts = Post::query();

        $sidebar_posts = $posts->orderBy("posted_at", "desc")
            ->paginate(2);


        return view("blogs.single_post", [
            'post' => $blog_post,
            'sidebar_posts' => $sidebar_posts,
            // the default scope only selects approved comments, ordered by id
            'comments' => $blog_post->comments()
                ->get(),

        ]);
    }
}
