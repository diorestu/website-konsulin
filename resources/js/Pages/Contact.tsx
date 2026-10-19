import PageShell from '../Components/PageShell';
import ConsultationForm from '../Components/ConsultationForm';
import type { Service } from '../types';
import { officialEmail, whatsappContact } from '../contact';
import SocialLinks from '../Components/SocialLinks';
import OfficeLocations from '../Components/OfficeLocations';

export default function Contact({ services, selectedService = '' }: { services: Service[]; selectedService?: string }) {
    return <PageShell title="Kontak" description="Ceritakan kebutuhan pajak, akuntansi, atau pengelolaan usaha yang ingin Anda diskusikan.">
        <section id="konsultasi" className="consultation-section section-pad"><div className="container consultation-grid">
            <div className="contact-intro"><h2>Mari mulai<br />percakapan.</h2><p>Gunakan formulir untuk menjelaskan kebutuhan Anda dan memilih layanan yang sesuai.</p><div className="contact-direct-links"><a href={`mailto:${officialEmail}`}>{officialEmail}</a><a href={whatsappContact.url} target="_blank" rel="noopener noreferrer">{whatsappContact.displayNumber}</a></div><SocialLinks /><p>Tidak perlu mengirimkan dokumen keuangan, kata sandi, atau kode verifikasi pada tahap awal.</p></div>
            <ConsultationForm services={services} selectedService={selectedService} />
        </div></section>
        <div className="container"><OfficeLocations showMaps /></div>
    </PageShell>;
}
