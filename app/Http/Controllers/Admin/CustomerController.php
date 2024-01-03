<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $detail['data'] = Customer::all();
        return view('admin/customer',$detail);
    }

    public function show(Request $request, $id)
    {
        $arr = Customer::where(['id'=>$id])->get();
        $result['customer_list'] = $arr['0'];
        return view('admin/show_customer',$result);
    }
    

    public function status(Request $request, $status, $id)
    {
        $delete = Customer::find($id);
        $delete->status = $status;
        $delete->save();
        $request->session()->flash('message','Status Changed Successfull');
        return redirect('admin/customers');
    }

    
}
