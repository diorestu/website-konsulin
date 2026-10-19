import { Head, usePage } from '@inertiajs/react';

export type SeoMetadata = {
    title: string;
    description: string;
    canonical: string;
    image: string;
    robots: string;
    analyticsId: string | null;
    tagManagerId: string | null;
    metaPixelId: string | null;
    relatedLinks: { title: string; href: string }[];
    relatedTitle: string;
    schema: Record<string, unknown>;
};

export default function SeoHead() {
    const { seo } = usePage<{ seo: SeoMetadata }>().props;
    return <Head title={seo.title}>
        <meta name="description" head-key="description" content={seo.description} />
        <meta name="robots" head-key="robots" content={seo.robots} />
        <link rel="canonical" head-key="canonical" href={seo.canonical} />
        <meta property="og:title" head-key="og:title" content={`${seo.title} — Konsulin`} />
        <meta property="og:description" head-key="og:description" content={seo.description} />
        <meta property="og:url" head-key="og:url" content={seo.canonical} />
        <meta property="og:image" head-key="og:image" content={seo.image} />
        <meta name="twitter:title" head-key="twitter:title" content={`${seo.title} — Konsulin`} />
        <meta name="twitter:description" head-key="twitter:description" content={seo.description} />
        <meta name="twitter:image" head-key="twitter:image" content={seo.image} />
        <script type="application/ld+json" head-key="breadcrumbs" dangerouslySetInnerHTML={{ __html: JSON.stringify(seo.schema).replace(/</g, '\\u003c') }} />
    </Head>;
}
