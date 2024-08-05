<?php

namespace App\Http\Controllers;

use App\Category;
use App\Classification;
use App\Exports\CategoriesExport;
use App\Exports\FoodItemGroupsExport;
use App\SubClassification;
use Illuminate\Support\Facades\Auth;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\FoodItemGroups;
use App\FoodItems;
use App\FoodCategory;
use App\FoodUserCategories;

class CategoryController extends Controller
{
    public function all(Request $request)
    {
        $categories = false;
        if(isset($request->classification_id)){
            $categories = Category::orderBy('id', 'desc')->where('classification_id','=',$request->classification_id)->with('classification')->get();
            $subclassifications = SubClassification::where('classification_id','=',$request->classification_id)->get();
            $html['sub_classification'] = View::make('category.partials.sub-classification-select')->with("sub_classifications",$subclassifications)->render();
            $html['categories'] = View::make('category.partials.category-select')->with("categories",$categories)->render();
            return response()->json(['html' => $html]);
        }elseif(isset($request->sub_classification_id)){
            $categories = Category::orderBy('id', 'desc')->where('sub_classification_id','=',$request->sub_classification_id)->with('classification')->get();
            $html['categories'] = View::make('category.partials.category-select')->with("categories",$categories)->render();
            return response()->json(['html' => $html]);
        }
        else {
            if($request->has('key')){
                return self::filterdData($request);
            }
            $categories = Category::orderBy('id', 'desc')->with('classification')->paginate(15);
        }
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('category_id')
        ->with('child_category')
        ->get();
        $classifications = Classification::all();
        $sub_classifications = SubClassification::all();
//        dd($subClassifications);
        return view('category.create' , compact('categories', 'classifications','sub_classifications'));
    }

    public function save(Request $request)
    {
        $data = array();
        $request->validate([
            'name' => 'required',
            'classification_id' => 'required'
        ]);
        if ($request->hasFile('icon_img')) {
            $path = $request->file("icon_img")->store("categories");
            $data['icon_img'] = $path;
        }
        if ($request->hasFile('interest_img')) {
            $path = $request->file("interest_img")->store("categories");
            $data['interest_img'] = $path;
        }
        if ($request->hasFile('feature_img')) {
            $path = $request->file("feature_img")->store("categories");
            $data['feature_img'] = $path;
        }
        if($request->name){
            $data['name'] = $request->name;
        }
        if($request->category_id && $request->category_id != "false"){
            $data['category_id'] = $request->category_id;
        }
        if($request->classification_id){
            $data['classification_id'] = $request->classification_id;
        }
        if($request->sub_classification_id && $request->sub_classification_id != "false"){
            $data['sub_classification_id'] = $request->sub_classification_id;
        }
        if($request->nature_type && $request->nature_type != "false"){
            $data['nature_type'] = $request->nature_type;
        }
        $data['custom_attribute'] = null;
        if(!empty($request->attr_count)){
            $data['attribute_classification_detail_type'] =2;
            $attr=array();
            foreach($request->attr_count as $at){

                $attr[]=["name"=>$request["attr_name_".$at],"title"=>$request["attr_title_".$at],"attr_req"=>$request["attr_req_".$at]];
            }
            $data['custom_attribute'] = json_encode($attr);
        }
        $data['ammunties'] = null;
        if(!empty($request->anum_count)){
            $data['attribute_classification_detail_type'] = 1;
            $attr=array();
            foreach($request->anum_count as $at){

                $attr[]=["name"=>$request["anum_name_".$at],"title"=>$request["anum_title_".$at],"attr_req"=>$request["anum_req_".$at]];
            }

            $data['ammunties'] = json_encode($attr);
        }
        if (!empty($request->id) && $request->id > 0) {
            $response = Category::where('id', $request->id)->update($data);
        } else {
            $response = Category::create($data);
        }
        if ($response) {
            return redirect()->route('all-categories')->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('all-categories')->with('failure', 'Operation Failed!');
        }
    }

