const whatsappNumber = '6285183440300';

export const serviceWhatsAppCodes: Record<string, string> = {
    'laporan-bulanan': 'LK',
    perpajakan: 'SPTM',
    'spt-tahunan': 'SPTT',
    'banding-gugatan': 'BG',
    akuntansi: 'LKF',
    'laporan-kap': 'KAP',
    'tax-opinion-investor-asing': 'TO',
    tpdoc: 'TPD',
    'restitusi-pajak': 'RP',
    konsultasi: 'BA',
    'pengukuhan-pkp': 'PKP',
    'coretax-pribadi': 'CTP',
    'coretax-badan': 'CTB',
};

export const getWhatsAppPageCode = (pageUrl: string) => {
    const url = new URL(pageUrl, 'https://konsulin.id');
    const path = url.pathname.replace(/\/$/, '') || '/';
    if (path.startsWith('/layanan/')) return `DL-${serviceWhatsAppCodes[path.split('/')[2]] ?? 'LYN'}`;
    const pages: Record<string, string> = { '/': 'LP', '/tentang-kami': 'TK', '/our-value': 'NK', '/layanan': 'LY', '/blog': 'BL', '/kontak': 'KT', '/privasi': 'PR' };
    const code = pages[path] ?? 'WEB';
    const selectedId = url.searchParams.get('layanan') ?? '';
    const selectedService = Object.hasOwn(serviceWhatsAppCodes, selectedId) ? serviceWhatsAppCodes[selectedId] : undefined;
    return path === '/kontak' && selectedService ? `${code}-${selectedService}` : code;
};

export const getWhatsAppUrl = (message?: string, reference = 'WEB') => {
    const text = message ?? 'Halo Konsulin, saya ingin berkonsultasi mengenai layanan keuangan dan pajak.';
    return `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(`${text} [${reference}]`)}`;
};

export const getServiceWhatsAppUrl = (service: { id: string; name: string }, pageUrl: string) => {
    return getWhatsAppUrl(`Hi Konsulin, saya ingin konsultasi tentang layanan ${service.name}.`, `${getWhatsAppPageCode(pageUrl)}-${serviceWhatsAppCodes[service.id] ?? 'LYN'}`);
};

export const getContextWhatsAppUrl = (pageUrl: string, placement: 'CTA' | 'FT' | 'FS' | 'FL' | 'NO' | 'SOC') => getWhatsAppUrl(undefined, `${getWhatsAppPageCode(pageUrl)}-${placement}`);

export const whatsappContact = {
    displayNumber: '+62 851 8344 0300',
    url: getWhatsAppUrl(),
};

export const officialEmail = 'info@konsulin.id';

export const socialLinks = [
    { name: 'WhatsApp', href: whatsappContact.url, icon: '/images/whatsapp.svg' },
    { name: 'Instagram', href: 'https://www.instagram.com/konsulinn.id/', icon: '/images/instagram.svg' },
    { name: 'TikTok', href: 'https://www.tiktok.com/@lifeatkonsulin', icon: '/images/tiktok.svg' },
    { name: 'LinkedIn', href: 'https://www.linkedin.com/company/konsulinid', icon: '/images/linkedin.svg' },
];

export const officeLocations = [
    { name: 'HQ Tangerang', address: 'Greenwich Business Park, Blok B1 Kec Pagedangan, Kabupaten Tangerang, Banten 15331' },
    { name: 'Branch Bali', address: "De' Black House, Jl. Kusuma Bangsa VII No.71 Lantai 2, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80111" },
    { name: 'Branch Surabaya', address: 'Ruko Jemursari blok D12 No 203 RT03/RW08, Jlan Margorejo Indah XX Kel. Sidosermo, Kec. Wonocolo, Surabaya, Jawa Timur 60239' },
];
