const expertise = [
    { title: 'Accounting', image: '/images/business-desk.jpg', alt: 'Ilustrasi laptop yang menampilkan grafik dan ringkasan data' },
    { title: 'Tax Consulting', image: '/images/expertise-tax.jpg', alt: 'Ilustrasi penataan dokumen dan perhitungan keuangan di meja kerja' },
    { title: 'Internal Audit', image: '/images/expertise-audit.jpg', alt: 'Ilustrasi penelaahan dokumen dalam pembahasan profesional' },
    { title: 'Business Advisory', image: '/images/expertise-advisory.jpg', alt: 'Ilustrasi diskusi dan kolaborasi tim di ruang kerja' },
];

export default function ExpertiseSection() {
    return <section id="expertise" className="expertise-section section-pad" aria-labelledby="expertise-heading"><div className="container">
        <div className="expertise-heading" data-reveal><h2 id="expertise-heading">Our Expertise</h2><p>Empat bidang untuk mendampingi kebutuhan keuangan dan pajak Anda.</p></div>
        <div className="expertise-grid" data-reveal>{expertise.map(item => <figure className="expertise-card" key={item.title}><img src={item.image} alt={item.alt} width="800" height="600" loading="lazy" /><figcaption>{item.title}</figcaption></figure>)}</div>
    </div></section>;
}
