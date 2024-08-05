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
        <input type="text" class="form-control" required id="blog_title" aria-describedby="blog_title_help" name='title'
            value="{{old("title",$post->title)}}">
        <small id="blog_title_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_title_description') }}</small>
    </div>
        <div class="form-group">
        <label for="blog_title">Author Name</label>
        <input type="text" class="form-control" required id="blog_title" aria-describedby="blog_title_help" name='author_name'
            value="{{old("author_name",$post->author_name)}}">
        <small id="blog_title_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_author_description') }}</small>
    </div>

        <div class="bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border">
            <div style='max-width:55px;' class='float-right m-2'>
             <img  id="blah" @if(isset($post->author_pic))src="/../../public/author_pics/{{$post->author_pic}}"@endif  style="height:25.313px;width:55px;">
                </div>
            <h4>Author Pic</h4>
            <div class="form-group mb-4 p-2">
                <label for="blog_feature_img">Image - (required)</label>
                <small id="blog__help" class="form-text text-muted">Upload image -
                    {{-- <code>&times;px</code> - it will --}}
                    it will show on blog and single post
                </small>
                <input class="form-control" type="file" name="author_pic" onchange="readURL(this);" id="blog_feature_img"
                       aria-describedby="blog_help">

            </div>
        </div>

    <div class="form-group">
        <label for="blog_subtitle">{{ __('admin/pages/blog_post_list.subtitle') }}</label>
        <input type="text" class="form-control" id="blog_subtitle" aria-describedby="blog_subtitle_help" name='subtitle'
            value='{{old("subtitle",$post->subtitle)}}'>
        <small id="blog_subtitle_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_subtitle_description') }}</small>
    </div>


    <div class='row'>


        <div class='col-sm-12 col-md-4'>


            <div class="form-group">
                <label for="blog_slug">{{ __('admin/pages/blog_post_list.blog_post_slug') }}</label>
                <input type="text" class="form-control" id="blog_slug" aria-describedby="blog_slug_help" name='slug'
                    value="{{old("slug",$post->slug)}}">
                <small id="blog_slug_help"
                    class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_slug_description') }}
                    i.e. {{route('blog-page')}}/<u><em>this_part</em></u></small>
            </div>

        </div>
        <div class='col-sm-6 col-md-4'>


            <div class="form-group">
                <label for="blog_is_published">{{ __('admin/pages/blog_post_list.published') }}</label>

                <select name='is_published' class='form-control' id='blog_is_published'
                    aria-describedby='blog_is_published_help'>

                    <option @if(old("is_published",$post->is_published) == '1') selected='selected' @endif value='1'>
                        Published
                    </option>
                    <option @if(old("is_published",$post->is_published) == '0') selected='selected' @endif value='0'>Not
                        Published
                    </option>

                </select>
                <small id="blog_is_published_help"
                    class="form-text text-muted">{{ __('admin/pages/blog_post_list.published_description') }}
                </small>
            </div>

        </div>
        <div class='col-sm-6 col-md-4'>

            <div class="form-group">
                <label for="blog_posted_at">{{ __('admin/pages/blog_post_list.post_at') }}</label>
                <input type="text" class="form-control" id="blog_posted_at" aria-describedby="blog_posted_at_help"
                    name='posted_at' value="{{old("posted_at",$post->posted_at ?? \Carbon\Carbon::now())}}">
                {{-- <small id="blog_posted_at_help" class="form-text text-muted">When this should be published. If this value is
                greater
                than now ({{\Carbon\Carbon::now()}}) then it will not (yet) appear on your blog. Should be in the
                <code>YYYY-MM-DD
                    HH:MM:SS</code> format. --}}
                <small id="blog_posted_at_help" class="form-text text-muted">
                    {{ __('admin/pages/blog_post_list.post_description') }}
                </small>
            </div>


        </div>
    </div>


    <div class="form-group">
        <label for="blog_post_body">{{ __('admin/pages/blog_post_list.post_body') }}
            @if(config("blogetc.echo_html"))
            (HTML)
            @else
            (Html will be escaped)
            @endif

        </label>
        <textarea style='min-height:600px;' class="form-control" id="blog_post_body"
            aria-describedby="blog_post_body_help" name='post_body'>{{old("post_body",$post->post_body)}}</textarea>


        <div class='alert alert-danger'>
            {{ __('admin/pages/blog_post_list.post_body_description') }}
        </div>
    </div>




    @if(config("blogetc.use_custom_view_files",true))
    <div class="form-group">
        <label for="blog_use_view_file">Custom View File</label>
        <input type="text" class="form-control" id="blog_use_view_file" aria-describedby="blog_use_view_file_help"
            name='use_view_file' value='{{old("use_view_file",$post->use_view_file)}}'>
        <small id="blog_use_view_file_help" class="form-text text-muted">Optional - if anything is entered here, then it
            will attempt to load <code>view("custom_blog_posts." . $use_view_file)</code>. You must create the file in
            /resources/views/custom_blog_posts/FILENAME.blade.php.
        </small>
    </div>
    @endif



    <div class="form-group">
        <label for="blog_seo_title">{{ __('admin/pages/blog_post_list.seo_title') }}</label>
        <input class="form-control" id="blog_seo_title" aria-describedby="blog_seo_title_help" name='seo_title'
            tyoe='text' value='{{old("seo_title",$post->seo_title)}}'>
        <small id="blog_seo_title_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.seo_title_description') }}</small>
    </div>

    <div class="form-group">
        <label for="blog_meta_desc">{{ __('admin/pages/blog_post_list.meta_desc') }}</label>
        <textarea class="form-control" id="blog_meta_desc" aria-describedby="blog_meta_desc_help"
            name='meta_desc'>{{old("meta_desc",$post->meta_desc)}}</textarea>
        <small id="blog_meta_desc_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.meta_desc_description') }}</small>
    </div>

    <div class="form-group">
        <label for="blog_short_description">{{ __('admin/pages/blog_post_list.short_desc') }}</label>
        <textarea class="form-control" id="blog_short_description" aria-describedby="blog_short_description_help"
            name='short_description'>{{old("short_description",$post->short_description)}}</textarea>
        <small id="blog_short_description_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.short_desc_description') }}</small>
    </div>
    <div class="form-group">
        <label for="post_tags">Posts Tags</label>
        <input class="form-control" type="text" name="post_tags" class="tags-input" id="tags-input"
            value="{{ $post->post_tags }}" />

    </div>


    <div class="bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border">
        <div style='max-width:55px;  ' class='float-right m-2'>
            <?= $post->image_tag(false, 'd-block mx-auto img-fluid') ?>
        </div>
        <h4>Featured Images</h4>
        <div class="form-group mb-4 p-2">
            <label for="blog_feature_img">Image - (required)</label>
            <small id="blog__help" class="form-text text-muted">Upload image -
                {{-- <code>&times;px</code> - it will --}}
                it will show on blog and single post
            </small>
            <input class="form-control" type="file" name="feature_image" id="blog_feature_img"
                aria-describedby="blog_help">

        </div>
    </div>


    <div class='bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border'>
        <h4>{{ __('admin/pages/blog_post_list.categories') }}</h4>
        <div class='row'>

            @forelse(App\Category::orderBy("name","asc")->limit(1000)->get()
            as
            $category)
            <div class="form-check col-sm-6">
                <input class="" type="checkbox" value="1" @if(old("category.".$category->id,
                $post->categories->contains($category->id))) checked='checked'
                @endif name='category[{{$category->id}}]' id="category_check{{$category->id}}">
                <label class="form-check-label" for="category_check{{$category->id}}">
                    {{$category->name}}
                </label>
            </div>
            @empty
            <div class='col-md-12'>
                No categories
            </div>
            @endforelse

            <div class='col-md-12 my-3 text-center'>

                <em><a target='_blank' href='{{route("create-category")}}'><i class="fa fa-external-link"
                            aria-hidden="true"></i>
                        Add new categories
                        here</a></em>
            </div>
        </div>
    </div>
</div>
@push('scripts')

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"
    integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous">
</script>
<script src="{{ asset('public/js/jquery.tagsinput-revisited.min.js') }}"></script>
<script>
    CKEDITOR.replace('post_body');
        if( typeof(CKEDITOR) !== "undefined" ) {
                CKEDITOR.replace('post_body');
            }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(55)
                    .height(25.313);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<link rel="stylesheet" href="{{ asset('public/css/jquery.tagsinput-revisited.min.css') }}">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    jQuery(document).ready(function($){

       jQuery('#tags-input').tagsInput({
           'autocomplete': {
                source: [
                   {!! $tags !!}
                ]
            },
           interactive:true
       });
    });
</script>
@endpush
