<div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="blog_title">{{ __('admin/pages/blog_post_list.blog_post_title') }}</label>
        <input type="text" class="form-control" required id="blog_title" aria-describedby="blog_title_help" name='address'
            value="{{old("address",$post->address)}}">
        <small id="blog_title_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_title_description') }}</small>
    </div>
        <div class="form-group">
        <label for="blog_title">Author Name</label>
        <input type="text" class="form-control" required id="blog_title" aria-describedby="blog_title_help" name='phone'
            value="{{old("phone",$post->phone)}}">
        <small id="blog_title_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_author_description') }}</small>
    </div>



    <div class="form-group">
        <label for="blog_subtitle">{{ __('admin/pages/blog_post_list.subtitle') }}</label>
        <input type="text" class="form-control" id="blog_subtitle" aria-describedby="blog_subtitle_help" name='email'
            value='{{old("email",$post->email)}}'>
        <small id="blog_subtitle_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_subtitle_description') }}</small>
    </div>
</div>
