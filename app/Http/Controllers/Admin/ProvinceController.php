<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Image;
use File;

use App\Models\Province;
use App\Models\ProvinceTranslation;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = Session::get('locale');
        $province = ProvinceTranslation::where('locale', $locale)->orderBy('province_id', 'DESC')->get();
        return view('admin.province.index', compact('province'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $data = new Province();
        $data->user_id = Auth::User()->id;
        $data->status = 'true';
        $data->fill([
            'en' => [
                'name' => $datas['name:en'],
            ],
            'vi' => [
                'name' => $datas['name:vi'],
            ],
            'cn' => [
                'name' => $datas['name:cn'],
            ]
        ]);
        $data->save();
        return redirect('admin/province')->with('success','updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProvinceTranslation::where('province_id', $id)->get();
        $province = Province::find($id);
        return view('admin.province.edit', compact(
            'province',
            'data',
            'id',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->id) {
            foreach ($request->id as $key => $value) {
                $data = ProvinceTranslation::find($value);
                $data->name = $request->name[$key];
                $data->save();
            }
        }

        $Province = Province::find($id);
        if ($request->hasFile('img')) {
            if(File::exists('data/images/'.$Province->img)) { File::delete('data/images/'.$Province->img);} // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/images/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/images', $filename);
            $Province->img = $filename;
        }
        $Province->save();
        
        // return redirect('admin/province')->with('success','updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProvinceTranslation::where('province_id', $id)->get();
        foreach ($data as $key => $value) {
            ProvinceTranslation::find($value->id)->delete();
        }
        Province::find($id)->delete();
        return redirect()->back();
    }
}
