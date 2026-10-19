import { Head, Link } from '@inertiajs/react';
import { useEffect, useRef } from 'react';
import SiteHeader from '../Components/SiteHeader';
import SiteFooter from '../Components/SiteFooter';
import Icon from '../Components/Icon';
import HeroCarousel from '../Components/HeroCarousel';
import AboutSection from '../Components/AboutSection';
import DirectorsSection from '../Components/DirectorsSection';
import ServiceDirectory from '../Components/ServiceDirectory';
import { whatsappContact } from '../contact';
import type { Service } from '../types';

const faqs = [
    ['Apakah Konsulin cocok untuk usaha yang baru mulai?', 'Anda bisa memulai dengan mendiskusikan kondisi usaha saat ini. Kebutuhan pencatatan, administrasi, dan perpajakan dipetakan terlebih dahulu agar ruang lingkup pendampingan sesuai tahap usaha.'],
    ['Bagaimana biaya layanan ditentukan?', 'Biaya dibahas setelah kebutuhan dan ruang lingkup pekerjaan dipahami. Jenis layanan, kelengkapan dokumen, dan kompleksitas usaha menjadi bahan pembicaraan sebelum pekerjaan dimulai.'],
    ['Apa yang perlu disiapkan untuk diskusi awal?', 'Cukup ceritakan jenis usaha, kebutuhan yang ingin diselesaikan, dan kendala yang sedang dihadapi. Jangan mengirim kata sandi atau dokumen sensitif melalui formulir awal.'],
    ['Bisakah saya memilih satu layanan saja?', 'Bisa. Anda dapat mendiskusikan satu kebutuhan tertentu maupun pendampingan berkala. Ruang lingkup dan cara kerja disepakati sebelum pekerjaan dimulai.'],
];
const steps = [
    ['Kenali kebutuhan', 'Kita mulai dari cerita dan kondisi usaha Anda.'],
    ['Sepakati lingkup', 'Tentukan prioritas, pekerjaan, dan cara berkomunikasi.'],
    ['Siapkan dokumen', 'Lengkapi informasi yang memang dibutuhkan.'],
    ['Kerjakan & evaluasi', 'Tinjau hasil dan diskusikan langkah selanjutnya.'],
];

export default function Home({ services, selectedService = '' }: { services: Service[]; selectedService?: string }) {
    const root = useRef<HTMLDivElement>(null);
    const consultationUrl = selectedService ? `/kontak?layanan=${encodeURIComponent(selectedService)}#konsultasi` : '/kontak#konsultasi';
    useEffect(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) { entry.target.classList.add('is-visible'); observer.unobserve(entry.target); }
            });
        }, { threshold: 0.08 });
        const elements = root.current?.querySelectorAll('[data-reveal]');
        elements?.forEach(el => { el.classList.add('will-reveal'); observer.observe(el); });
        return () => observer.disconnect();
    }, []);

    return <div ref={root}>
        <Head title="Konsultan Keuangan & Pajak Terpercaya"><meta name="description" head-key="description" content="Konsulin membantu kebutuhan pajak, akuntansi, dan administrasi usaha Anda. Temukan layanan yang sesuai dan mulai diskusikan kebutuhan bisnis Anda." /><meta property="og:title" content="Konsulin — Konsultan Keuangan & Pajak Terpercaya" /><meta property="og:description" content="Partner untuk kebutuhan pajak, akuntansi, dan administrasi usaha Anda." /></Head>
        <SiteHeader />
        <main id="main">
            <section className="hero container" aria-labelledby="hero-heading">
                <div className="hero-copy">
                    <h1 id="hero-heading">Konsultan Keuangan &amp; Pajak <span>Terpercaya</span></h1>
                    <p className="hero-description">Kami membantu Anda mengelola pajak dan keuangan agar lebih tenang menjalankan dan mengembangkan usaha.</p>
                    <div className="hero-actions"><Link className="button button-primary" href={consultationUrl}>Hubungi Kami <Icon name="diagonal" /></Link><a className="hero-secondary" href="#layanan">Jelajahi layanan <Icon name="down" /></a></div>
                </div>
                <HeroCarousel />
            </section>
            <AboutSection showLink />
            <div className="home-management"><DirectorsSection /></div>
            <section id="layanan" className="services-section section-pad" aria-labelledby="services-heading">
                <div className="container"><div className="section-heading" data-reveal><h2 id="services-heading">Pilih Layanan Pajak dan Akuntansi yang Anda Butuhkan.</h2></div><div data-reveal><ServiceDirectory services={services} directWhatsApp /></div></div>
            </section>

            <section id="cara-kerja" className="process-section section-pad" aria-labelledby="process-heading"><div className="container"><div className="process-heading" data-reveal><h2 id="process-heading">Langkah kecil.<br />Arah yang lebih jelas.</h2><p>Tidak perlu memahami semuanya sekaligus.<br />Kita mulai dari percakapan.</p></div><ol className="process-list" data-reveal>{steps.map(([name, description], index) => <li key={name}><span className="step-number">0{index + 1}</span><h3>{name}</h3><p>{description}</p></li>)}</ol></div></section>

            <section className="faq-section container section-pad" aria-labelledby="faq-heading"><div className="faq-intro" data-reveal><p className="section-caption">Sebelum kita mulai</p><h2 id="faq-heading">Mungkin ini<br /><span>yang Anda pikirkan.</span></h2><p>Belum menemukan jawaban yang dicari?<br />Ceritakan lewat formulir konsultasi.</p><Link className="text-link" href={consultationUrl}>Ajukan pertanyaan <Icon name="arrow" /></Link></div><div className="faq-list" data-reveal>{faqs.map(([question, answer], index) => <details key={question} name="faq" open={index === 0 ? true : undefined}><summary>{question}<Icon name="plus" /></summary><div className="faq-answer"><p>{answer}</p></div></details>)}</div></section>

            <section id="konsultasi" className="consultation-section section-pad" aria-labelledby="consultation-heading"><div className="container home-contact-callout" data-reveal>
                <div><h2 id="consultation-heading">Ada yang ingin Anda bereskan?</h2><p>Ceritakan kebutuhan keuangan dan pajak Anda. Kita mulai dari percakapan.</p></div>
                <div className="home-contact-actions"><a className="button button-primary" href={whatsappContact.url} target="_blank" rel="noopener noreferrer">Hubungi WhatsApp</a><Link className="text-link" href={consultationUrl}>Halaman Kontak</Link></div>
            </div></section>
        </main>
        <SiteFooter />
    </div>;
}
