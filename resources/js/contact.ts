const whatsappNumbers = { primary: '6285183440300', admin2: '6281908797799' };
type WhatsAppRecipient = keyof typeof whatsappNumbers;

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

const getServiceCode = (id: string) => Object.hasOwn(serviceWhatsAppCodes, id) ? serviceWhatsAppCodes[id] : undefined;

export const getWhatsAppPageCode = (pageUrl: string) => {
    const url = new URL(pageUrl, 'https://konsulin.id');
    const path = url.pathname.replace(/\/$/, '') || '/';
    if (path.startsWith('/layanan/')) return `DL-${getServiceCode(path.split('/')[2]) ?? 'LYN'}`;
    const pages: Record<string, string> = { '/': 'LP', '/tentang-kami': 'TK', '/our-value': 'NK', '/layanan': 'LY', '/blog': 'BL', '/kontak': 'KT', '/privasi': 'PR' };
    const code = pages[path] ?? 'WEB';
    const selectedId = url.searchParams.get('layanan') ?? '';
    const selectedService = getServiceCode(selectedId);
    return path === '/kontak' && selectedService ? `${code}-${selectedService}` : code;
};

export const getWhatsAppUrl = (message?: string, reference = 'WEB', recipient: WhatsAppRecipient = 'primary') => {
    const text = message ?? 'Halo Konsulin, saya ingin berkonsultasi mengenai layanan keuangan dan pajak.';
    return `https://wa.me/${whatsappNumbers[recipient]}?text=${encodeURIComponent(`${text} [${reference}]`)}`;
};

export const getServiceWhatsAppUrl = (service: { id: string; name: string }, pageUrl: string) => {
    const pageCode = getWhatsAppPageCode(pageUrl);
    const serviceCode = getServiceCode(service.id) ?? 'LYN';
    const reference = pageCode === `DL-${serviceCode}` ? pageCode : `${pageCode}-${serviceCode}`;
    return getWhatsAppUrl(`Hi Konsulin, saya ingin konsultasi tentang layanan ${service.name}.`, reference);
};

export const getContextWhatsAppUrl = (pageUrl: string, placement: 'CTA' | 'FT' | 'FS' | 'FL' | 'NO' | 'SOC', recipient: WhatsAppRecipient = 'primary') => getWhatsAppUrl(undefined, `${getWhatsAppPageCode(pageUrl)}-${placement}${recipient === 'admin2' ? '-A2' : ''}`, recipient);

export const whatsappContact = {
    displayNumber: '+62 851 8344 0300',
    url: getWhatsAppUrl(),
};

export const whatsappAdmin2Contact = {
    displayNumber: '+62 819 0879 7799',
};

export let officialEmail = 'info@konsulin.id';

export const socialLinks = [
    { name: 'WhatsApp', href: whatsappContact.url, icon: '/images/whatsapp.svg' },
    { name: 'Instagram', href: 'https://www.instagram.com/konsulinn.id/', icon: '/images/instagram.svg' },
    { name: 'TikTok', href: 'https://www.tiktok.com/@lifeatkonsulin', icon: '/images/tiktok.svg' },
    { name: 'LinkedIn', href: 'https://www.linkedin.com/company/konsulinid', icon: '/images/linkedin.svg' },
];

export const officeLocations: {name: string; address: string; map_url?: string; map_embed_url?: string}[] = [
    { name: 'HQ Tangerang', address: 'Greenwich Business Park, Blok B1 Kec Pagedangan, Kabupaten Tangerang, Banten 15331' },
    { name: 'Branch Bali', address: "De' Black House, Jl. Kusuma Bangsa VII No.71 Lantai 2, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80111" },
    { name: 'Branch Surabaya', address: 'Ruko Jemursari blok D12 No 203 RT03/RW08, Jlan Margorejo Indah XX Kel. Sidosermo, Kec. Wonocolo, Surabaya, Jawa Timur 60239' },
];

export function configureContacts(site?: { whatsapp_primary: string; whatsapp_secondary: string; email: string; instagram: string | null; tiktok: string | null; linkedin: string | null; offices: { name: string; address: string; map_url?: string; map_embed_url?: string }[] }) {
    if (!site) return;
    whatsappNumbers.primary = site.whatsapp_primary;
    whatsappNumbers.admin2 = site.whatsapp_secondary;
    whatsappContact.displayNumber = `+${site.whatsapp_primary}`;
    whatsappContact.url = getWhatsAppUrl();
    whatsappAdmin2Contact.displayNumber = `+${site.whatsapp_secondary}`;
    officialEmail = site.email;
    socialLinks.splice(0, socialLinks.length,
        { name: 'WhatsApp', href: whatsappContact.url, icon: '/images/whatsapp.svg' },
        ...[['Instagram', site.instagram, '/images/instagram.svg'], ['TikTok', site.tiktok, '/images/tiktok.svg'], ['LinkedIn', site.linkedin, '/images/linkedin.svg']]
            .filter((entry): entry is [string, string, string] => Boolean(entry[1]))
            .map(([name, href, icon]) => ({ name, href, icon })),
    );
    officeLocations.splice(0, officeLocations.length, ...site.offices);
}
