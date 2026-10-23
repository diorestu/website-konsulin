import { Link } from '@inertiajs/react';
import { useEffect, useRef } from 'react';
import SiteHeader from '../Components/SiteHeader';
import SiteFooter from '../Components/SiteFooter';
import SeoHead from '../Components/SeoHead';
import Breadcrumbs from '../Components/Breadcrumbs';
import RelatedPages from '../Components/RelatedPages';
import Icon from '../Components/Icon';

type Career = {
    id: number;
    title: string;
    description: string;
    requirements: string;
    benefits: string;
    location: string;
    employment_type: string;
    workplace_type: string;
    closing_date: string;
    apply_url: string | null;
};

type Props = {
    careers: Career[];
    pagination: { current_page: number; last_page: number; total: number };
    careersUnavailable: boolean;
};

const employmentLabels: Record<string, string> = { permanent: 'Tetap', contract: 'Kontrak', internship: 'Magang', freelance: 'Freelance' };
const workplaceLabels: Record<string, string> = { onsite: 'Di kantor', hybrid: 'Hybrid', remote: 'Remote' };

function closingDate(value: string): string | null {
    if (!/^\d{4}-\d{2}-\d{2}$/.test(value)) return null;
    const date = new Date(`${value}T00:00:00`);
    return Number.isNaN(date.getTime()) ? null : date.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
}

export default function Careers({ careers, pagination, careersUnavailable }: Props) {
    const main = useRef<HTMLElement>(null);
    useEffect(() => { main.current?.focus({ preventScroll: true }); }, [pagination.current_page]);

    return <>
        <SeoHead />
        <SiteHeader />
        <main id="main" ref={main} tabIndex={-1} className="service-detail-page careers-page">
            <div className="service-detail-intro"><div className="container">
                <Breadcrumbs title="Karir" />
                <p className="section-caption">Karir Konsulin</p>
                <h1>Temukan peluang<br />karir Anda.</h1>
                <p className="service-detail-summary">Lihat posisi yang tersedia dan temukan kesempatan untuk bergabung bersama tim Konsulin.</p>
                <a className="button button-primary" href="#lowongan">Lihat lowongan <Icon name="down" /></a>
            </div></div>
            <div className="container service-detail-body">
                <section id="lowongan" className="service-detail-content career-list" aria-labelledby="careers-heading">
                    <h2 id="careers-heading">Lowongan yang tersedia</h2>
                    {careersUnavailable ? <div className="career-state" role="status">
                        <h3>Lowongan belum dapat dimuat.</h3>
                        <p>Silakan coba beberapa saat lagi untuk melihat posisi yang tersedia.</p>
                        <Link className="button button-outline" href="/karir" preserveScroll>Coba lagi <Icon name="arrow" /></Link>
                    </div> : careers.length === 0 ? <div className="career-state">
                        <h3>{pagination.current_page > 1 ? 'Tidak ada lowongan di halaman ini.' : 'Belum ada lowongan yang tersedia.'}</h3>
                        <p>{pagination.current_page > 1 ? 'Kembali ke halaman pertama untuk melihat daftar lowongan.' : 'Kunjungi kembali halaman ini untuk melihat peluang karir berikutnya.'}</p>
                        {pagination.current_page > 1 && <Link className="text-link" href="/karir">Lihat halaman pertama <Icon name="arrow" /></Link>}
                    </div> : <>
                        <p className="career-count">{pagination.total} lowongan tersedia</p>
                        <div className="career-cards">{careers.map(career => {
                            const deadline = closingDate(career.closing_date);
                            const metadata = [
                                { label: 'Lokasi', icon: 'map-marker' as const, value: career.location },
                                { label: 'Status', icon: 'user' as const, value: employmentLabels[career.employment_type] ?? career.employment_type },
                                { label: 'Tipe', icon: 'building' as const, value: workplaceLabels[career.workplace_type] ?? career.workplace_type },
                            ].filter(item => item.value);
                            return <article className="career-item" key={career.id} aria-labelledby={`career-${career.id}`}>
                                <h3 id={`career-${career.id}`}>{career.title}</h3>
                                {metadata.length > 0 && <ul className="career-meta" aria-label="Informasi posisi">{metadata.map(item => <li key={item.label} aria-label={`${item.label}: ${item.value}`}><Icon name={item.icon} /><span>{item.value}</span></li>)}</ul>}
                                {(career.description || career.requirements || career.benefits) && <details className="career-details"><summary>Kualifikasi dan informasi posisi</summary>
                                    {career.description && <div><h4>Deskripsi pekerjaan</h4><p className="career-description">{career.description}</p></div>}
                                    {career.requirements && <div><h4>Kualifikasi</h4><p>{career.requirements}</p></div>}
                                    {career.benefits && <div><h4>Benefit</h4><p>{career.benefits}</p></div>}
                                </details>}
                                <div className="career-actions">
                                    {deadline && <p className="career-deadline">Batas lamaran<time dateTime={career.closing_date}>{deadline}</time></p>}
                                    {career.apply_url ? <a className="button button-primary" href={career.apply_url} target="_blank" rel="noopener noreferrer" aria-label={`Lamar ${career.title} (tab baru)`}>Lamar posisi ini <Icon name="diagonal" /></a> : <p>Link lamaran belum tersedia.</p>}
                                </div>
                            </article>;
                        })}</div>
                    </>}
                    {!careersUnavailable && pagination.last_page > 1 && <nav className="career-pagination" aria-label="Halaman lowongan">
                        {pagination.current_page > 1 && <Link className="button button-outline" href={`/karir?page=${pagination.current_page - 1}`} preserveScroll>Sebelumnya</Link>}
                        <span>Halaman {pagination.current_page} dari {pagination.last_page}</span>
                        {pagination.current_page < pagination.last_page && <Link className="button button-outline" href={`/karir?page=${pagination.current_page + 1}`} preserveScroll>Berikutnya</Link>}
                    </nav>}
                </section>
            </div>
            <RelatedPages />
        </main>
        <SiteFooter />
    </>;
}
