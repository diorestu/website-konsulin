import PageShell from '../Components/PageShell';
import { usePage } from '@inertiajs/react';
import PageBanner from '../Components/PageBanner';
import ConsultationForm from '../Components/ConsultationForm';
import type { Service } from '../types';
import { getContextWhatsAppUrl, officialEmail, whatsappContact } from '../contact';
import SocialLinks from '../Components/SocialLinks';
import OfficeLocations from '../Components/OfficeLocations';

export default function Contact({ services, selectedService = '' }: { services: Service[]; selectedService?: string }) {
    const { url } = usePage();
    return <PageShell title="Kontak" description="Ceritakan kebutuhan pajak, akuntansi, atau pengelolaan usaha yang ingin Anda diskusikan." pageHeader={<PageBanner title="Kontak" />}>
        <section id="konsultasi" className="consultation-section section-pad"><div className="container consultation-grid">
            <div className="contact-intro"><h2>Mari mulai<br />percakapan.</h2><div className="contact-direct-links"><a href={`mailto:${officialEmail}`}>{officialEmail}</a><a href={getContextWhatsAppUrl(url, 'NO')} target="_blank" rel="noopener noreferrer">{whatsappContact.displayNumber}</a></div><SocialLinks /></div>
            <ConsultationForm services={services} selectedService={selectedService} />
        </div></section>
        <div className="container"><OfficeLocations showMaps /></div>
    </PageShell>;
}
