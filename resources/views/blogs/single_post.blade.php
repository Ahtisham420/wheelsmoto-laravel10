<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if ($post->title)  
     <title>{{ $post->seo_title}}</title>
     <meta property="og:title" content="{{ $post->title}}" />
     <meta name="twitter:title" content="{{ $post->title}}}">
    @else
    <title> {{env('APP_NAME', 'Site Name')}}</title>
    @endif
    @if ($post->post_tags)  
      <meta name='keywords' content='{{$post->post_tags}}' />
    @endif
    @if ($post->image_large)
      <meta property="og:image" content="{{ $post->image_url($post->image_large)}}" />
    @endif

    @if ($post->short_description)
      <meta property="og:description" content="{{ $post->short_description }}" />
    @endif
    @if ($post->slug)
      <meta property="og:url" content="{{ $post->url() }}" />
    @endif

   
    <meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
    <meta name="twitter:image" content=" http://euro-travel-example.com/thumbnail.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ asset('public/images/blog/new-logo.png')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" id="font-awesome-css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=20151215"
        type='text/css' media='all' />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/js/blog/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/js/blog/slick/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/blog/style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/blog/style-version-2.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/blog/media.cs')}}s">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" href="{{ config('app.coure_ui_asset_url').'sass/counter-css/style.css' }}" />
    <style>
        .header-section .row {
            padding-top: 0px;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
    </style>
    

</head>

<body>


    <header>
        <div class="container-fluid header-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 site-logo"> <img
                            src="{{ config('app.coure_ui_asset_url').'images/counter-images/header-logo.png' }}"
                            alt="Logo" class="img-fluid" /><a href="#" title="Request Private Access"
                            class="access-btn mob-btn" data-toggle="modal" data-target="#subscribe"> <img
                                src="{{ config('app.coure_ui_asset_url').'images/counter-images/access.png' }}"
                                alt="Access" class="img-fluid" /> Request Private Access</a>
                    </div>
                    <div class="col-sm-10 primary-menu new-header">
                        <ul class="list-inline primary-menu-list">
                            <li class="list-inline-item"><a title="you see it">you <strong>see</strong> it</a></li>
                            <li class="list-inline-item"><a title="you see it">you <strong>want</strong> it</a></li>
                            <li class="list-inline-item"><a title="you see it">you <strong>rent</strong> it</a></li>
                        </ul>
                        <div class="request-access">
                            <a href="#" title="Request Private Access" class="access-btn" data-toggle="modal"
                                data-target="#subscribe"> <img
                                    src="{{ config('app.coure_ui_asset_url').'images/counter-images/access.png' }}"
                                    alt="Access" class="img-fluid" /> Request Private Access</a>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a title="Twitter" href="https://twitter.com/app_rents"
                                        target="_blank"><img
                                            src="{{ config('app.coure_ui_asset_url').'images/counter-images/twitter-icon.png' }}"
                                            alt="Social" class="img-fluid" /></a></li>
                                <li class="list-inline-item"><a title="Facebook"
                                        href="https://www.facebook.com/EverythingRentsapp" target="_blank"><img
                                            src="{{ config('app.coure_ui_asset_url').'images/counter-images/fb-icon.png' }}"
                                            alt="Social" class="img-fluid" /></a></li>
                                <li class="list-inline-item"><a title="Play Store"><img
                                            src="{{ config('app.coure_ui_asset_url').'images/counter-images/store-icon.png' }}"
                                            alt="Social" class="img-fluid" /></a></li>
                                <li class="list-inline-item"><a title="App Store"><img
                                            src="{{ config('app.coure_ui_asset_url').'images/counter-images/iphone-icon.png' }}"
                                            alt="Social" class="img-fluid" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <div class="container-fluid blog-header blog-header-single"
        style="filter: grayscale(100%); padding:0 ; background: url('https://www.libertyhousebuyinggroup.com/wp-content/uploads/2018/12/4-Factors-Of-Property-Value.jpg')no-repeat center / cover;">

        <a style="padding: 10px;font-size: 50px; color: white; text-decoration: none" href="{{route('blog-page')}}">
            Rentmoe Blog
        </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="rent-breadcrumb col-sm-12">
                <nav class="breadcrumb"><a href="{{url('/')}}">Home</a><span class="divider">/ </span><a
                        href="{{route('blog-page')}}"> Blog</a><span class="divider">/ </span>
                    {{ $post->title}}
                </nav>
            </div>
        </div>
    </div>


    <div class="container-fluid blob-post-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 blog-sidebar">
                    <div class="blog-list">
                        <h2>Other Posts</h2>
                        @forelse($sidebar_posts as $pt)
                        <div class="media">
                            <div class="media-left">
                                <?= $pt->image_tag(false, 'media-object') ?>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$pt->title}}</h4>
                                <p>{!! $pt->generate_introduction(50) !!}</p>
                                <div>
                                    <a href="{{$pt->url()}}" title="Read More">Read More</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class='alert alert-danger'>No posts</div>
                        @endforelse

                    </div>
                </div>
                <div class="col-sm-9 blog-posts">
                    <div class="col-sm-12">
                        <div class="blog-post-img">
                            <?=$post->image_tag(false, 'img-fluid'); ?>
                            {{-- <div style="background: url(images/join-team.jpeg)no-repeat center/ cover;"></div> --}}
                        </div>
                        <div class="admin-info">
                            <div class="post-by">
                                <i class="fa fa-user"></i><span>Posted By</span><a href="#"
                                    title="Jhon Cena">{{ $pt->author_name($pt->user_id) }}</a>
                            </div>
                        </div>
                        <div class="blog-post-txt">
                            <h2>{{$post->title}}</h2>
                            {!! $post->post_body !!}
                        </div>
                    </div>

                    <div class="comment-section col-sm-12">
                        <h2 class="text-center">Add Comment</h2>
                        <div id="addCommentFail" class="alert alert-danger m-3" style="display: none">
                            Operation failed. Please input all the required fields.
                        </div>
                        <div class="alert alert-success sucess-comment-submission" style="display: none">
                            <strong>Thanks!</strong> Your comment has been saved! After an admin user approves the
                            comment, it'll appear on the site!.
                        </div>
                        <form method='post' id="add_new_comment"
                            action='{{route("comments.add_new_comment", $post->slug)}}'>
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type='text' required class="form-control" name='author_name' id="author_name"
                                        placeholder="Enter Name.." required value="{{old("author_name")}}">

                                </div>
                                <div class="col">
                                    <input type='email' required class="form-control" name='author_email'
                                        id="author_email" placeholder="Your Email" required
                                        value="{{old("author_email")}}">
                                </div>
                                <div class="col-sm-12">
                                    <textarea class="form-control" required name='comment' required id="comment"
                                        placeholder="Write Messege.." rows="7">{{old("comment")}}</textarea>
                                </div>
                                <div class="col-sm-12 comment-submit">
                                    <input type="submit" value="Submit" class="orange-btn " id="comment-submission">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 show-comments">
                        @forelse($comments as $comment)

                        <div class="media p-3 parent-comment">


                            <!--                        <img src="images/john.png" alt="John Doe" class="mr-3 rounded-circle">-->
                            <div class="commenter-name"><span>J</span></div>
                            <div class="media-body">
                                <h4>{{$comment->author()}} <small><i>Posted on
                                            {{$comment->created_at->diffForHumans()}}</i></small></h4>
                                {!! nl2br(e($comment->comment))!!}
                            </div>
                        </div>

                        @empty
                        <div class='alert alert-info'>No comments yet! Why don't you be the first?</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- <footer>
        <div class="container-fluid footer-section">
            <div class="row footer-wrapper">
                <div class="col-sm-5 subscribe-info">
                    <div class="footer-logo">
                        <img src="{{ asset('public/images/blog/footer-logo.png')}}" alt="Logo" class="img-fluid">
    </div>
    <p>Earn Money by renting things you own. Rent things you need quickly and easily with our
        proprietary
        solution.</p>
    <form class="subscribe-form">
        <div class="subscribe-form-wrapper">
            <input type="email" name="email" class="txt-field" placeholder="YOUR EMAIL ADDRESS">
            <input type="submit" name="subscribe" class="orange-btn" value="Subscribe">
        </div>
    </form>
    </div>
    <div class="col-sm-2">
        <h2>Contact Info</h2>
        <ul class="list-unstyled footer-steps">
            <li><span class="content-title">Address:</span></li>
            <li><span class="content-detail">LAHORE, PAKISTAN</span></li>
            <li><span class="content-title">Phone:</span></li>
            <li><a href="tel:+923247385000"><span class="content-detail">+92 324 7385 000</span></a></li>
            <li><span class="content-title">Email:</span></li>
            <li><a href="mailto:everythingrents.official@gmail.com"><span
                        class="content-detail">everythingrents.official@gmail.com</span></a></li>
        </ul>
    </div>
    <div class="col-sm-2">
        <h2>Useful Link</h2>
        <ul class="list-unstyled footer-steps">
            <li><a href="#"><span class="content-detail"></span></a></li>
            <li><a href="#"><span class="content-detail"></span></a></li>
        </ul>
    </div>
    <div class="col-sm-2">
        <h2>My Account</h2>
        <ul class="list-unstyled footer-steps">
            <li><a href="#"><span class="content-detail">Login</span></a></li>
            <li><a href="#"><span class="content-detail">Order History</span></a></li>
            <li><a href="#"><span class="content-detail">My Wishlist</span></a></li>
            <li><a href="#"><span class="content-detail">Track Order</span></a></li>
            <li><a href="#" class="orange-btn">Become Now</a><span class="renter">Be A Renter</span></li>

        </ul>
    </div>
    </div>
    </div>
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-sm-9 copyright-txt">
                <ul class="list-inline">
                    <li class="list-inline-item"><a title="you see it"><span>All Rights Are Reserved. ©
                                2019</span></a>
                    </li>
                    <li class="list-inline-item"><a title="you see it"><span>vaderstudio.net</span></a></li>
                    <li class="list-inline-item"><a title="you see it"><span>Terms</span></a></li>
                    <li class="list-inline-item"><a title="you see it"><span>Privacy Policy</span></a></li>

                </ul>
            </div>
            <div class="col-sm-3 social-logos">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" target="_blank"><img
                                src="{{ asset('public/images/blog/twitter.png')}}" alt="Logo" class="img-fluid"></a>
                    </li>
                    <li class="list-inline-item"><a href="#" target="_blank"><img
                                src="{{ asset('public/images/blog/facebook.png')}}" alt="Logo" class="img-fluid"></a>
                    </li>
                    <li class="list-inline-item"><a href="#" target="_blank"><img
                                src="{{ asset('public/images/blog/instagram.png')}}" alt="Logo" class="img-fluid"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </footer> --}}
    <footer>
        <div class="container-fluid footer-section">
            <div class="row footer-wrapper">
                <div class="col-sm-5 subscribe-info">
                    <div class="footer-logo">
                        <img src="{{ config('app.coure_ui_asset_url').'images/counter-images/footer-logo.png' }}"
                            alt="Logo" class="img-fluid" />
                    </div>
                    <p>We are a social-economy platform that provides users a safe and fun way to rent out their unused
                        things and to rent things they need.</p>
                    <form method="post" class="subscribe-form" id="subscribe-form">
                        <div class="subscribe-form-wrapper">
                            <input type="email" name="email" class="txt-field" id="subscribe-email" required
                                placeholder="YOUR EMAIL ADDRESS" />
                            <input type="submit" name="subscribe" class="submit-btn" id="subscribe-button"
                                value="Subscribe" />
                        </div>
                        <br>
                        <p id="subscribe-message"></p>
                    </form>
                </div>
                <div class="col-sm-4">
                    <h2>Contact Info</h2>
                    <ul class="list-unstyled footer-steps">
                        <li><span class="content-title">Email:</span></li>
                        <li><a href="mailto:contact@everything.rent"><span
                                    class="content-detail">contact@everything.rent</span></a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h2>Find Us ON</h2>
                    <ul class="list-unstyled footer-steps">
                        <li><span class="content-title">Instagram</span></li>
                        <li><a href="https://www.instagram.com/everythingrentsapp/"><span
                                    class="content-detail">@everythingrentsapp</span></a></li>
                        <li><span class="content-title">Twitter</span></li>
                        <li><a href="https://twitter.com/app_rents"><span class="content-detail">@app_rents</span></a>
                        </li>
                        <li><span class="content-title">Facebook</span></li>
                        <li><a href="https://www.facebook.com/EverythingRentsapp"><span
                                    class="content-detail">EverythingRentsapp</span></a></li>
                        <li><span class="content-title">Online</span></li>
                        <li><a href="{{route('counter-home')}}"><span class="content-detail">Everything.Rent</span></a>
                        </li>
                        <li><span class="content-title">Our Blog</span></li>
                        <li><a href="{{route('blog-page')}}"><span class="content-detail">Blog</span></a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="row">
                <div class="col-sm-9 copyright-txt">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a title="you see it"><span>All Rights Reserved. ©
                                    {{ date('Y') }}</span></a></li>
                        <li class="list-inline-item"><a title="you see it"><span>everything rents</span></a></li>
                    </ul>
                </div>
                <div class="col-sm-3 social-logos">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="https://twitter.com/app_rents" target="_blank"><img
                                    src="{{ config('app.coure_ui_asset_url').'images/counter-images/twitter.png' }}"
                                    alt="Logo" class="img-fluid" /></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/EverythingRentsapp"
                                target="_blank"><img
                                    src="{{ config('app.coure_ui_asset_url').'images/counter-images/facebook.png' }}"
                                    alt="Logo" class="img-fluid" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Responsive Menu -->
    <div class="resp-menu-con" style="z-index: 99999;">
        <div class="responsive-box">
            <a id="trigger-menu" href="#0" title="" status="close">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </a>
        </div>
    </div>
    <div id="responsive-menu">
        <div id="responsive-menu-overlay">
            <div class="row res-menu p-4">
                <div class="col-sm-12 p-0">
                    <ul id="menu-responsive-menu">
                        <li>
                            <div class="social-links">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Twitter"><i
                                                class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Twitter"><i
                                                class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Twitter"><i
                                                class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="user-info">
                                <select class="form-control">
                                    <option>Jhon Doe</option>
                                    <option>Under Taker</option>
                                    <option>David</option>
                                    <option>Trump</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="upload-btn">
                                <a href="#" class="theme-btn" title="Upload">Upload</a>
                            </div>
                        </li>
                        <li>
                            <div class="site-info">
                                <div class="site-title">
                                    <p>visit our site</p>
                                    <a href="http://www.everything.net"
                                        title="www.everything.net">www.everything.net</a>
                                </div>
                                <div class="winner">
                                    <p><span>Winner: </span>Jhon Cena</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Responsive Menu -->

    <!-- The Modal -->
    <div class="modal subscribers register" id="subscribe">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><img
                            src="{{ config('app.coure_ui_asset_url').'images/counter-images/close-black.png' }}"
                            alt="Close" class="img-fluid" width="19" height="19"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body register-body">
                    <div class="subscribe-info">
                        <div class="footer-logo">
                            <img src="{{ config('app.coure_ui_asset_url').'images/counter-images/header-logo.png' }}"
                                alt="Logo" class="img-fluid">
                        </div>
                        <p>We are a social-economy platform that provides users a safe and fun way to rent out their
                            unused things and to rent things they need.</p>
                        <form method="post" class="subscribe-form" id="modal-subscribe-form">
                            <div class="subscribe-form-wrapper">
                                <input type="email" name="email" class="txt-field" id="modal-subscribe-email" required
                                    placeholder="YOUR EMAIL ADDRESS" />
                                <input type="submit" name="subscribe" class="submit-btn" id="modal-subscribe-button"
                                    value="Subscribe" />
                            </div>
                            <br>
                            <p id="modal-subscribe-message"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/js/blog/slick/slick.min.js')}}"></script>
    <script src="{{ asset('public/js/blog/site.js')}}"></script>
    <script src="{{ config('app.coure_ui_asset_url').'js/counter-js/axios.js' }}"></script>
    <script>
        $(document).ready(function() {
        $(document).on('click', '#comment-submission', function(e) {
            e.preventDefault();
            var action = $('#add_new_comment').attr('action');
            var formData = $('#add_new_comment').serialize();
            axios.post(action, formData)
            .then(function(response) {
                console.log(response['error_msg']);
                if (response.data.code == 200) {
                    $('.sucess-comment-submission').css("display", "block");
                    $('#addCommentFail').hide();
                    $("#add_new_comment").trigger("reset");
                    console.log('data is okay');
                   }
                   else if (response.data.code == 400) {
                       console.log('error occured');
                       let error_html = ""
                        for (var prop in response['data']['error_msg']) {
                          error_html += "<p>"+response['data']['error_msg'][prop]+"</p>";
                        }
                        $('#addCommentFail').html(error_html).show();
                        $('.sucess-comment-submission').hide();
                       console.log(error_html);
                   }
                })
            .catch(function(error) {
                console.log(error);

            });
            // let baseurl = $('meta[name=baseurl]').attr("content");
            // var formData = new FormData();
            // formData.append("author_name", $("#author_name").val());
            // alert(formData);

        });
    });
    </script>
</body>

</html>

{{-- @extends("layouts.app",['title'=>$post->gen_seo_title()]) --}}
