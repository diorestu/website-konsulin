const directors = [
    {
        name: 'Adi Putra Rizkillah',
        credentials: 'S.Ak, CFA, CTT, CPFP',
        role: 'Founder & Direktur Utama',
        photo: { src: '/images/directors/adi-putra-rizkillah.jpg', width: 1414, height: 2000 },
    },
    {
        name: 'M. AGUSTIAWAN SAPUTRA',
        credentials: 'SM., MM., Ak., CA., CPMA., ASEAN CPA., CTA., CBPA., CTT., CPTT., BKP',
        role: 'Direktur & Partner',
        photo: { src: '/images/directors/saputra.jpg', width: 1414, height: 2000 },
    },
    {
        name: 'MAS DANDY KUSDAJANTO',
        credentials: 'Drs., M.M., BKP',
        role: 'Komisaris & Senior Advisor (Ex. Kepala Kantor Pajak)',
        photo: { src: '/images/directors/mas-dandy-kusdajanto.jpg', width: 1414, height: 2000 },
    },
    {
        name: 'Drs. Haposan Lumban Gaol',
        credentials: 'S.H., M.M.',
        role: 'Ex.Hakim Pengadilan Pajak & Partner',
        photo: { src: '/images/directors/haposan-lumban-gaol.jpg', width: 1414, height: 2000 },
    },
    {
        name: 'Ni Putu Sintya Bhakti Pratiwi',
        credentials: 'S.S.T.Ak., B.K.P.',
        role: 'Senior Manager',
        photo: { src: '/images/directors/ni-putu-sintya-bhakti-pratiwi.jpg', width: 1414, height: 2000 },
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
