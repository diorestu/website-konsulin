export type Service = {
    id: string;
    number: string;
    name: string;
    summary: string;
    description: string;
    scope: string[];
    preparation: string[];
};

export type SiteSettings = {
    brand_name: string;
    brand_description: string;
    brand_services: string;
    footer_tagline: string;
    whatsapp_primary: string;
    whatsapp_secondary: string;
    email: string;
    instagram: string | null;
    tiktok: string | null;
    linkedin: string | null;
    offices: { name: string; address: string }[];
};
