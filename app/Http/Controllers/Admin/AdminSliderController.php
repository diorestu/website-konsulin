<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminSliderController extends Controller
{
    public function deleteImage($id)
    {
        $data                   = Slider::findOrFail($id);
        $filename               = $data->sl_images;
        $data->sl_images        = null;
        $success                = $data->save();
        if ($success) {
            $path = public_path("storage/uploads/slider/" . $filename);
            $msg = File::delete($path);
            if ($msg) {
                return redirect()->route('module-slider.edit', $id)->with('success', 'Data and images has been deleted');
            } else {
                return redirect()->route('module-slider.edit', $id)->with('success', 'Failed to delete image file');
            }
        } else {
            return redirect()->route('module-slider.edit', $id)->with('error', 'Failed to delete image data');
        }
    }

    public function uploadImages(Request $request)
    {
        $id             = $request->id;
        $images         = Slider::where('id', $id)->first();
        $filename       = $images->sl_images;
        if ($filename != null) {
            $path = public_path("storage/uploads/slider/" . $filename);
            $msg = File::delete($path);
        }
        $folderPath     = public_path('storage/uploads/slider/');
        $image_parts    = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type     = $image_type_aux[1];
        $image_base64   = base64_decode($image_parts[1]);
        $imageName      = uniqid() . '.jpg';
        $imageFullPath  = $folderPath . $imageName;
        file_put_contents($imageFullPath, $image_base64);
        $data               = Slider::findOrFail($id);
        $data->sl_images    = $imageName;
        $berhasil           = $data->save();
        if ($berhasil) {
            return "ok";
            // return '<img src="' . asset("storage/uploads/$imageName") . '" class="d-block w-100" />';
        } else {
            return "gagal";
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::orderby('created_at', 'desc')->get();
        return view('admin.pages.slider.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input                          = $request->all();
        $tambah_baru                    = new Slider;
        $tambah_baru->sl_title          = $input['sl_title'];
        $tambah_baru->sl_subtitle       = $input['sl_subtitle'];
        $tambah_baru->sl_desc           = $input['sl_desc'];
        $tambah_baru->sl_btn_caption    = $input['sl_btn_caption'];
        $tambah_baru->sl_btn_link       = $input['sl_btn_link'];
        // $tambah_baru->sl_images         = $input['sl_images'];
        $tambah_baru->sl_status         = $input['status'];
        $berhasilSimpan                 = $tambah_baru->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-slider.index')->with('success', 'Process of adding data is successful.');
        } else {
            return redirect()->route('module-slider.index')->with('error', 'Failed to add data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data           = Slider::where('id', $id)->first();
        return view('admin.pages.slider.edit', ['data' => $data]);
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
        $input                  = $request->all();
        $data                   = Slider::findOrFail($id);
        $data->sl_title         = $input['sl_title'];
        $data->sl_subtitle      = $input['sl_subtitle'];
        $data->sl_desc          = $input['sl_desc'];
        $data->sl_btn_caption   = $input['sl_btn_caption'];
        $data->sl_btn_link      = $input['sl_btn_link'];
        // $data->sl_images        = $input['sl_images'];
        $data->sl_status        = $input['status'];
        $berhasilSimpan         = $data->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-slider.index')->with('success', 'All changes has been saved');
        } else {
            return redirect()->route('module-slider.edit', $data->id)->with('error', 'Failed to update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Slider::findOrFail($id)->delete();
            return "ok";
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
