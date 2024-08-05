
<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ config('app.ui_asset_url').'images/favicon.png' }}" type="image/gif" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/index.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/slick.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/slick-theme.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/login.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/misecellinousCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/audisellingPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/blog.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/changePassword.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/audisellingAuctionPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/garageServices.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/americanMusclesCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/auctionCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/searchLeaseCarpage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/rentalCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/swapcarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/dashboard.css' }}">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

</head>
<body>

<div class="emal-body">



    <div class="container">

        <div class="row">
            <div class="col-12 page-heading-privacy-policy">
                <img  src="{{ config('app.ui_asset_url').'frontend/img//thanku.png' }}" alt="">
            </div>
            <div class="col-12 email-body-internal">
                <h6>Hello {{$u_email->username}},</h6>
                <p><span>Congratulations! </span> for registring with<img  src="{{ config('app.ui_asset_url').'frontend/img/logo/logo.png' }}" alt="">.We are looking forward to seeing you there
                    and sharing our inbound markiting content with you.</p>
                <p>Best Regards:</p>
                <img src="{{ config('app.ui_asset_url').'frontend/img/logo/logo.png' }}" alt="">


            </div>
            <div class="col-12 nextbtn" style="display:flex;justify-content:center;align-items:center;padding-top:20px; padding-bottom:20px;">
            </div>

        </div>
    </div>
</div>
</body>
</html>
