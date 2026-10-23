import type { SiteSettings } from '../types';
import { Link, usePage } from '@inertiajs/react';
import { navigation } from '../navigation';
import FloatingConsultation from './FloatingConsultation';
import { getContextWhatsAppUrl, officialEmail, whatsappAdmin2Contact, whatsappContact } from '../contact';
import SocialLinks from './SocialLinks';
import OfficeLocations from './OfficeLocations';

export default function SiteFooter() {
    const { url, props: { site } } = usePage<{site: SiteSettings}>();
    return <><footer className="site-footer">
        <div className="container">
            <div className="footer-main">
                <div className="footer-company">
                    <Link href="/" className="brand-logo-link footer-logo-link" aria-label="Konsulin.id, beranda"><img src="/images/footer.png" alt="Konsulin.id — Adi Putra & Partners" width="1620" height="720" loading="lazy" /></Link>
                    <h2>{site.brand_name}</h2>
                    <p>{site.brand_description}</p>
                    <p style={{ whiteSpace: 'pre-line' }}>{site.brand_services}</p>
                </div>
                <nav className="footer-nav" aria-label="Navigasi footer">
                    <div>{navigation.slice(0, 3).map(item => <Link href={item.href} key={item.href}>{item.label}</Link>)}</div>
                    <div>{navigation.slice(3).map(item => <Link href={item.href} key={item.href}>{item.label}</Link>)}</div>
                </nav>
                <div className="footer-contact">
                    <h2>Kontak</h2>
                    <a href={getContextWhatsAppUrl(url, 'FT')} target="_blank" rel="noopener noreferrer" aria-label={`WhatsApp Admin 1 Konsulin: ${whatsappContact.displayNumber}`}>Admin 1: {whatsappContact.displayNumber}</a>
                    <a href={getContextWhatsAppUrl(url, 'FT', 'admin2')} target="_blank" rel="noopener noreferrer" aria-label={`WhatsApp Admin 2 Konsulin: ${whatsappAdmin2Contact.displayNumber}`}>Admin 2: {whatsappAdmin2Contact.displayNumber}</a>
                    <a href={`mailto:${officialEmail}`}>{officialEmail}</a>
                    <h2 className="footer-social-heading">Sosial</h2>
                    <SocialLinks source="FS" />
                </div>
            </div>
            <OfficeLocations />
            <div className="footer-bottom"><span>© {new Date().getFullYear()} Konsulin.</span><span>{site.footer_tagline}</span><Link href="/privasi">Privasi</Link></div>
        </div>
    </footer><FloatingConsultation /></>;
}
