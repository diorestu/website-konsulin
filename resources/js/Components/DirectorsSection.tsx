const directors = [
    {
        name: 'Adi Putra Rizkillah',
        credentials: 'S.Ak, CFA, CTT, CPFP',
        role: 'Founder & Direktur Utama',
        photo: { src: '/images/directors/adi-putra-rizkillah.jpeg', width: 1126, height: 1397 },
    },
    {
        name: 'M. AGUSTIAWAN SAPUTRA',
        credentials: 'SM., MM., Ak., CA., CPMA., ASEAN CPA., CTA., CBPA., CTT., CPTT., BKP',
        role: 'Direktur & Partner',
        photo: { src: '/images/directors/saputra.jpeg', width: 1024, height: 1121 },
    },
    {
        name: 'MAS DANDY KUSDAJANTO',
        credentials: 'Drs., M.M., BKP',
        role: 'Komisaris & Senior Advisor',
        photo: { src: '/images/directors/mas-dandy-kusdajanto.jpeg', width: 1086, height: 1448 },
    },
    {
        name: 'Ni Putu Sintya Bhakti Pratiwi',
        credentials: '',
        role: 'Senior Manager',
        photo: { src: '/images/directors/ni-putu-sintya-bhakti-pratiwi.png', width: 1021, height: 1540 },
    },
];

export default function DirectorsSection() {
    return <section id="direksi" className="directors-section container" aria-labelledby="directors-heading">
        <h2 id="directors-heading">Temui Direksi Kami</h2>
        <div className="directors-grid">{directors.map(director => <article className={`director-card${director.photo ? '' : ' director-card--text-only'}`} key={director.name}>
            {director.photo && <div className="director-photo-frame"><img className="director-photo" src={director.photo.src} alt={`Foto ${director.name}`} width={director.photo.width} height={director.photo.height} loading="lazy" decoding="async" /></div>}
            <div className="director-body">
                <h3>{director.name}</h3>
                {director.credentials && <p className="director-credentials">{director.credentials}</p>}
                <p className="director-role">{director.role}</p>
            </div>
        </article>)}</div>
    </section>;
}
