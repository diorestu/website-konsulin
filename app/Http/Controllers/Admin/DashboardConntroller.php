<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardConntroller extends Controller
{
    //

    public function index() {
        $today = date("Y-m-d");
        $bulan = date('m');
        $tahun = date('Y');
        $slide = Slider::where('sl_status', 'Published')->count();
        $pf    = Portfolio::where('pf_status', 'Published')->count();
        $news  = Berita::where('news_status', 'Published')->count();
        $pesan = Contact::whereDate('created_at', $today)->count();

        return view('admin.pages.dashboard.index', ['contact' => $pesan, 'news' => $news, 'portfolio' => $pf, 'slider' => $slide]);
    }
}
