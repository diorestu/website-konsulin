import { Head } from '@inertiajs/react';
import { useEffect, useRef } from 'react';
import '../../../public/error.css';

export default function NotFound({ homeUrl, servicesUrl }: { homeUrl: string; servicesUrl: string }) {
    const main = useRef<HTMLElement>(null);
    useEffect(() => { main.current?.focus({ preventScroll: true }); }, []);

    return <div className="error-page">
        <Head title="Halaman tidak ditemukan">
            <meta name="robots" head-key="robots" content="noindex, nofollow" />
        </Head>
        <header className="error-header">
            <a href={homeUrl} aria-label="Konsulin — Beranda"><img src="/images/header.png" alt="Konsulin" width="221" height="68" /></a>
            <span>Adi Putra &amp; Partners</span>
        </header>
        <main id="main" className="error-main" ref={main} tabIndex={-1}>
            <p className="error-code" aria-label="Error 404">404<span aria-hidden="true">.</span></p>
            <div className="error-copy">
                <p className="error-label">HALAMAN TIDAK DITEMUKAN</p>
                <h1>Halaman ini<br />belum ketemu.</h1>
                <p>Alamat yang Anda tuju mungkin sudah berubah atau tidak tersedia. Silakan kembali ke beranda atau temukan layanan yang Anda butuhkan.</p>
                <nav className="error-actions" aria-label="Pilihan halaman">
                    <a className="error-primary" href={homeUrl}>Kembali ke beranda <span aria-hidden="true">↗</span></a>
                    <a className="error-secondary" href={servicesUrl}>Lihat layanan <span aria-hidden="true">→</span></a>
                </nav>
            </div>
        </main>
        <footer className="error-footer">Kantor Jasa Akuntan &amp; Konsultan Hukum Perpajakan</footer>
    </div>;
}
