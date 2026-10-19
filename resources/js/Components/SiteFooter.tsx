import { Link, usePage } from '@inertiajs/react';
import { navigation } from '../navigation';
import FloatingConsultation from './FloatingConsultation';
import { getContextWhatsAppUrl, officialEmail, whatsappContact } from '../contact';
import SocialLinks from './SocialLinks';
import OfficeLocations from './OfficeLocations';

export default function SiteFooter() {
    const { url } = usePage();
    return <><footer className="site-footer">
        <div className="container">
            <div className="footer-main">
                <div className="footer-company">
                    <Link href="/" className="brand-logo-link footer-logo-link" aria-label="Konsulin.id, beranda"><img src="/images/footer.png" alt="Konsulin.id — Adi Putra & Partners" width="1620" height="720" loading="lazy" /></Link>
                    <h2>Konsulin.id — Adi Putra &amp; Partners</h2>
                    <p>Kantor Jasa Akuntan &amp; Konsultan Hukum Perpajakan</p>
                    <p>Accounting · Tax Consulting<br />Internal Audit · Business Advisory</p>
                </div>
                <nav className="footer-nav" aria-label="Navigasi footer">
                    <div>{navigation.slice(0, 3).map(item => <Link href={item.href} key={item.href}>{item.label}</Link>)}</div>
                    <div>{navigation.slice(3).map(item => <Link href={item.href} key={item.href}>{item.label}</Link>)}</div>
                </nav>
                <div className="footer-contact">
                    <h2>Kontak</h2>
                    <a href={getContextWhatsAppUrl(url, 'FT')} target="_blank" rel="noopener noreferrer" aria-label={`WhatsApp Konsulin: ${whatsappContact.displayNumber}`}>{whatsappContact.displayNumber}</a>
                    <a href={`mailto:${officialEmail}`}>{officialEmail}</a>
                    <h2 className="footer-social-heading">Sosial</h2>
                    <SocialLinks source="FS" />
                </div>
            </div>
            <OfficeLocations />
            <div className="footer-bottom"><span>© {new Date().getFullYear()} Konsulin.</span><span>Partner untuk langkah bisnis Anda.</span><Link href="/privasi">Privasi</Link></div>
        </div>
    </footer><FloatingConsultation /></>;
}
