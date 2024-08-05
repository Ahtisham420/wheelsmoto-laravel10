<table class="table table-responsive-sm table-bordered" id="ppc-table">
    <thead>
    <tr>
        <th>{{ __('admin/pages/category_items_list.img') }}</th>
        <th>{{ __('admin/pages/category_items_list.name') }}</th>
        <th>{{ __('admin/pages/category_items_list.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lists as $i)
        <tr>
            <td width="10%"><img src="{{$i->group_pic}}" alt="" style="height:150px"></td>
            <td>{{$i->group_name}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{route('category-items-show', base64_url_encode(base64_url_encode($i['id'])))}}"><i
                        class="fa fa-pencil fa-1x-size"></i></a>
                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"
                   data-route="category-items-index" data-model="FoodItemGroups" data-id="{{$i['id']}}">
                    <i class="fa fa-trash fa-1x-size"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
{{ $lists->links() }}
