<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // load create form
    public function create()
    {
        if(!Right::check('Category', 'i')){
            return view('permissions.no');
        }
        return view('sub_categories.create');
    }
    // save new category
    public function save(Request $r)
    {
        if(!Right::check('Category', 'i')){
            return view('permissions.no');
        }
        $data = array(
            'name' => $r->name,
            'order' => $r->order,
            'category_id' => $r->category_id
        );
        $sms = "The new sub category has been created successfully.";
        $sms1 = "Fail to create the new sub category, please check again!";
        $i = DB::table('sub_categories')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/sub_category/create?category_id='.$r->category_id.'&category_name='.$r->category_name);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/sub_category/create')->withInput();
        }
    }

    public function delete(Request $r, $id)
    {
        if(!Right::check('Category', 'd')){
            return view('permissions.no');
        }
        $category_id = $r->query('category_id');
        DB::table('sub_categories')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/category/detail/'.$category_id);
    }

    public function edit($id)
    {
        if(!Right::check('Category', 'u')){
            return view('permissions.no');
        }
        $data['sub_category'] = DB::table('sub_categories')
            ->where('id', $id)
            ->first();
        return view('sub_categories.edit', $data);
    }

   
    
    public function update(Request $r)
    {
        if(!Right::check('Category', 'u')){
            return view('permissions.no');
        }
        $data = array(
            'name' => $r->name,
            'order' => $r->order
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('sub_categories')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/sub_category/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/sub_category/edit/'.$r->id);
        }
    }
}
