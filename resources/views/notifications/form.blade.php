<style>
	#datetimepicker1{
		padding: 15.2px;
	}
</style>
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
            <label for="notification_type">Notification Type</label>
            <select name='type' class='form-control' id='notification_type' aria-describedby='notification_type_help'>
                <option @if(old("type",$post->type) == '0') selected='selected' @endif value='0'>
                    Non Reactive
                </option>
                <option @if(old("type",$post->type) == '1') selected='selected' @endif value='1'>
                    Reactive
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="notification_type">Users</label>
            <select class='form-control select2' multiple id='user_ids' aria-describedby='user_ids' name="user_ids[]">
                @foreach($users as $user)
                    <option value="{{$user->id}}" {{ isset($post->user_ids) && in_array($user->id, json_decode($post->user_ids)) ? "selected" : "" }} >
                        {{$user->username." - ". $user->email." - ".$user->phone }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="notification_title">Title</label>
            <input type="text" class="form-control"  id="notification_title" aria-describedby="notification_title_help" name='title'
                value="{{old("title",$post->title)}}">
        </div>

    <div class='row' id="notification_type_content">


        <div class='col-sm-12 col-md-4'>


            <div class="form-group">

                <label for="is_email">Email</label> <br>
                <label class="switch">

                <input class="is_email" id="is_email" name="is_email" type="checkbox" {{ old('is_email') == 1 ? 'checked' : 'checked' }} {{ isset($post->is_email) && $post->is_email == 1 ? 'checked' : ''  }} />
                    <span class="slider round"></span>
                </label>


            </div>

        </div>
        {{--<div class='col-sm-6 col-md-4'>--}}
            {{--<div class="form-group">--}}
                {{--<label for="is_push_notification">Push Notification</label> <br>--}}
                {{--<label class="switch">--}}
                    {{--<input class="is_push_notification" id="is_push_notification" name="is_push_notification" type="checkbox" {{ old('is_push_notification') == 1 ? 'checked' : '' }} {{ isset($post->is_push_notification) && $post->is_push_notification == 1 ? 'checked' : ''  }} />--}}
                        {{--<span class="slider round"></span>--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class='col-sm-6 col-md-4'>--}}
           {{--<div class="form-group">--}}
                {{--<label for="name" class="control-label">Date Time (Optional)</label>--}}
                {{--<input type="text" class="form-control"  id="datetimepicker1" name="schedule_time">--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="blog_post_body">Notification Content</label>
        <textarea style='min-height:600px;' class="form-control" id="blog_post_body"
            aria-describedby="blog_post_body_help" name='content'>{{old("content",$post->content)}}</textarea>
        <div class='alert alert-danger'>
            {{ __('admin/pages/blog_post_list.post_body_description') }}
        </div>
    </div>

</div>
@push('scripts')

<script src="{{ asset('resources/js/datetimepicker/jquery.datetimepicker.js') }}"></script>

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"
    integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous">
</script>
<script src="{{ asset('resources/js/plugins/ckeditor-variables.js') }}"></script>
<script type="text/javascript">

    CKEDITOR.replace('blog_post_body');

    $(function () {
        $.datetimepicker.setDateFormatter('moment');
        $('#datetimepicker1').datetimepicker();
        @if($post->data_time)
            $('#datetimepicker1').val("{{ \Carbon\Carbon::createFromTimestamp($post->data_time)->toDateTimeString() }}");
            $('#datetimepicker1').data("DateTimePicker").date(new Date( "{{ \Carbon\Carbon::createFromTimestamp($post->data_time)->toDateTimeString() }}"));
        @endif

        // Check Email
        $(document).on('change','.is_email' ,function() {
            if(this.checked) {
                this.value = 1
            }else{
                this.value = 0
            }

        })

        // Check Push Notification
        $(document).on('change','.is_push_notification' ,function() {
            if(this.checked) {
                this.value = 1
            }else{
                this.value = 0
            }

        })

    });
</script>

@endpush
