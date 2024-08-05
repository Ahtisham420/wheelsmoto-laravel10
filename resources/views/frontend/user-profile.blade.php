@include('frontend.partials.header')



<nav aria-label="breadcrumb" style="background-color: white !important;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item nav-btn">Home</li>
    <li class="breadcrumb-item nav-btn">Vehicles</li>
     <li class="breadcrumb-item nav-btn">Cars</li>
     <li class="breadcrumb-item nav-btn">Cars in Sindh</li>
    <li class="breadcrumb-item nav-btn">Cars in Karachi</li>
    <li class="breadcrumb-item nav-btn">Cars in Gulistan-e-Jauhar Block 4</li>
    <li class="breadcrumb-item nav-btn">Toyota Cars in Gulistan-e-Jauhar Block 4</li>
    <li class="breadcrumb-item active nav-btn" aria-current="page">Toyota Corrolla Altis in Gulistan-e-Jauhar Block 4</li>
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12">
            <div class="justify-content-center text-center">
                <img src="resources\images\avatars\avatar.png" style="height: 10vw;width: 10vw;">
                <p style="color: #707070;">member since jun 2021</p>
                <a style="color: blue;">Share profile link</a>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12">
            <div>
                <h3>Muhammad Afzal</h3>
                <p class="mt-2" style="color: #707070;">every on</p>
                <div><hr class="shadow"></div>
                <div><b>Published ads</b></div>
                <div class="row mt-3">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12" style="border: 1px solid #707070;border-radius: 5px;">
                    <center>
                            <img src="resources\images\Ads\bike.jpg" class="img-fluid">
                       </center>
                       <div><b>Rs 75,000</b>
<p style="color:#707070">total janvan</p>
                       </div>
                        <div class="d-flex"><p style="color:#707070">Lahore Pakistan</p>
                            <p class="ml-5" style="color:#707070">3 days ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.partials.footer')