<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Comments
            </div>

            @include('partials.validation')

            <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                <p>Something went wrong!</p>
            </div>
            <div class="alert alert-success m-3" id="SuccessMessage" style="display:none;">
                <p>Operation Successfull!</p>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered" id="posts-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Author Name</th>
                            <th>Post Title</th>
                            <th>Comment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($comments as $comment)
                        <tr>

                            <td>{{ $comment->id }}</td>
                            <td>{{$comment->author()}}</td>
                            <td>
                                @if($comment->post)
                                <a href='{{$comment->post->url()}}'>{{$comment->post->title}}</a>
                                @else
                                Unknown blog post
                                @endif
                            </td>
                            <td>{{$comment->comment}}</td>
                            <td>
                                @if(!$comment->approved)
                                {{--APPROVE BUTTON--}}
                                <form method='post' action='{{route("comments.approve", $comment->id)}}'>
                                    @csrf
                                    @method("PATCH")
                                    <input type='submit' class='btn btn-success btn-sm' value='Approve' />
                                </form>
                                @endif

                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"
                                    data-route="comments.index" data-model="comment" data-id="{{$comment['id']}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
