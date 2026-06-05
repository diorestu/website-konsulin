<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id     = 1;
        $com    = Company::where('id', $id)->first();
        return view('admin.pages.settings.index', [
            'data' => $com,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input                      = $request->all();
        $data                       = Company::findOrFail($id);
        $data->nama_com             = $input['nama_com'];
        $data->brand_com            = $input['brand_com'];
        $data->phone_com1           = $input['phone_com1'];
        $data->email_com1           = $input['email_com1'];
        $data->alamat_com1          = $input['alamat_com1'];
        $data->social_fb            = $input['social_fb'];
        $data->social_ig            = $input['social_ig'];
        $data->social_yt            = $input['social_yt'];
        $data->social_tw            = $input['social_tw'];
        $berhasilSimpan             = $data->save();
        if ($berhasilSimpan) {
            return redirect()->route('settings.index')->with('success', 'All changes has been saved');
        } else {
            return redirect()->route('settings.edit', $id)->with('error', 'Error while saving company settings');
        }
    }
}
