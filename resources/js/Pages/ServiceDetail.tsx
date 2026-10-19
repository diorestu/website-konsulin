import { Head, Link } from '@inertiajs/react';
import { useEffect, useRef } from 'react';
import SiteHeader from '../Components/SiteHeader';
import SiteFooter from '../Components/SiteFooter';
import Icon from '../Components/Icon';
import type { Service } from '../types';

export default function ServiceDetail({ service }: { service: Service }) {
    const main = useRef<HTMLElement>(null);
    const consultationUrl = `/kontak?layanan=${encodeURIComponent(service.id)}#konsultasi`;

    useEffect(() => {
        main.current?.focus({ preventScroll: true });
    }, [service.id]);

    return <>
        <Head title={service.name}>
            <meta name="description" head-key="description" content={service.summary} />
            <meta property="og:title" content={`${service.name} — Konsulin`} />
            <meta property="og:description" content={service.summary} />
        </Head>
        <SiteHeader />
        <main id="main" ref={main} tabIndex={-1} className="service-detail-page">
            <div className="service-detail-intro">
                <div className="container">
                    <nav className="service-breadcrumb" aria-label="Breadcrumb">
                        <Link href="/">Beranda</Link><span aria-hidden="true">/</span>
                        <Link href="/#layanan">Layanan</Link>
                    </nav>
                    <p className="section-caption">Layanan Konsulin</p>
                    <h1>{service.name}</h1>
                    <p className="service-detail-summary">{service.summary}</p>
                    <Link className="button button-primary" href={consultationUrl}>Konsultasikan layanan <Icon name="arrow" /></Link>
                </div>
            </div>
            <div className="container service-detail-body">
                <article className="service-detail-content">
                    <section aria-labelledby="service-overview">
                        <h2 id="service-overview">Tentang layanan ini</h2>
                        <p>{service.description}</p>
                    </section>
                    <section aria-labelledby="service-scope">
                        <h2 id="service-scope">Yang bisa kita bahas</h2>
                        <ul className="service-scope-list">{service.scope.map(item => <li key={item}><Icon name="check" /><span>{item}</span></li>)}</ul>
                    </section>
                    <section aria-labelledby="service-preparation">
                        <h2 id="service-preparation">Untuk percakapan awal</h2>
                        <p>Siapkan gambaran singkat berikut agar kebutuhan Anda lebih mudah dipahami.</p>
                        <ul className="service-preparation-list">{service.preparation.map(item => <li key={item}>{item}</li>)}</ul>
                        <p className="service-detail-note">Dokumen pendukung dibahas pada tahap lanjutan. Jangan mengirimkan kata sandi, kode verifikasi, atau dokumen sensitif melalui formulir awal.</p>
                    </section>
                </article>
                <aside className="service-detail-aside" aria-labelledby="detail-next-step">
                    <div className="service-consultation-card">
                        <p className="section-caption">Langkah berikutnya</p>
                        <h2 id="detail-next-step">Mulai dari<br />kebutuhan Anda.</h2>
                        <p>Ceritakan situasi Anda melalui formulir. Layanan ini akan terpilih otomatis.</p>
                        <Link className="button button-primary" href={consultationUrl}>Mulai konsultasi</Link>
                        <Link className="text-link" href="/#layanan">Lihat semua layanan</Link>
                    </div>
                </aside>
            </div>
        </main>
        <SiteFooter />
    </>;
}
