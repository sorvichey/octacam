<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class FrontController extends Controller
{
   
    // index
    public function index()
    {
        $data['post'] = null;
        $data['qoutes'] = DB::table('qoutes')
            ->where('category', 'English')
            ->orderBy('id', 'desc')
            ->where('active', 1)
            ->first();
        $data['query']= "";
        $data['slides'] = DB::table('slides')
            ->where('category', 'English')
            ->where('active',1)
            ->limit(10)
            ->get();
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 2)->get();
        $data['posts'] = DB::table('posts')
            ->where('active', 1)
            ->where('sub_category_id', 7)
            ->orWhere('sub_category_id', 9)
            ->orWhere('sub_category_id', 10)
            ->orWhere('sub_category_id', 12)
            ->orderBy('pin', 1)
            ->orderBy('id', 'desc')
            ->paginate(15);
        $data['photo_news'] = DB::table('posts')
            ->where('sub_category_id', 11)
            ->where('active', 1)
            ->orderBy('pin', 1)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        return view('fronts.index', $data);
   }
    // index
    public function khmer()
    {
        $data['post'] = null;
        $data['query']= "";
        $data['qoutes'] = DB::table('qoutes')
            ->where('category', 'Khmer')
            ->orderBy('id', 'desc')
            ->where('active', 1)    
            ->first();
        $data['slides'] = DB::table('slides')
            ->where('category', 'Khmer')
            ->where('active',1)
            ->limit(10)
            ->get();
        $data['posts'] = DB::table('posts')
            ->where('active', 1)
            ->where('sub_category_id', 1)
            ->orWhere('sub_category_id', 3)
            ->orderBy('pin', 1)
            ->orderBy('id', 'desc')
            ->paginate(15);
        $data['photo_news'] = DB::table('posts')
            ->where('sub_category_id', 4)
            ->where('active', 1)
            ->orderBy('pin', 1)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 1)->get();
        return view('fronts.kh', $data);
    }
        public function french()
        {
            $data['post'] = null;
            $data['query']= "";
            $data['qoutes'] = DB::table('qoutes')
                ->where('category', 'French')
                ->orderBy('id', 'desc')
                ->where('active', 1)
                ->first();
            $data['slides'] = DB::table('slides')
                ->where('category', 'French')
                ->where('active',1)
                ->limit(10)
                ->get();
            $data['posts'] = DB::table('posts')
                ->where('active', 1)
                ->where('sub_category_id', 14)
                ->orWhere('sub_category_id', 16)
                ->orWhere('sub_category_id', 17)
                ->orderBy('pin', 1)
                ->orderBy('id', 'desc')
                ->paginate(15);
            $data['photo_news'] = DB::table('posts')
                ->where('sub_category_id', 20)
                ->where('active', 1)
                ->orderBy('pin', 1)
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get();
            $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 3)->get();
            return view('fronts.fr', $data);
        }
   public function category_kh($id)
   {
        $data['post'] = null;
        $data['query']= "";
        $data['posts'] = DB::table('posts')
            ->where('sub_category_id', $id)
            ->where('active',1)
            ->orderBy('pin', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 1)->get();
        $data['sub_category'] = DB::table('sub_categories')
            ->where('id', $id )
            ->first(); 
        return view('fronts.category_kh', $data);
   }
   public function category_fr($id)
   {
        $data['post'] = null;
        $data['query']= "";
        $data['posts'] = DB::table('posts')
            ->where('sub_category_id', $id)
            ->where('active',1)
            ->orderBy('pin', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 3)->get();
        $data['sub_category'] = DB::table('sub_categories')
            ->where('id', $id )
            ->first(); 
        return view('fronts.category_fr', $data);
   }
   public function category($id)
   {
        $data['post'] = null;
        $data['query']= "";
        $data['posts'] = DB::table('posts')
            ->where('sub_category_id', $id)
            ->where('active',1)
            ->orderBy('pin', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 2)->get();
        $data['sub_category'] = DB::table('sub_categories')
            ->where('id', $id )
            ->first(); 
        return view('fronts.category_en', $data);
   }
   
    // view detail
    public function detail_kh($id) 
    {
        $data['query']= "";
        $data['post'] = DB::table('posts')
            ->where('active', 1)
            ->where('id',$id)
            ->first();
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 1)->get();
        return view('fronts.detail_kh', $data);
    }
    // view detail
    public function detail_en($id) 
    {
        $data['query']= "";
        $data['post'] = DB::table('posts')
            ->where('active', 1)
            ->where('id',$id)
            ->first();
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 2)->get();
        return view('fronts.detail_en', $data);
    }
     // view detail
     public function detail_fr($id) 
     {
        $data['query']= "";
        $data['post'] = DB::table('posts')
            ->where('active', 1)
            ->where('id',$id)
            ->first();
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 3)->get();
        return view('fronts.detail_fr', $data);
     }

     public function search() {
        $data['post'] = null;
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 2)->get();
        if(isset($_GET['q']))
        { 
         
            $data['query'] = $_GET['q'];
 
                $data['posts'] = DB::table('posts')
                    ->where(function($fn){
                        $fn->where('posts.title', 'like', "%{$_GET['q']}%")
                        ->orWhere('posts.description', 'like', "%{$_GET['q']}%");
                    })
                    ->where('active',1)
                    ->orderBy('id', 'desc')
                    ->get();
                    return view('fronts.search', $data);
        }
     }
     public function search_kh() {
        $data['post'] = null;
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 1)->get();
        if(isset($_GET['q']))
        { 
         
            $data['query'] = $_GET['q'];
 
                $data['posts'] = DB::table('posts')
                    ->where(function($fn){
                        $fn->where('posts.title', 'like', "%{$_GET['q']}%")
                        ->orWhere('posts.description', 'like', "%{$_GET['q']}%");
                    })
                    ->where('active',1)
                    ->orderBy('id', 'desc')
                    ->get();
                    return view('fronts.search_kh', $data);
        }
      
     
     }
     public function search_fr() {
        $data['post'] = null;
        $data['sub_menus'] = DB::table('sub_categories')->where('active',1)->where('category_id', 3)->get();
        if(isset($_GET['q']))
        { 
         
            $data['query'] = $_GET['q'];
 
                $data['posts'] = DB::table('posts')
                    ->where(function($fn){
                        $fn->where('posts.title', 'like', "%{$_GET['q']}%")
                        ->orWhere('posts.description', 'like', "%{$_GET['q']}%");
                    })
                    ->where('active',1)
                    ->orderBy('id', 'desc')
                    ->get();
                    return view('fronts.search_fr', $data);
        }
      
     
     }
}
