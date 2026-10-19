import { usePage } from '@inertiajs/react';
import { getContextWhatsAppUrl } from '../contact';

export default function FloatingConsultation() {
    const { url } = usePage();
    return <a className="floating-consultation" href={getContextWhatsAppUrl(url, 'FL')} target="_blank" rel="noopener noreferrer" aria-label="WhatsApp Konsulin: konsultasi sekarang (tab baru)">
        <span className="floating-consultation-label"><span>Butuh Bantuan?</span><strong>Konsultasi Sekarang</strong></span>
        <span className="floating-consultation-icon"><span className="whatsapp-mark" aria-hidden="true" /></span>
    </a>;
}
