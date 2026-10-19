import { whatsappContact } from '../contact';

export default function FloatingConsultation() {
    return <a className="floating-consultation" href={whatsappContact.url} target="_blank" rel="noopener noreferrer" aria-label="WhatsApp Konsulin: konsultasi sekarang (tab baru)">
        <span className="floating-consultation-label"><span>Butuh Bantuan?</span><strong>Konsultasi Sekarang</strong></span>
        <span className="floating-consultation-icon"><span className="whatsapp-mark" aria-hidden="true" /></span>
    </a>;
}
