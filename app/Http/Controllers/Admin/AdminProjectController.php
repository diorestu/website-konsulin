<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProjectController extends Controller
{
    public function frontImage($id) {
        $images                 = PortfolioImages::where('id', $id)->first();
        $id_data                = $images->pf_id;
        $filename               = $images->pf_images;
        $data                   = Portfolio::findOrFail($id_data);
        $data->pf_thumbnail     = $filename;
        $berhasilSimpan         = $data->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-project.edit', $id_data)->with('success', 'Image has been set to thumbnail image');
        } else {
            return redirect()->route('module-project.edit', $id_data)->with('error', 'Failed to set thumbnail image');
        }
    }

    public function deleteImage($id)
    {
        $images         = PortfolioImages::where('id', $id)->first();
        $id_data        = $images->pf_id;
        $filename       = $images->pf_images;
        $success        = $images->delete();
        if ($success) {
            $path = public_path("storage/uploads/portfolio/" . $filename);
            $msg = File::delete($path);
            if ($msg) {
                return redirect()->route('module-project.edit', $id_data)->with('success', 'Data and images has been deleted');
            } else {
                return redirect()->route('module-project.edit', $id_data)->with('success', 'Failed to delete image file');
            }
        } else {
            return redirect()->route('module-project.edit', $id_data)->with('error', 'Failed to delete image data');
        }
    }

    public function uploadImages(Request $request, $id)
    {
        $image      = $request->file('file');
        $fileInfo   = $image->getClientOriginalName();
        $filename   = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension  = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name  = $filename . '-' . time() . '.' . $extension;
        $image->move(public_path('storage/uploads/portfolio'), $file_name);
        $imageUpload                        = new PortfolioImages;
        $imageUpload->pf_id                 = $id;
        $imageUpload->pf_images             = $file_name;
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
        $data = Portfolio::orderby('created_at', 'desc')->get();
        return view('admin.pages.project.index', [
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
        return view('admin.pages.project.add');
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
        $tambah_baru                    = new Portfolio;
        $tambah_baru->pf_name           = $input['pf_name'];
        $tambah_baru->pf_desc           = $input['pf_desc'];
        $tambah_baru->pf_meta_desc      = $input['pf_meta_desc'];
        $tambah_baru->pf_meta_key       = $input['pf_meta_key'];
        $tambah_baru->pf_status         = $input['status'];
        $berhasilSimpan                 = $tambah_baru->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-project.index')->with('success', 'Process of adding data is successful.');
        } else {
            return redirect()->route('module-project.index')->with('error', 'Failed to add data');
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
        $data           = Portfolio::where('id', $id)->first();
        $data_images    = PortfolioImages::where('pf_id', $id)->get();
        return view('admin.pages.project.edit', ['data' => $data, 'data_image' => $data_images]);
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
        $data                   = Portfolio::findOrFail($id);
        $data->pf_name          = $input['pf_name'];
        $data->pf_desc          = $input['pf_desc'];
        $data->pf_meta_desc     = $input['pf_meta_desc'];
        $data->pf_meta_key      = $input['pf_meta_key'];
        $data->pf_status        = $input['status'];
        $berhasilSimpan         = $data->save();
        if ($berhasilSimpan) {
            return redirect()->route('module-project.index')->with('success', 'All changes has been saved');
        } else {
            return redirect()->route('module-project.edit', $data->id)->with('error', 'Failed to update data');
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
            Portfolio::findOrFail($id)->delete();
            return "ok";
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
