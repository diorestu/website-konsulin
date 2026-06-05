<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webpage;
use App\Models\WebpageImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminPageController extends Controller
{
    public function deleteImage($id)
    {
        $images         = WebpageImages::where('id', $id)->first();
        $id_data        = $images->wp_id;
        $filename       = $images->wp_images;
        $success        = $images->delete();
        if ($success) {
            $path = public_path("storage/uploads/pages/" . $filename);
            $msg = File::delete($path);
            if ($msg) {
                return redirect()->route('module-webpage.edit', $id_data)->with('success', 'Data and images has been deleted');
            } else {
                return redirect()->route('module-webpage.edit', $id_data)->with('success', 'Failed to delete image file');
            }
        } else {
            return redirect()->route('module-webpage.edit', $id_data)->with('error', 'Failed to delete image data');
        }
    }

    public function uploadImages(Request $request, $id)
    {
        $image      = $request->file('file');
        $fileInfo   = $image->getClientOriginalName();
        $filename   = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension  = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name  = $filename . '-' . time() . '.' . $extension;
        $image->move(public_path('storage/uploads/pages'), $file_name);
        $imageUpload                        = new WebpageImages;
        $imageUpload->wp_id                 = $id;
        $imageUpload->wp_images             = $file_name;
        $imageUpload->save();
        return response()->json(['success' => $file_name]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Webpage::orderby('created_at', 'desc')->get();
        return view('admin.pages.webpage.index', [
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
        return view('admin.pages.webpage.add');
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
        $tambah_baru                    = new Webpage;
        $tambah_baru->wp_title          = $input['wp_title'];
        $tambah_baru->wp_subtitle       = $input['wp_subtitle'];
        $tambah_baru->wp_url            = $input['wp_url'];
        $tambah_baru->wp_text1          = $input['wp_text1'];
        $tambah_baru->wp_text2          = $input['wp_text2'];
        // $tambah_baru->wp_text3          = $input['wp_text3'];
        $tambah_baru->wp_meta_desc      = $input['wp_meta_desc'];
        $tambah_baru->wp_meta_key       = $input['wp_meta_key'];
        $tambah_baru->wp_status         = $input['status'];
        $berhasilSimpan                 = $tambah_baru->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-webpage.index')->with('success', 'Process of adding data is successful.');
        } else {
            return redirect()->route('module-webpage.index')->with('error', 'Failed to add data');
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
        $data           = Webpage::where('id', $id)->first();
        $data_images    = WebpageImages::where('wp_id', $id)->get();
        return view('admin.pages.webpage.edit', ['data' => $data, 'data_image' => $data_images]);
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
        $data                   = Webpage::findOrFail($id);
        $data->wp_title         = $input['wp_title'];
        $data->wp_subtitle      = $input['wp_subtitle'];
        $data->wp_url           = $input['wp_url'];
        $data->wp_text1         = $input['wp_text1'];
        $data->wp_text2         = $input['wp_text2'];
        // $data->wp_text3         = $input['wp_text3'];
        $data->wp_meta_desc     = $input['wp_meta_desc'];
        $data->wp_meta_key      = $input['wp_meta_key'];
        $data->wp_status        = $input['status'];
        $berhasilSimpan         = $data->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-webpage.index')->with('success', 'All changes has been saved');
        } else {
            return redirect()->route('module-webpage.edit', $data->id)->with('error', 'Failed to update data');
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
            Webpage::findOrFail($id)->delete();
            return "ok";
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
