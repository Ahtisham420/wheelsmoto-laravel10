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
        <label for="blog_post_body">Terms and Condition
            @if(config("blogetc.echo_html"))
            (HTML)
            @else
            (Html will be escaped)
            @endif
        </label>
        <textarea style='min-height:600px;' class="form-control" id="blog_post_body"
            aria-describedby="blog_post_body_help" name='body'>{{old("body",$post->body)}}</textarea>
        <div class='alert alert-danger'>
            {{ __('admin/pages/blog_post_list.post_body_description') }}
        </div>
    </div>

</div>
@push('scripts')

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"
    integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous">
</script>
<script src="{{ asset('public/js/jquery.tagsinput-revisited.min.js') }}"></script>
<script>
    CKEDITOR.replace('body');
        if( typeof(CKEDITOR) !== "undefined" ) {
                CKEDITOR.replace('body');
            }
</script>
<link rel="stylesheet" href="{{ asset('public/css/jquery.tagsinput-revisited.min.css') }}">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- @foreach ($tags as $tag)
   []
@endforeach --}}


@endpush
