import { Link, usePage } from '@inertiajs/react';
import Icon from './Icon';

const commitments = [
    'Akuntansi dan penyusunan laporan keuangan',
    'Konsultasi dan administrasi perpajakan',
    'Internal Audit dan Business Advisory',
    'Layanan untuk orang pribadi dan badan usaha',
    'Pendampingan sesuai kebutuhan usaha',
    'Ruang lingkup pekerjaan dibahas sejak awal',
    'Komunikasi yang jelas dan mudah dipahami',
    'Kehati-hatian dalam menangani informasi klien',
];

export default function AboutSection({ showLink = false, showCommitments = true }: { showLink?: boolean; showCommitments?: boolean }) {
    const { activeServiceIds } = usePage<{activeServiceIds: string[]}>().props;
    const serviceLink = (slug: string, label: string) => activeServiceIds.includes(slug) ? <Link href={`/layanan/${slug}`}>{label}</Link> : label;
    return <section id="tentang" className="company-section section-pad" aria-labelledby="company-heading">
        <div className="container">
            <div className="company-heading" data-reveal><h2 id="company-heading">Kami Mampu Memberikan Pelayanan Pajak dan Akuntansi Terbaik untuk Anda.</h2></div>
            <div className="company-overview" data-reveal>
                <figure className="company-image"><img src="/images/gallery/konsulin-4.jpg" alt="Diskusi tim Konsulin bersama klien di ruang pertemuan" width="1600" height="1315" loading="lazy" /></figure>
                <div className="company-story">
                    <p><strong>Konsulin.id — Adi Putra &amp; Partners</strong> adalah Kantor Jasa Akuntan &amp; Konsultan Hukum Perpajakan yang mendampingi kebutuhan akuntansi, perpajakan, dan pengelolaan usaha Anda.</p>
                    <p>Bidang layanan kami meliputi <strong>{serviceLink('akuntansi', 'Accounting')}, {serviceLink('perpajakan', 'Tax Consulting')}, Internal Audit, dan {serviceLink('konsultasi', 'Business Advisory')}.</strong> Dari laporan keuangan dan pajak rutin hingga kebutuhan pendampingan khusus, pembahasan dimulai dengan memahami kondisi serta prioritas klien.</p>
                    <p>Melalui komunikasi yang jelas dan langkah kerja yang disepakati bersama, Konsulin.id membantu Anda memetakan kebutuhan, menyiapkan informasi, dan menentukan ruang lingkup layanan yang sesuai dengan tahap usaha.</p>
                </div>
            </div>
            {showCommitments && <ul className="company-commitments" data-reveal>{commitments.map(commitment => <li key={commitment}><Icon name="check" /><span>{commitment}</span></li>)}</ul>}
            {showLink && <Link className="text-link" href="/tentang-kami">Selengkapnya tentang kami <Icon name="arrow" /></Link>}
        </div>
    </section>;
}
