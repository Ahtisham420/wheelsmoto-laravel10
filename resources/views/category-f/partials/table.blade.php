<table class="table table-responsive-sm table-bordered" id="ppc-table">
    <thead>
    <tr>
        <th>{{ __('admin/pages/food_category.id') }}</th>
        <th>{{ __('admin/pages/food_category.img') }}</th>
        <th>{{ __('admin/pages/food_category.name') }}</th>
        <th>{{ __('admin/pages/food_category.created_at') }}</th>
        <th>{{ __('admin/pages/food_category.updated_at') }}</th>
        <th>{{ __('admin/pages/food_category.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>

            <td>{{ $post->cid }}</td>
            <td style="width: 30%;width: 30%"><img src="{{ $post->category_image }}" width="30%" height="30%"></td>
            <td>{{ $post->category_name }}</td>
            <td>{{date('d-m-Y', strtotime($post->created_at))}} </td>
            <td>{{date('d-m-Y', strtotime($post->updated_at))}} </td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{route('food-cat.edit', $post->cid)}}"><i
                        class="fa fa-pencil fa-1x-size"></i></a>
                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn-food-cate"
                   data-route="food-cat.index" data-model="FoodCategory" data-id="{{$post['cid']}}">
                    <i class="fa fa-trash fa-1x-size"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
{{ $posts->links() }}
