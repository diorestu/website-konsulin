import { usePage } from '@inertiajs/react';
import { getContextWhatsAppUrl, socialLinks } from '../contact';

export default function SocialLinks({ source = 'SOC' }: { source?: 'SOC' | 'FS' }) {
    const { url } = usePage();
    return <ul className="social-links" aria-label="Media sosial Konsulin">
        {socialLinks.map(social => <li key={social.name}><a href={social.name === 'WhatsApp' ? getContextWhatsAppUrl(url, source) : social.href} target="_blank" rel="noopener noreferrer" aria-label={`${social.name} Konsulin (tab baru)`}><img src={social.icon} alt="" width="24" height="24" loading="lazy" /></a></li>)}
    </ul>;
}
