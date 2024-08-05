<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <title>Rent Landing</title>
</head>

<body>
    <header>
        <div class="container-fluid header-section">
            <div class="row">
                <div class="col-sm-2 site-logo">
                    <img src="{{ asset('public/images/blog/logo.png')}}" alt="Logo" class="img-fluid" />
                </div>
                <div class="col-sm-7 search-section">
                    <div>
                        <ul class="list-inline mb-0 nav-menu">
                            <li class="list-inline-item"><a href="index.php" title="Home">Home</a></li>
                            <li class="list-inline-item"><a href="#" title="About">About</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 social-upload-section">
                    <div>
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
                        <div class="user-info">
                            <select class="form-control">
                                <option>Jhon Doe</option>
                                <option>Under Taker</option>
                                <option>David</option>
                                <option>Trump</option>
                            </select>
                        </div>
                        <div class="upload-btn">
                            <a href="#" class="theme-btn" title="Upload">Upload</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>




    <div class='text-center' style="margin-top:30px; margin-bottom:30px">
        <h3>Thanks! Your comment has been saved!</h3>

        @if(!config("blogetc.comments.auto_approve_comments",false) )
        <p>After an admin user approves the comment, it'll appear on the site!</p>
        @endif

        <a href='{{$blog_post->url()}}' class='btn btn-primary'>Back to blog post</a>
    </div>


    <footer>
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
                                    src="{{ asset('public/images/blog/facebook.png')}}" alt="Logo"
                                    class="img-fluid"></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"><img
                                    src="{{ asset('public/images/blog/instagram.png')}}" alt="Logo"
                                    class="img-fluid"></a></li>
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
</body>

</html>

{{-- @extends("layouts.app",['title'=>$post->gen_seo_title()]) --}}


{{-- @extends("layouts.app",['title'=>"Saved comment"])
@section("content")



@endsection --}}
