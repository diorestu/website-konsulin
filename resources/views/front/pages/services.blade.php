@extends('front.layout.front_layout')

@section('title')
    Jasa & Layanan
@endsection

@section('meta_desc')
    Dapatkan layanan pajak, akuntansi, legalitas, perencanaan bisnis, pengurusan dokumen, dan branding usaha terbaik untuk mendukung pertumbuhan bisnis Anda bersama Konsulin.id.
@endsection

@section('meta_key')
    konsulin, jasa konsulin, layanan pajak, akuntansi, laporan keuangan, pelaporan pajak, pendirian pt, legalitas usaha, pengurusan dokumen, branding usaha, konsultasi bisnis
@endsection



@section('content')

    

    <section class="kons-service-list" id="daftar-layanan">
        <div class="kons-service-container">
            <div class="kons-service-heading">
                <span>Layanan dan Jasa Konsulin</span>

                <h2>
                    Temukan Layanan yang Tepat untuk Kebutuhan Perusahaan Anda
                </h2>

                <p>
                    Pilih layanan yang sesuai dengan kebutuhan bisnis Anda, mulai dari laporan
                    keuangan, pajak, legalitas, dokumen, hingga branding usaha.
                </p>
            </div>

            @php
                $services = [
                    [
                        'label' => 'Laporan Keuangan',
                        'title' => 'Jasa Pembuatan Laporan Keuangan',
                        'description' => 'Kami menyediakan laporan keuangan akurat dan sesuai standar akuntansi untuk membantu Anda memantau bisnis dan membuat keputusan yang tepat.',
                        'image' => 'frontend-assets/img/services/1_laporan_keuangan.jpg',
                        'url' => route('services.laporan_keuangan'),
                        'items' => ['UMKM', 'Perusahaan Menengah', 'dan lainnya'],
                    ],
                    [
                        'label' => 'Model Bisnis',
                        'title' => 'Perancangan Model Bisnis',
                        'description' => 'Kami membantu Anda merancang model bisnis yang efektif dan berkelanjutan untuk mendukung pertumbuhan usaha jangka panjang.',
                        'image' => 'frontend-assets/img/services/2_business_planning.jpg',
                        'url' => route('services.model_usaha'),
                        'items' => ['Business Model', 'Business Fundraising', 'dan lainnya'],
                    ],
                    [
                        'label' => 'Pelaporan Pajak',
                        'title' => 'Pengurusan Pelaporan Pajak',
                        'description' => 'Layanan pengurusan pelaporan pajak yang tepat waktu dan sesuai regulasi agar kewajiban perpajakan Anda lebih mudah.',
                        'image' => 'frontend-assets/img/services/3_tax.jpg',
                        'url' => route('services.pelaporan_pajak'),
                        'items' => ['Pajak Perorangan', 'Pajak Badan Usaha', 'dan lainnya'],
                    ],
                    [
                        'label' => 'Legalitas Usaha',
                        'title' => 'Pendirian Badan Usaha',
                        'description' => 'Kami membantu proses pendirian badan usaha agar legalitas bisnis Anda terpenuhi sesuai peraturan yang berlaku.',
                        'image' => 'frontend-assets/img/services/4_legalitas.jpg',
                        'url' => route('services.pendirian_pt'),
                        'items' => ['Pengecekan Nama Usaha', 'Sertifikat Kemenkumham', 'dan lainnya'],
                    ],
                    [
                        'label' => 'Dokumen Usaha',
                        'title' => 'Pengurusan Dokumen',
                        'description' => 'Layanan pengurusan dokumen perpajakan dan administrasi usaha secara cepat, praktis, dan profesional.',
                        'image' => 'frontend-assets/img/services/5_npwp.jpg',
                        'url' => route('services.npwp'),
                        'items' => ['NPWP Pribadi', 'NPWP Badan Usaha', 'dan lainnya'],
                    ],
                    [
                        'label' => 'Branding Usaha',
                        'title' => 'Branding Perusahaan',
                        'description' => 'Kami membantu membangun identitas merek yang kuat dan profesional untuk meningkatkan daya tarik bisnis Anda.',
                        'image' => 'frontend-assets/img/services/7_branding.jpg',
                        'url' => route('services.branding'),
                        'items' => ['Logo', 'Website', 'dan lainnya'],
                    ],
                ];
            @endphp

            <div class="kons-service-card-grid">
                @foreach ($services as $service)
                    <article class="kons-service-page-card">
                        <a href="{{ $service['url'] }}" class="kons-service-card-image">
                            <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}">
                        </a>

                        <div class="kons-service-card-body">
                            <span>{{ $service['label'] }}</span>

                            <h3>
                                <a href="{{ $service['url'] }}">
                                    {{ $service['title'] }}
                                </a>
                            </h3>

                            <p>{{ $service['description'] }}</p>

                            <ul>
                                @foreach ($service['items'] as $item)
                                    <li>
                                        <span>✓</span>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="{{ $service['url'] }}" class="kons-service-card-link">
                                Lihat Selengkapnya
                                <i>→</i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('front.include.cta')