    public function show(Request $request)
    {
        $category = Category::find($request->id);
        $categories = Category::whereNull('category_id')
        ->with('child_category')
        ->get();
        $classifications = Classification::all();
        $sub_classifications = SubClassification::all();
        return view('category.edit', compact('category', 'categories', 'classifications', 'sub_classifications'));
    }

    public function updateStatus(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'status' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if (Category::where('id', $request->id)->update(['status' => $request->status])) {
                    $response = [
                        'code' => 200,
                        'data' => ["status" => $request->status, "id" => $request->id],
                        'error_msg' => trans('alert.record_updated')
                    ];
                } else {
                    $response = [
                        'code' => 500,
                        'data' => [],
                        'error_msg' => trans('alert.record_unable_to_save')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_request_method')
            ];
        }
        return response()->json($response);
    }

    public function updateTop(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'top_list' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if (Category::where([['id', '=', $request->id]])->update(['top_list' => $request->top_list])) {
                    $response = [
                        'code' => 200,
                        'data' => ["top_list" => $request->top_list, "id" => $request->id],
                        'error_msg' => trans('alert.record_updated')
                    ];
                } else {
                    $response = [
                        'code' => 500,
                        'data' => [],
                        'error_msg' => trans('alert.record_unable_to_save')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_request_method')
            ];
        }
        return response()->json($response);
    }

    public static function filterdData($request){
        $filters = [];
        $results = false;
        //dd($filters);
        if(!empty($request->filter_search)) {
            $filters[] =
                ['name', 'LIKE', "%".$request->filter_search."%"];
        }
        if(!empty($request->filter_classification) && $request->filter_classification != "false"){
            $filters[] = [
                "classification_id" , '=', $request->filter_classification
            ];
         //   dd($filters);
        }
        if(!empty($request->filter_sub_classification && $request->filter_sub_classification != "false")) {
            $filters[] = [
                "sub_classification_id" , '=', $request->filter_sub_classification
            ];
        }
        if($request->filter_status != "false" && $request->filter_status != null){
            $filters[] = [
                "status", '=',$request->filter_status
            ];
            //dd($filters);
        }
        if(!empty($request->filter_top_list && $request->filter_top_list != "false")) {
            $filters[] = [
                "top_list" , '=', $request->filter_top_list
            ];
        }
        if(!empty($request->filter_from_date)) {
            $filters[] = ['created_at', '>=', $request->filter_from_date];
        }
        if(!empty($request->filter_to_date)) {
            $filters[] = ['created_at', '<=', $request->filter_to_date];
        }

        $categories = Category::where($filters)->orderBy('id', 'desc')->with('classification')->with('sub_classification')->paginate(10);

        if($request->has('filter_reset')){
            $categories = Category::orderBy('id', 'desc')->with('classification')->paginate(10);
        }
//        dd($categories);
        if(!$request->has('filter_csv_export')) {
            $html = View::make('category.partials.table')->with("categories", $categories)->render();
            $results = response()->json($html);
        }else{
            return (new CategoriesExport($filters))->download('categories.xlsx');
        }

        return $results;
//dd($filters);
    }

