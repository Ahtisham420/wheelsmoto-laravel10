<table class="table table-responsive-sm table-bordered">
    <thead>
    <tr>
        <th>{{ __('admin/pages/categories_list.id') }}</th>
        <th>{{ __('admin/pages/categories_list.name') }}</th>
        <th>{{ __('admin/pages/categories_list.classification') }}</th>
        <th>{{ __('admin/pages/categories_list.sub_classification') }}</th>
        <th>{{ __('admin/pages/categories_list.created_at') }}</th>
        <th>{{ __('admin/pages/categories_list.status') }}</th>
        <th>{{ __('admin/pages/categories_list.is_top') }}</th>
        <th>{{ __('admin/pages/categories_list.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                {{$category->classification->title}}
            </td>
            <td>
                {{isset($category->sub_classification->name) ? $category->sub_classification->name : "-"}}
            </td>
            <td>{{ Carbon\Carbon::createFromTimeString($category->created_at)->format("D d M, Y - g:i A") }}</td>
            <td>
                @if($category->status == 0)
                    <span id="currentStatus-{{ $category->id }}">{{ __('admin/pages/categories_list.disabled') }}</span>
                    <label class="switch">
                        <input class="category_status" id="{{ $category->id }}" type="checkbox"/>
                        <span class="slider round"></span>
                    </label>
                @elseif($category->status == 1)
                    <span id="currentStatus-{{ $category->id }}">{{ __('admin/pages/categories_list.enabled') }}</span>
                    <label class="switch">
                        <input class="category_status" id="{{ $category->id }}" type="checkbox"
                               checked/>
                        <span class="slider round"></span>
                    </label>
                @endif
            </td>
            <td>
                @if($category->top_list == 0)
                    <label class="switch">
                        <input class="category_top_list" id="{{ $category->id }}" type="checkbox"/>
                        <span class="slider round"></span>
                    </label>
                @elseif($category->top_list == 1)
                    <label class="switch">
                        <input class="category_top_list" id="{{ $category->id }}" type="checkbox"
                               checked/>
                        <span class="slider round"></span>
                    </label>
                @endif
            </td>
            <td>
                <a class="btn btn-sm btn-primary"
                   href="{{action('CategoryController@show', $category['id'])}}"><i
                            class="fa fa-pencil fa-1x-size"></i></a>
                <a href="javascript:void(0)"
                   class="btn btn-block btn-danger col action-btn js-del-btn"
                   data-route="all-categories" data-model="Category" data-id="{{$category['id']}}">
                    <i class="fa fa-trash fa-1x-size"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
{{ $categories->appends($_GET)->links() }}