@endsection


@push('addon-style')
<style>
	.kons-service-container {
    width: min(1180px, 92%);
    margin: 0 auto;
}

.kons-service-list {
    position: relative;
    overflow: hidden;
    padding: 96px 0;
    background:
        radial-gradient(circle at 10% 12%, rgba(18, 104, 255, 0.07), transparent 28%),
        radial-gradient(circle at 90% 16%, rgba(18, 104, 255, 0.05), transparent 26%),
        linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
}

.kons-service-heading {
    max-width: 780px;
    margin: 0 auto 46px;
    text-align: center;
}

.kons-service-heading span {
    display: inline-block;
    margin-bottom: 10px;
    color: #1268ff;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.kons-service-heading h2 {
    margin: 0;
    color: #07152f;
    font-size: clamp(32px, 4vw, 50px);
    font-weight: 900;
    line-height: 1.14;
    letter-spacing: -0.045em;
}

.kons-service-heading p {
    max-width: 680px;
    margin: 18px auto 0;
    color: #64748b;
    font-size: 16px;
    line-height: 1.8;
}

.kons-service-card-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 26px;
    align-items: stretch;
}

.kons-service-page-card {
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #e6edf5;
    border-radius: 24px;
    box-shadow: 0 14px 40px rgba(15, 23, 42, 0.06);
    transition: 0.28s ease;
}

.kons-service-page-card:hover {
    transform: translateY(-6px);
    border-color: rgba(18, 104, 255, 0.25);
    box-shadow: 0 24px 65px rgba(15, 23, 42, 0.12);
}

.kons-service-card-image {
    position: relative;
    display: block;
    width: 100%;
    height: 245px;
    overflow: hidden;
    background: #f4f8fc;
}

.kons-service-card-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.45s ease;
}

.kons-service-page-card:hover .kons-service-card-image img {
    transform: scale(1.06);
}

.kons-service-card-body {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 28px 26px 26px;
}

.kons-service-card-body > span {
    display: inline-flex;
    align-items: center;
    width: fit-content;
    margin-bottom: 14px;
    padding: 7px 12px;
    color: #1268ff;
    background: #eef5ff;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

.kons-service-card-body h3 {
    margin: 0;
    color: #07152f;
    font-size: 22px;
    font-weight: 900;
    line-height: 1.3;
}

.kons-service-card-body h3 a {
    color: inherit;
    text-decoration: none;
}

.kons-service-card-body p {
    margin: 16px 0 0;
    color: #64748b;
    font-size: 15px;
    line-height: 1.75;
}

.kons-service-card-body ul {
    display: grid;
    gap: 10px;
    margin: 22px 0 0;
    padding: 0;
    list-style: none;
}

.kons-service-card-body li {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #07152f;
    font-size: 14px;
    font-weight: 700;
    line-height: 1.45;
}

.kons-service-card-body li span {
    flex: 0 0 22px;
    width: 22px;
    height: 22px;
    display: grid;
    place-items: center;
    color: #ffffff;
    background: #1268ff;
    border-radius: 50%;
    font-size: 11px;
    font-weight: 900;
}

.kons-service-card-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: auto;
    padding-top: 24px;
    color: #1268ff;
    font-size: 14px;
    font-weight: 900;
    text-decoration: none;
    transition: color 0.25s ease;
}

.kons-service-card-link i {
    font-style: normal;
    transition: transform 0.25s ease;
}

.kons-service-card-link:hover {
    color: #0054e6;
}

.kons-service-card-link:hover i {
    transform: translateX(4px);
}

@media (max-width: 991px) {
    .kons-service-list {
        padding: 74px 0;
    }

    .kons-service-card-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 575px) {
    .kons-service-list {
        padding: 62px 0;
    }

    .kons-service-heading h2 {
        font-size: 30px;
    }

    .kons-service-card-grid {
        grid-template-columns: 1fr;
    }

    .kons-service-card-image {
        height: 220px;
    }

    .kons-service-card-body {
        padding: 24px 22px;
    }

    .kons-service-card-body h3 {
        font-size: 20px;
    }
}
</style>
@endpush