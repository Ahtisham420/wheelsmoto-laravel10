         <table class="table table-responsive-sm table-bordered" id="categories-table">
                    <thead>
                    <tr>
                        <th>{{ __('admin/pages/brand_list.id') }}</th>
                        <th>{{ __('admin/pages/brand_list.name') }}</th>
                        @if($key == "city")
                        <th>{{ __('admin/pages/brand_list.state') }}</th>
                        @else
                        <th>{{ __('admin/pages/brand_list.icon') }}</th>
                        @endif
                        <th>Created at</th>
                        {{--<th>{{ __('admin/pages/brand_list.is_top') }}</th>--}}
                        <th>{{ __('admin/pages/brand_list.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->_value }}</td>
                            <td>
                            @if($post->_key == "city" && !empty($post->state))
                                @php $state = App\CarState::find($post->state);
                                if($state && $state->name){
                                  echo  $state->name;
                                }
                                 @endphp
                            @else
@if(isset($post->icon))<img  id="blah" style="width: 8%;height:100%;" src="/../../public/car_icon/{{ $post->icon }}">@endif
                            @endif
                            </td> 
                            <td>
                               {{$post->created_at->format('Y-m-d H:i:s')}}  
                            </td>
                           <td>
                                <a class="btn btn-sm btn-primary" href="{{route('show-car-settings',['id'=>$post['id'],'key'=>$key])}}"><i class="fa fa-pencil fa-1x-size"></i></a>
                                <button  class="btn btn-block btn-danger col action-btn modal-carsetting-btn"  data-route ='{{route('delete-car-settings',['id'=>$post['id'],'key'=>$key])}}'>
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $posts->links() }}