import { Link } from '@inertiajs/react';
import PageShell from '../Components/PageShell';
import PageBanner from '../Components/PageBanner';

const values = [
    { title: 'Pelayanan Terbaik', description: 'Kami memiliki strategi untuk menyajikan sesuatu dengan benar.' },
    { title: 'Kolaborasi', description: 'Menjaga hormat diri, hubungan positif, dan lingkungan kerja' },
    { title: 'Hadirkan Solusi', description: 'Selalu membuka dan mencari solusi untuk kesuksesan bisnis.' },
    { title: 'Integritas', description: 'Bertindak jujur dan berintegritas sesuai kode etik profesi.' },
];

const companyValues = [
    'Akurat, Efektif, Efisien',
    'Bersertifikat Konsultan Pajak Terdaftar',
    'Bersertifikat Kuasa Hukum Pengadilan Perpajakan Resmi',
    'Certified Professional Financial Planner',
    'Certified Financial Advisors',
];

export default function Values() {
    return <PageShell title="Nilai Kami" description="Pelayanan Terbaik, Kolaborasi, Hadirkan Solusi, dan Integritas menjadi nilai dalam pelayanan Konsulin."
        pageHeader={<PageBanner title="Nilai Kami" />}>
        <section className="container values-company-intro" aria-labelledby="company-values-heading">
            <h2 id="company-values-heading">Nilai Perusahaan</h2>
            <p>Konsulin merupakan jasa akuntan dan konsultan yang profesional, berintegritas, berkualitas, dan berkompetensi dalam rangka mendorong terwujudnya good governance di Indonesia</p>
        </section>
        <section className="container values-grid">{values.map(value => <article key={value.title}><h2>{value.title}</h2><p>{value.description}</p></article>)}</section>
        <section className="company-values-section" aria-labelledby="focus-goal-heading"><div className="container company-values-layout">
            <div><h2 id="focus-goal-heading">Focus On Goal</h2><p>Kami memberikan jasa profesional konsultasi usaha dengan kompetensi tinggi, integeritas, obyektif dan sesuai standar profesional yang berlaku.</p></div>
            <ul className="company-value-points">{companyValues.map(value => <li key={value}>{value}</li>)}</ul>
        </div></section>
        <div className="container values-contact"><Link className="text-link" href="/kontak">Diskusikan kebutuhan Anda</Link></div>
    </PageShell>;
}
