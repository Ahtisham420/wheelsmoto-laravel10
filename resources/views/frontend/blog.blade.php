@include('frontend.partials.header')

<!-- <div class="container-fliud slider">
      <div class="row m-0">
        <div class="col-12 aboutblog">
          <div class="blogHeading">
            Blog Detail
          </div>
          <div class="blogdescription">
            Elementum Libero Hac Leo Integer. Risus Hac Parturient Feugiat Litora<br>
Cursus Hendrerit Bibendum Per
          </div>

        </div>
      </div>



    </div> -->
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-8 blogsection">
            <div class="row m-0">
                <div class="col-12 blogimage p-0">
                    @if(!empty($posts))
                        <img src="{{ asset('public\blog_images/'.$posts->image_large) }}" alt="">
                    @endif
                </div>
                @if(!empty($posts))
                    <div class="col-12 col-xl-8 blogtitle ">
                        {{$posts->title}}
                    </div>
                    <div class="col-12 blogwriter p-0">
                        <div class="row m-0">
                            <div class="col-11 writerNAme p-0">
                                <h6 class="m-0">{{$posts->author_name}}</h6>
                                <p class="m-0">{{$posts->created_at->format('d M Y')}} | {{$posts->created_at->format('g:i:A')}}</p>
                            </div>
                            <div class="col-1 picdiv p-0">
                                <div><img class="author-pic-blog" @if(!empty($posts->author_pic)) src="/../../public/author_pics/{{$posts->author_pic}}" @else src="https://wheelshunt.com/resources/images/thunmnailsilder/profile.png" @endif></div>

                            </div>

                        </div>

                    </div>
                    <div class="col-12 blogdetail">
                        {!! $posts->post_body !!}
                    </div>
                @endif
                <div class="col-12 p-0">
                    <hr>
                </div>
                <div class="col-12 col-sm-6 commentsection p-0">
                    <img class="imagpadding" src="{{ config('app.ui_asset_url').'frontend/img/events&blog/25663.png' }}" alt="">
                    @if(!empty($comment)){{count($comment)}}@endif Comments
                </div>
                <div class="col-12 col-sm-6 likesection p-0">
                    @if(!empty($like) && $like->post_id === $posts->id)
                        <i class="fas fa-heart mt-1 mr-1 like-in-blog" @if(!empty($posts))data-col = '{{$posts->id}}' @endif style="color:#fd001e"></i>
                        @if(!empty($likecount))  <span class="count-lik-blog">{{count($likecount)}} people like this</span>  @endif
                    @else
                        <i class="fas fa-heart mt-1 mr-1 like-in-blog" @if(!empty($posts))data-col = '{{$posts->id}}'@endif></i>
                        @if(!empty($likecount))  <span class="count-lik-blog">{{count($likecount)}} people like this</span>  @endif
                    @endif
                </div>
                {{--@foreach($comment as $com)--}}
                {{--<div class="col-12">--}}
                {{--<hr>--}}
                {{--</div>--}}
                {{--<div class="col-12 comment1section">--}}

                {{--<p>{{$com->comment}}</p>--}}

                {{--</div>--}}
                {{--<div class="col-12">--}}
                {{--<div class="row">--}}
                {{--<div class="col-4 col-sm-3 col-lg-1 clientimages"><img src="{{ asset('storage\app/'.$com->user['avatar']) }}" alt=""></div>--}}
                {{--<div class="col-6 clientName p-0">--}}
                {{--<h6>{{$com->user['username']}}, {!! $com->user['about'] !!}</h6>--}}
                {{--<p>{{$com->user['city']}}, {{$com->user['Country']}}</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}
                <div class="token">
                    {{ csrf_field() }}
                    <div id="post_data"></div>
                    <div class="col-12 leavcomment">
                    </div>
                    Leave a Comment
                </div>
                <div class="col-12 commentform">
                    @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                        <form action="{{route('create-blog-comment')}}" method="post">
                            @csrf
                            @if(!empty($posts))
                                <input type="hidden" name="author_name" value="{{$posts->author_name}}">
                                <input type="hidden" name="post_id" id="post_id" value="{{$posts->id}}">
                            @endif
                            {{--<div class="row">--}}
                            {{--<div class="col">--}}
                            {{--<input type="text" class="form-control" placeholder="First name" name="first_name" required min="1" max="20">--}}
                            {{--</div>--}}
                            {{--<div class="col">--}}
                            {{--<input type="text" class="form-control" placeholder="Last name" name="last_name" required min="1" max="20">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col">--}}
                            {{--<input type="text" class="form-control" placeholder="Subject" name="subject" required min="1" max="50">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="row">
                                <div class="col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" rows="4" name="comment" required minlength="1" maxlength="255"></textarea>
                                </div>
                            </div>
                             @if ($errors->has('comment'))
                            <div class="alert alert-danger">{{ $errors->first('comment') }}</div>
                            @endif
                            <div class="row">
                                <div class="col-12 postcomment">
                                    <button class="btn" type="submit">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    @else
                        @if(!empty($posts))
                            <input type="hidden" name="post_id" id="post_id" value="{{$posts->id}}">
                        @endif
                    @endif
                </div>





            </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-4 blogsection">
            <div class="row m-0">
                <div class="col-12 searchitem">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-blog" placeholder="Search Blog" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text blog-span-search" id="basic-addon2"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 popularblog">
                <div class="col-12">
                    <div class="row headingmargin">
                        <div class="col-6 blogheading" id="blog-search-popular">Popular Blogs</div>
                        <div class="col-4">
                            <hr>
                        </div>
                    </div>
                </div>
                <div id="append_id_blog">
                    <div id="apend_blog">
                        @foreach($sideposts as $blog)
                            <div class="col-12 blogcard">
                                <div class="card">
                                    <a href="{{route("frontend-blog",["id"=>base64_encode($blog->id)])}}"><img class="card-img-top" src="{{ asset('public/blog_images/'.$blog->image_large) }}" alt="Card image cap"> </a>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 blogcardheading">
                                                {{$blog->title}}
                                            </div>
                                            <div class="col-12 blogwritername">{{$blog->author_name}} | {{$blog->created_at->format('d M Y')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{--blog modal like--}}
<div class="modal fade" id="blogModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Blog Page</h5>
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            </div>
            <div class="modal-body">
                Please Login For Like this Blog.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{route("blog-login",["bg"=>"blog"])}}" type="button" class="btn btn-danger">login</a>
            </div>
        </div>
    </div>
</div>

@include('frontend.partials.advertisment-footer')




@include('frontend.partials.footer')
<script>
    $(document).ready(function(){
        var _token = $('.token').find('input[name="_token"]').val();
        var p_id  = $("#post_id").val();
        load_data('', _token,p_id);
        function load_data(id="", _token,p_id)
        {
            $.ajax({
                url:"{{route('blog-comment-load-more')}}",
                method:"POST",
                data:{id:id, _token:_token,post_id:p_id},
                success:function(data)
                {
                    console.log(data);
                    $('#load_more_button').remove();
                    $('#post_data').append(data);
                }
            })
        }
        $(document).on('click', '#load_more_button', function(){
            var id = $(this).data('id');
            var p_id  = $("#post_id").val();
            $('#load_more_button').html('<b>Loading...</b>');
            load_data(id, _token,p_id);
        });

    });
</script>
@include('frontend.partials.filters-script')
