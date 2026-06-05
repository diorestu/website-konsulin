<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\BeritaImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminNewsController extends Controller
{
    public function deleteImage($id) {
        $images         = BeritaImages::where('id', $id)->first();
        $id_data        = $images->news_id;
        $filename       = $images->news_images;
        $success        = $images->delete();
        if ($success) {
            $path = public_path("storage/uploads/news/" . $filename);
            $msg = File::delete($path);
            if ($msg) {
                return redirect()->route('module-news.edit', $id_data)->with('success', 'Data and images has been deleted');
            } else {
                return redirect()->route('module-news.edit', $id_data)->with('success', 'Failed to delete image file');
            }
        } else {
            return redirect()->route('module-news.edit', $id_data)->with('error', 'Failed to delete image data');
        }
    }

    public function uploadImages(Request $request, $id) {
        $image      = $request->file('file');
        $fileInfo   = $image->getClientOriginalName();
        $filename   = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension  = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name  = $filename . '-' . time() . '.' . $extension;
        $image->move(public_path('storage/uploads/news'), $file_name);

        $imageUpload                        = new BeritaImages;
        $imageUpload->news_id               = $id;
        $imageUpload->news_images           = $file_name;
        $imageUpload->news_img_tipe         = "others";
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
        $data = Berita::orderby('created_at', 'desc')->get();
        return view('admin.pages.news.index', [
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
        return view('admin.pages.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_admin                       = Auth::user()->id;
        $input                          = $request->all();
        $tambah_baru                    = new Berita;
        $tambah_baru->news_title        = $input['news_title'];
        $tambah_baru->news_slug         = Str::slug($input['news_title']);
        $tambah_baru->news_meta_key     = $input['news_meta_key'];
        $tambah_baru->news_status       = $input['status'];
        $tambah_baru->news_meta_desc    = $input['news_meta_desc'];
        $tambah_baru->news_desc         = $input['news_desc'];
        $tambah_baru->news_uploadby     = $id_admin;
        $berhasilSimpan                 = $tambah_baru->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-news.index')->with('success', 'Process of adding data is successful.');
        } else {
            return redirect()->route('module-news.index')->with('error', 'Failed to add data');
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
        $data           = Berita::where('id', $id)->first();
        $data_images    = BeritaImages::where('news_id', $id)->get();

        return view('admin.pages.news.edit', ['data' => $data, 'data_image' => $data_images]);
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
        $data                   = Berita::findOrFail($id);
        $data->news_title       = $input['news_title'];
        $data->news_slug        = Str::slug($input['news_title']);
        $data->news_meta_key    = $input['news_meta_key'];
        $data->news_status      = $input['status'];
        $data->news_meta_desc   = $input['news_meta_desc'];
        $data->news_desc        = $input['news_desc'];
        $berhasilSimpan         = $data->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-news.index')->with('success', 'All changes has been saved');
        } else {
            return redirect()->route('module-news.edit', $data->id)->with('error', 'Failed to update data');
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
            Berita::findOrFail($id)->delete();
            return "ok";
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
