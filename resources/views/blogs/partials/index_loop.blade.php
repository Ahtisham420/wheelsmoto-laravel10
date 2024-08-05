{{--Used on the index page (so shows a small summary--}}
{{--See the guide on webdevetc.com for how to copy these files to your /resources/views/ directory--}}
{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}



<div class="col-sm-3 blog-box">
    <a href="{{$post->url()}}">
        <div class="d-img">
            <?= $post->image_tag(false, 'img-fluid') ?>
        </div>
    </a>
    <div class="fashion-posts-txt border-bot">
        <p class="project-email">{{$post->title}}</p>
        <p class="fashion-description">{!! $post->generate_introduction(400) !!}</p>
        <div class="text-right readmore">
            <a href="{{$post->url()}}" title="המשך ה">Read More</a>
        </div>
    </div>
</div>
