import { usePage } from '@inertiajs/react';
import SeoHead from '../Components/SeoHead';
import type { SeoMetadata } from '../Components/SeoHead';
import RelatedPages from '../Components/RelatedPages';
import SiteHeader from '../Components/SiteHeader';
import SiteFooter from '../Components/SiteFooter';
import Breadcrumbs from '../Components/Breadcrumbs';

export default function Privacy() {
    const { seo } = usePage<{ seo: SeoMetadata }>().props;
    const trackingEnabled = Boolean(seo.analyticsId || seo.tagManagerId || seo.metaPixelId);
    return <><SeoHead /><SiteHeader /><main id="main" className="container privacy-page"><Breadcrumbs title="Privasi" /><p className="section-caption">Konsulin</p><h1>Privasi permintaan konsultasi</h1><p className="privacy-intro">Informasi yang Anda kirim digunakan untuk mencatat dan memahami kebutuhan konsultasi Anda.</p><h2>Data yang dicatat</h2><p>Formulir mencatat nama, alamat email, nama usaha bila diisi, layanan yang dipilih, pesan, serta waktu persetujuan dan pengiriman. Jangan mencantumkan kata sandi, NPWP, atau dokumen keuangan sensitif di pesan awal.</p><h2>Tujuan penggunaan</h2><p>Data digunakan untuk mengelola permintaan dan menyiapkan pembicaraan terkait layanan yang Anda pilih. Data formulir tidak ditampilkan melalui halaman publik.</p><h2>Penyimpanan dan pengiriman</h2><p>Pada versi website ini, permintaan disimpan pada database aplikasi. Notifikasi email dan WhatsApp belum diaktifkan. Konfirmasi di layar menyatakan data berhasil dicatat, bukan konfirmasi jadwal atau pengiriman pesan kepada pihak lain.</p>{trackingEnabled && <><h2>Pengukuran penggunaan situs</h2><p>Google Analytics, Google Tag Manager, dan Meta Pixel digunakan untuk mengukur kunjungan halaman serta interaksi dengan tautan kontak dan formulir konsultasi. Nama, alamat email, dan isi pesan formulir tidak disertakan dalam parameter event yang dikirim oleh website.</p></>}<h2>Persetujuan dan koreksi</h2><p>Pengiriman formulir memerlukan persetujuan penggunaan data. Jika ingin mengoreksi permintaan, kirim permintaan baru dengan alamat email yang sama dan jelaskan koreksinya tanpa mengulangi informasi sensitif.</p><a className="button button-outline" href="/kontak#konsultasi">Kembali ke konsultasi</a><RelatedPages /></main><SiteFooter /></>;
}
