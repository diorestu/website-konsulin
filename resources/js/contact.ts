const whatsappNumber = '6285183440300';

export const getWhatsAppUrl = (message?: string) => {
    const text = message ?? 'Halo Konsulin, saya ingin berkonsultasi mengenai layanan keuangan dan pajak.';
    return `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(text)}`;
};

export const getServiceWhatsAppUrl = (serviceName: string) => {
    return getWhatsAppUrl(`Halo Konsulin, saya ingin berkonsultasi mengenai layanan ${serviceName}.`);
};

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
