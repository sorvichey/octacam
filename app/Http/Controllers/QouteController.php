<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class QouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        if(!Right::check('Qoute', 'l')){
            return view('permissions.no');
        }
        $data['qoutes'] = DB::table('qoutes')
            ->where('active',1)
            ->paginate(18);
        return view('qoutes.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Qoute', 'i')){
            return view('permissions.no');
        }
        return view('qoutes.create');
    }
    // save new category
    public function save(Request $r)
    {
        if(!Right::check('Qoute', 'i')){
            return view('permissions.no');
        }
        $data = array(
            'description' => $r->description,
            'category' => $r->category
        );
        $sms = "The new qoute has been created successfully.";
        $sms1 = "Fail to create the new qoute, please check again!";
        $i = DB::table('qoutes')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/qoute/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/qoute/create')->withInput();
        }
    }

    public function delete($id)
    {
        if(!Right::check('Qoute', 'd')){
            return view('permissions.no');
        }
        DB::table('qoutes')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/qoute');
    }

    public function edit($id)
    {
        if(!Right::check('Qoute', 'u')){
            return view('permissions.no');
        }
        $data['qoute'] = DB::table('qoutes')
            ->where('id', $id)
            ->first();
        return view('qoutes.edit', $data);
    }
    
    public function update(Request $r)
    {
        if(!Right::check('Qoute', 'u')){
            return view('permissions.no');
        }
        $data = array(
            'description' => $r->description,
            'category' => $r->category
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('qoutes')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/qoute/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/qoute/edit/'.$r->id);
        }
    }
}
