<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaImages;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\PortfolioImages;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Mail\Contact as ContactMail;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class FrontController extends Controller
{
    //
    public function index()
    {
        $slider = Slider::where('sl_status', 'Published')->get();
        return view("front.pages.index", ['slider' => $slider]);
    }

    public function about()
    {
        return view("front.pages.about");
    }

    public function value()
    {
        return view("front.pages.value");
    }

    public function services()
    {
        return view("front.pages.services");
    }

    public function testimoni()
    {
        return view("front.pages.testimonial");
    }

    public function contact()
    {
        return view("front.pages.contact");
    }

    public function kirim_pesan(Request $request)
    {
        $input                      = $request->all();
        $kepada                     = "info@konsulin.id";
        $tambah_baru                = new Contact;
        $tambah_baru->ct_name       = $input['name'];
        $tambah_baru->ct_phone      = $input['phone'];
        $tambah_baru->ct_email      = $input['email'];
        $tambah_baru->ct_subject    = "Pesan dari Calon Klien - Konsulin [Website]";
        $tambah_baru->ct_pesan      = $input['message'];
        $berhasilTambah             = $tambah_baru->save();
        
        $judul                      = "Pesan Baru dari Calon Customer - Konsulin.id [WEBSITE]";
        $deskripsi                  = "Halo, ada pesan baru dari calon customer, Ayo di follow up. Detailnya sebagai berikut:";
        $ct_name                    = $input['name'];
        $ct_phone                   = $input['phone'];
        $ct_email                   = $input['email'];
        $ct_pesan                   = $input['message'];
        $ct_subject                 = "Pesan dari Calon Klien - Konsulin [Website]";
        
        FacadesMail::to($kepada)->send(new ContactMail($judul, $deskripsi, $ct_name, $ct_phone, $ct_email, $ct_pesan, $ct_subject));
        
        if ($berhasilTambah) {
            // echo "Pesan berhasil terkirim";
            $pesan = urlencode("Halo admin, saya ".$ct_name." ingin bertanya tentang: ". $ct_pesan. " [WEBSITE CONTACT FORM]");
            header("Location: https://wa.me/6285183440300?text=$pesan");
            exit;
            
        } else {
            echo "Gagal mengirimkan pesan";
        }
    }

    // SERVICE PAGE
    public function laporan_keuangan()
    {
        return view("front.pages.services.laporan_keuangan");
    }
    public function model_usaha()
    {
        return view("front.pages.services.model_usaha");
    }
    public function pelaporan_pajak()
    {
        return view("front.pages.services.pelaporan_pajak");
    }
    public function pendirian_pt()
    {
        return view("front.pages.services.pendirian_legalitas");
    }
    public function npwp()
    {
        return view("front.pages.services.npwp");
    }
    public function business_advisory()
    {
        return view('front.pages.services.business_advisory');
    }
    public function pengurusan_sertifikat()
    {
        return view("front.pages.services.pengurusan_sertifikat_e");
    }
    public function branding()
    {
        return view("front.pages.services.branding");
    }
    
    public function pendirian_pt_badan()
    {
        return view("front.pages.services.pendirian_pt_badan");
    }
    public function pendirian_cv()
    {
        return view("front.pages.services.pendirian_cv");
    }
    public function pendirian_yayasan()
    {
        return view("front.pages.services.pendirian_yayasan");
    }
    public function virtual_office()
    {
        return view("front.pages.services.virtual_office");
    }

    // public function project()
    // {
    //     $portfolio      = Portfolio::where('pf_status', 'Published')->orderBy('created_at', 'desc')->get();
    //     $data_images    = PortfolioImages::get();
    //     foreach ($portfolio as $value1) {
    //         $value1->images = collect([]);
    //         foreach ($data_images as $value2) {
    //             if ($value1->id == $value2->pf_id) {
    //                 $value1->images->push($value2);
    //             }
    //         }
    //     }
    //     return view("front.pages.project", ['project' => $portfolio]);
    // }

    // public function project_detail($id)
    // {
    //     $portfolio   = Portfolio::findOrFail($id);
    //     $data_images = PortfolioImages::where('pf_id', $id)->get();
    //     return view("front.pages.project_detail", ['data_project' => $portfolio, 'data_images' => $data_images]);
    // }

    // public function faq()
    // {
    //     return view("front.pages.faq");
    // }

    // public function terms()
    // {
    //     return view("front.pages.terms");
    // }

    // public function news()
    // {
    //     $data_berita = Berita::where('news_status', 'Published')->orderBy('created_at', 'desc')->get();
    //     $data_images = BeritaImages::where('news_img_tipe', 'thumbnail')->get();
    //     foreach ($data_berita as $value1) {
    //         $value1->images = collect([]);
    //         foreach ($data_images as $value2) {
    //             if ($value1->id == $value2->news_id) {
    //                 $value1->images->push($value2);
    //             }
    //         }
    //     }
    //     return view("front.pages.news", ['data_berita' => $data_berita]);
    // }

    // public function news_detail($id)
    // {
    //     $data_berita = Berita::findOrFail($id);
    //     $data_images = BeritaImages::where('news_id', $id)->get();
    //     $images_thu  = BeritaImages::where('news_id', $id)->where('news_img_tipe', 'thumbnail')->first();
    //     $other_news  = Berita::where('id', '!=', $id)->where('news_status', 'Published')->take(8)->get();

    //     return view("front.pages.news_detail", ['data_berita' => $data_berita, 'data_images' => $data_images, 'images_thu' => $images_thu, 'other' => $other_news]);
    // }
}