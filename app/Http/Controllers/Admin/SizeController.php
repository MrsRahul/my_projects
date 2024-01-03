<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $detail['data'] = Size::all();
        return view('admin/size',$detail);
    }
    public function manage_size(Request $request, $id='')
    {
        if ($id>0) 
        {
            $arr = Size::where(['id'=>$id])->get();

            $result['size'] = $arr['0']->size;
            $result['id'] = $arr['0']->id;
        }
        else
        {
            $result['size'] ="";
            $result['id'] =0;
        }
        return view('admin/manage_size',$result);
    }

    public function manage_size_process(Request $request)
    {
        $request->validate([
            'size'=>'required|unique:sizes,size,'.$request->post('id'),
        ]);
   
        if ($request->post('id')>0) 
        {
            $model = Size::find($request->post('id'));
            $msg = 'Size Updated';
        }
        else
        {
            $model = new Size();
            $msg = 'Size Inserted';
        }

        $model->size = $request->post('size');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/size');
    }

    public function status(Request $request, $status, $id)
    {
        $delete = Size::find($id);
        $delete->status = $status;
        $delete->save();
        $request->session()->flash('message','Status Changed Successfull');
        return redirect('admin/size');
    }

    public function delete(Request $request, $id)
    {
        $delete = Size::find($id);
        $delete->delete();
        $request->session()->flash('message','Size Deleted');
        return redirect('admin/size');
    }
}
