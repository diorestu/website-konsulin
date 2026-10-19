import { useId } from 'react';
import { officeLocations } from '../contact';

export default function OfficeLocations({ showMaps = false }: { showMaps?: boolean }) {
    const headingId = useId();
    return <section className={`office-locations${showMaps ? ' office-locations-with-maps' : ''}`} aria-labelledby={headingId}>
        <h2 id={headingId}>Kantor Kami</h2>
        <div className="office-grid">{officeLocations.map(office => <article key={office.name}>
            <h3>{office.name}</h3>
            {showMaps && <div className="office-map">
                <iframe title={`Peta kantor Konsulin ${office.name}`} src={`https://maps.google.com/maps?q=${encodeURIComponent(office.address)}&z=15&output=embed`} loading="lazy" allowFullScreen referrerPolicy="no-referrer-when-downgrade" />
                <a className="text-link" href={`https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(office.address)}`} target="_blank" rel="noopener noreferrer">Buka di Google Maps <span aria-hidden="true">↗</span></a>
            </div>}
            <address><p>{office.address}</p></address>
        </article>)}</div>
    </section>;
}