    public function delete($id)
    {
        if (Category::find($id)->delete())
            return redirect()->route('all-categories')->with('success', 'Data Deleted');
        else
            return redirect()->route('all-categories')->with('failure', 'Data Delete Failed');
    }
    public function side_items(Request $request){
        if($request->has('key')){
            return self::filterdDataFOODItemGroup($request);
        }
        $query= FoodCategory::where('user_id',$request->user()->id)->orderBy('id', 'desc')->paginate(FoodItems::pagination);
        $categories=$query;
        //"Select * from tbl_category where cid in(select cat_id from user_categories where user_id=".$request->user()->id.")";



        $qry = FoodItemGroups::with('fooditems')->where('user_id',$request->user()->id)->orderBy('id', 'desc')->where('item_type','=',1)->paginate(FoodItemGroups::pagination);
            //"SELECT * FROM food_item_groups WHERE user_id = '".$request->user()->id."' ";
        if(isset($request->search_text)){
            $qry = FoodItemGroups::with('fooditems')->where('user_id',$request->user()->id)->orderBy('id', 'desc')->where('group_name',LIKE,'%'.$request->search_text,'%')->paginate(FoodItemGroups::pagination);
                //"SELECT * FROM food_item_groups WHERE user_id = '".$request->user()->id."' And group_name LIKE '%" . $request->search_text . "%'";
        }
        $items_list =$qry;
        return view('profile-items.index', ["categories" => $categories, "items_list" => $items_list]);
    //    return view("side-items.index", ["categories" => $categories, "items_list" => $items_list]);

    }
    public function profile_items_form(Request $request){
        $user = $request->user();
        $qry = FoodItemGroups::with('fooditems')->where('user_id',$request->user()->id)->paginate(FoodItemGroups::pagination);
        return view('profile-items.create', [ "items_list" => $qry,"user"=>$user]);
    }
    public function portal_category_index(Request $request){

        $qr = FoodUserCategories::with('category')->where('user_id',$request->user()->id)->paginate(FoodUserCategories::pagination);
        return view('food-category.index',[ "categories" => $qr,]);
    }
    public function  portal_category_check(Request $request){
         $cate = FoodUserCategories::where("user_id",$request->user()->id)->pluck('cat_id');
         if ($cate){
             $categories = FoodCategory::whereNotIn("cid",$cate)->get();
         }else{
             $categories = FoodCategory::all();
         }
         return response()->json(['status'=>1,'msg'=>$categories]);
    }
    public  function  portal_category_create(Request $request){
        $cat  = new FoodUserCategories();
        $cat->cat_id =  $request->cat_id;
        $cat->user_id =  $request->user()->id;
        if ($cat->save()){
            return  redirect()->route('portal-category-index')->with('success', 'Operation Successfull!');
        }
       return redirect()->route('portal-category-index')->with('failure', 'Operation Failed!');

    }
    public function category_items_index(Request $request){

        $qr = FoodItemGroups::where('user_id',$request->user()->id)->where('item_type','=',0)->paginate(FoodItemGroups::pagination);
        return view('category-item.index',[ "lists" => $qr,]);
    }
    public function category_items_create(Request $request){
        $qr = FoodItemGroups::where('user_id',$request->user()->id)->where('item_type','=',0)->paginate(FoodItemGroups::pagination);
        $qry = FoodItemGroups::with('fooditems')->where('user_id',$request->user()->id)->orderBy('id', 'desc')->where('item_type','=',1)->get();
        $user  = $request->user();
        $cates = FoodUserCategories::with('category')->where('user_id',$request->user()->id)->paginate(FoodUserCategories::pagination);
        return view('category-item.create',[ "user" => $user ,'items_list2'=>$qry,'cates'=>$cates]);
    }
    public function category_items_show($id,Request $request){
        $id = base64_url_decode(base64_url_decode($id));
        $qry =FoodItemGroups::with('fooditems')->find($id);
        $cates = FoodUserCategories::with('category')->where('user_id',$request->user()->id)->paginate(FoodUserCategories::pagination);
        $items_list2 = FoodItemGroups::with('fooditems')->where('user_id',$request->user()->id)->orderBy('id', 'desc')->where('item_type','=',1)->get();
        $user  = $request->user();
        return view('category-item.edit',[ "user" => $user ,'items_list2'=>$items_list2,'category_items'=>$qry,'cates'=>$cates]);
    }
    public function category_items_update($id,Request $request){
        $id = base64_url_decode(base64_url_decode($id));
        $qry =FoodItemGroups::find($id);
        $items_list2 = FoodItemGroups::with('fooditems')->where('user_id',$request->user()->id)->orderBy('id', 'desc')->where('item_type','=',1)->get();
      $user  = $request->user();
        return view('category-item.edit',[ "user" => $user ,'items_list2'=>$items_list2,'category_items'=>$qry]);
    }
    public function category_items_updated(Request $request){
        $post_array = array();
        $post_array["id"] = $request->id;
        $post_array["group_title"] = $request->group_title;
        $post_array["group_name"] = $request->group_title;
        $post_array["cat_id"] = (isset($request->cat_id) && $request->cat_id > 0) ? $request->cat_id : 0;
        $post_array['user_id'] = $request->User()->id;
        $post_array['group_pic'] = $request->group_pic;
        if (isset($request->item_type)){
            $post_array['item_type'] = $request->item_type;
        }else{
            $post_array['item_type'] = 0;
        }
        $grp_items =FoodItemGroups::find($request->id);
        if ($grp_items){
            $grp_items->user_id = $request->User()->id;
            $grp_items->cat_id = $request->cat_id;
            $grp_items->group_name = $request->group_title;
            $grp_items->cat_id = (isset($request->cat_id) && $request->cat_id > 0) ? $request->cat_id : 0;
            $grp_items->group_pic = $request->group_pic;
        }
        if ($grp_items->save()){
            $grp_id = $grp_items->id;
            $post_array = array();
            $route = redirect()->route('category-items-index')->with('success', 'Operation Successfull!');
        }else{
            $route = redirect()->route('category-items-index')->with('failure', 'Operation Failed!');
        }
        foreach ($request->title as $key => $t){
            $add_on = array();
            //$profile_addon = array();
            $main_add_on = array();
            $ch_c = $request->ch_count[$key];
            $group_name = 'group_name'.$ch_c;
            $main_text = 'add_profile'.$ch_c;
            $main_id = 'add_profile_id'.$ch_c;
            $user_select = 'selection_user'.$ch_c;
            $item_id = 'items_id';
            $grp_items = new FoodItemGroups($post_array);
            // $add_on[] = array('profile_id' => $main_id[$key], 'profile_name' => $request->$main_text[$key], 'group_id' => $request->id);
            if (isset($request->$main_id)){
                foreach ($request->$main_id as $ke => $val){
                    $title =$val.'_add_title'.$ch_c;
                    $price = $val.'_add_price'.$ch_c;
                    $image = $val.'_add_img'.$ch_c;
                    $id_it = $val.'_add_id'.$ch_c;
                    if (isset($request->$id_it)) {
                        foreach ($request->$title as $k => $c) {
                            $arr = explode('_', $title);
                            if ($arr[0] === $val){
                                $add_on[] = array('id'=>$request->$id_it[$k],"title" => $c, "price" => $request->$price[$k],"image"=>$request->$image[$k]);
                            }


                        }
                    }
                    $profile_add_on = array('profile_id' => $request->$main_id[$ke], 'profile_name' => $request->$main_text[$ke], 'select_count'=>$request->$user_select[$ke],"items"=>$add_on);
                    $add_on = array();
                    $main_add_on[] = $profile_add_on;
                }

            }


           // $items[] = array("title" => $t,"item_desc" => $request->item_desc[$key], "price" => $request->price[$key], "quantity" => $request->quantity[$key], "item_pic" => $request->item_pic[$key], "add_ons" => json_encode($main_add_on));
         if (isset($request->items_id[$key])){
             $food_items= FoodItems::where('group_id',$request->id)->where('id',$request->items_id[$key])->first();

         }else{
             $food_items = null;
         }
        if ($food_items){

         }else{
             $food_items = new FoodItems();
         }

            $food_items->group_id =$grp_id;
            $food_items->title = $t;
            $food_items->item_desc = $request->item_desc[$key];
            $food_items->price = $request->price[$key];
            $food_items->quantity = $request->quantity[$key];
            $food_items->item_pic = $request->item_pic[$key];
            $food_items->add_ons = json_encode($main_add_on);
            if ($food_items->save()){
                $items = array();
                $route = redirect()->route('category-items-index')->with('success', 'Operation Successfull!');
            }else{
                $route = redirect()->route('category-items-index')->with('failure', 'Operation Failed!');
            }
        }
        return $route;
    }
    public function category_items_store(Request $request){
        $post_array = array();
        $post_array["id"] = $request->id;
        $post_array["group_title"] = $request->group_title;
        $post_array["group_name"] = $request->group_title;
        $post_array["cat_id"] = (isset($request->cat_id) && $request->cat_id > 0) ? $request->cat_id : 0;
        $post_array['user_id'] = Auth::user()->id;
        $post_array['group_pic'] = $request->group_pic;
        if (isset($request->item_type)){
            $post_array['item_type'] = $request->item_type;
        }else{
            $post_array['item_type'] = 0;
        }
        $grp_items = new FoodItemGroups($post_array);
        if ($grp_items->save()){
            $grp_id = $grp_items->id;
            $post_array = array();
            $route = redirect()->route('category-items-index')->with('success', 'Operation Successfull!');
        }else{
            $route = redirect()->route('category-items-index')->with('failure', 'Operation Failed!');
        }
        foreach ($request->title as $key => $t) {
            $add_on = array();
            //  $profile_addon = array();
            $main_add_on = array();
            $ch_c = $request->ch_count[$key];
            $group_name = 'group_name'.$ch_c;
            $main_text = 'add_profile'.$ch_c;
            $main_id = 'add_profile_id'.$ch_c;
            $user_select = 'selection_user'.$ch_c;


            // $add_on[] = array('profile_id' => $main_id[$key], 'profile_name' => $request->$main_text[$key], 'group_id' => $request->id);
            if (isset($request->$main_id)){
                foreach ($request->$main_id as $ke => $val){
                    $title =$val.'_add_title'.$ch_c;
                    $price = $val.'_add_price'.$ch_c;
                    $image = $val.'_add_img'.$ch_c;
                    $id_it = $val.'_add_id'.$ch_c;
                    if (isset($request->$id_it)) {
                        foreach ($request->$id_it as $k => $c) {
                            $arr = explode('_', $title);
                            if ($arr[0] === $val){
                                $add_on[] = array('id'=>$c,"title" => $request->$title[$k], "price" => $request->$price[$k],"image"=>$request->$image[$k]);
                            }


                        }
                    }
                    $profile_add_on = array('profile_id' => $request->$main_id[$ke], 'profile_name' => $request->$main_text[$ke], 'group_id' => $grp_items->id,'select_count'=>$request->$user_select[$ke],"items"=>$add_on);
                    $add_on = array();
                    $main_add_on[] = $profile_add_on;
                }

            }


             $items[] = array("title" => $t,'group_id'=>$grp_items->id,"item_desc" => $request->item_desc[$key], "price" => $request->price[$key], "quantity" => $request->quantity[$key], "item_pic" => $request->item_pic[$key], "add_ons" => json_encode($main_add_on));
             $food_items = new FoodItems($items);
             $food_items->group_id = $grp_id;
             $food_items->title = $t;
             $food_items->item_desc = $request->item_desc[$key];
             $food_items->price = $request->price[$key];
             $food_items->quantity = $request->quantity[$key];
             $food_items->item_pic = $request->item_pic[$key];
             $food_items->add_ons = json_encode($main_add_on);
         if ($food_items->save()){
             $items = array();
             $route = redirect()->route('category-items-index')->with('success', 'Operation Successfull!');
         }else{
             $route = redirect()->route('category-items-index')->with('failure', 'Operation Failed!');
         }
        }
        return $route;
    }
    public function profile_items_store(Request $request){
        $profile =new FoodItemGroups();
        $profile->user_id = Auth::user()->id;
        if ($request->group_title){
            $profile->group_name = $request->group_title;
        }
        $profile->item_type = 1;
        if ($request->group_pic){
            $profile->group_pic = $request->group_pic;
        }
        $profile->save();
        if (!empty($request->title) && count($request->title)>0){
            foreach ($request->title as $key=>$val){
                FoodItems::create([
                    'title' => $request->title[$key],
                    'item_pic' => $request->item_pic[$key],
                    'user_id' => $request->user()->id,
                    'group_id' => $profile->id,
                    'item_desc' => $request->item_desc[$key],
                    'price' => $request->price[$key],
                ]);
            }
            return redirect()->route('side_items')->with('success', 'Operation Successfull!');
        }

        return redirect()->route('side_items')->with('failure', 'Operation Failed!');
//          if ($request->title && count($request->title)>0){
//              foreach ($request->title as $key=>$i){
//                  FoodItemGroups::create([
//                      'group_name' => $request->title[$key],
//                      'group_pic' => $request->item_pic[$key],
//                      'user_id' => $request->user()->id,
//                      'cat_id' => 0,
//                      'item_type' => 1,
//                  ]);
//              }
//          return redirect()->route('side_items')->with('success', 'Operation Successfull!');
          //}
//        return redirect()->route('side_items')->with('failure', 'Operation Failed!');
       // $qr = FoodItemGroups::where('user_id',$request->user()->id)->where('item_type','=',0)->paginate(FoodItemGroups::pagination);
      //  return view('category-item.index',[ "lists" => $qr,]);
    }
    public function profile_items_show($id,Request $request){
        $id  = base64_url_decode(base64_url_decode($id));
        $qry =FoodItemGroups::find($id);
        $qry1 =FoodItems::where('group_id',$id)->get();
        $user  = $request->user();
        return view('profile-items.edit', ["profile_items" => $qry, "detail" => $qry1,'user'=>$user]);
            //"SELECT * FROM items WHERE group_id = '".$result['id']."'";

    }
    public function profile_items_update($id,Request $request){
        $id  = base64_url_decode(base64_url_decode($id));
        $qry =FoodItemGroups::find($id);
        FoodItems::where('group_id',$id)->delete();
        $profile =FoodItemGroups::find($id);
        $profile->user_id  =   $request->User()->id;
        if ($request->group_title){
            $profile->group_name = $request->group_title;
        }
        if ($request->group_pic){
            $profile->group_pic = $request->group_pic;
        }
        $profile->save();
if (!empty($request->title) && count($request->title)>0){
    foreach ($request->title as $key=>$val){
        FoodItems::create([
            'title' => $request->title[$key],
            'item_pic' => $request->item_pic[$key],
            'user_id' => $request->user()->id,
            'group_id' => $id,
            'item_desc' => $request->item_desc[$key],
            'price' => $request->price[$key],
        ]);
    }
    return redirect()->route('side_items')->with('success', 'Operation Successfull!');
}

        return redirect()->route('side_items')->with('failure', 'Operation Failed!');
    }
    public static function filterdDataFOODItemGroup($request){
        $filters = [];
        $results = false;
        //dd($filters);
        if(!empty($request->filter_classification) && $request->filter_classification != "false"){
            $filters[] = [
                "classification_id" , '=', $request->filter_classification
            ];
            //   dd($filters);
        }
        if(!empty($request->filter_sub_classification && $request->filter_sub_classification != "false")) {
            $filters[] = [
                "sub_classification_id" , '=', $request->filter_sub_classification
            ];
        }
        if($request->filter_status != "false" && $request->filter_status != null){
            $filters[] = [
                "status", '=',$request->filter_status
            ];
            //dd($filters);
        }
        if(!empty($request->filter_top_list && $request->filter_top_list != "false")) {
            $filters[] = [
                "top_list" , '=', $request->filter_top_list
            ];
        }
        if(!empty($request->filter_from_date)) {
            $filters[] = ['created_at', '>=', $request->filter_from_date];
        }
        if(!empty($request->filter_to_date)) {
            $filters[] = ['created_at', '<=', $request->filter_to_date];
        }
        if(!empty($request->filter_search)) {
            $columns = array('group_name');
            $categories = FoodItemGroups::search($request->filter_search,$columns);
//            dd($request->filter_search);
        }
        $categories = FoodItemGroups::where($filters)->where('user_id',$request->user()->id)->orderBy('id', 'desc')->where('item_type','=',1)->paginate(FoodItemGroups::pagination);

        if($request->has('filter_reset')){
            $categories = FoodItemGroups::orderBy('id', 'desc')->where('user_id',$request->user()->id)->where('item_type','=',1)->paginate(FoodItemGroups::pagination);
        }
//        dd($categories);
        if(!$request->has('filter_csv_export')) {
            $html = View::make('profile-items.partials.table')->with("items_list", $categories)->render();
            $results = response()->json($html);
        }else{
            return (new FoodItemGroupsExport($filters))->download('categories.xlsx');
        }

        return $results;
//dd($filters);
    }


}
