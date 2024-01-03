<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color['data'] = Color::all();
        return view('admin/color',$color);
    }

    public function manage_color(Request $request, $id='')
    {
        if ($id>0) 
        {
            $arr = Color::where(['id'=>$id])->get();
            $result['color'] = $arr['0']->color;
            $result['id'] = $arr['0']->id;
        }
        else
        {
            $result['color'] = "";
            $result['id'] = 0;
        }
        return view('admin/manage_color',$result);
    }

    public function manage_color_process(Request $request)
    {
        $request->validate([
            'color'=>'required|unique:colors,color,'.$request->post('id')
        ]);

        if ($request->post('id')>0) 
        {
            $modal = Color::find($request->post('id'));
            $msg = "Color Updated";
        }
        else
        {
            $modal= new Color();
            $msg = "Color Inserted";
        }

        $modal->color = $request->post('color');
        //$modal->status = 1;
        $modal->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/color');
    }

    public function status(Request $request, $status, $id)
    {
        $delete = Color::find($id);
        $delete->status = $status;
        $delete->save();
        $request->session()->flash('message','Status Changed Successfull');
        return redirect('admin/color');
    }

    public function delete(Request $request, $id)
    {
        $delete = Color::find($id);
        $delete->delete();
        $request->session()->flash('message','Color Deleted');
        return redirect('admin/color');
    }


}


