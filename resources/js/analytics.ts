import { router } from '@inertiajs/react';
import type { SeoMetadata } from './Components/SeoHead';

declare global {
    interface Window {
        dataLayer?: unknown[];
        gtag?: (...args: unknown[]) => void;
        fbq?: (...args: unknown[]) => void;
    }
}

let enabled = false;
let pageLocation = '';

export function trackContactEvent(channel: 'whatsapp' | 'email' | 'consultation_form', reference?: string) {
    if (!enabled) return;
    window.gtag?.('event', channel === 'consultation_form' ? 'generate_lead' : 'contact_click', {
        contact_method: channel,
        page_location: pageLocation,
        ...(reference ? { cta_reference: reference } : {}),
    });
    window.dataLayer?.push({ event: channel === 'consultation_form' ? 'konsulin_generate_lead' : 'konsulin_contact_click', contact_method: channel, page_location: pageLocation, ...(reference ? { cta_reference: reference } : {}) });
    window.fbq?.('track', channel === 'consultation_form' ? 'Lead' : 'Contact');
}

export function setupAnalytics(initialPage: { props: Record<string, unknown> }) {
    const initialSeo = initialPage.props.seo as SeoMetadata;
    const id = initialSeo?.analyticsId;
    if ((!id && !initialSeo?.tagManagerId && !initialSeo?.metaPixelId) || enabled) return;
    enabled = true;
    window.dataLayer = window.dataLayer || [];
    if (id && /^G-[A-Z0-9]+$/.test(id)) {
        window.gtag = window.gtag || function () { window.dataLayer?.push(arguments); };
        window.gtag('js', new Date());
        window.gtag('config', id, { send_page_view: false, allow_google_signals: false, allow_ad_personalization_signals: false });
    }

    const sendPage = (seo: SeoMetadata) => {
        if (pageLocation === seo.canonical) return;
        const referrer = pageLocation || (document.referrer ? new URL(document.referrer).origin + new URL(document.referrer).pathname : '');
        pageLocation = seo.canonical;
        window.gtag?.('event', 'page_view', {
            page_title: `${seo.title} — Konsulin`,
            page_location: seo.canonical,
            page_referrer: referrer,
        });
        window.dataLayer?.push({ event: 'konsulin_page_view', page_title: `${seo.title} — Konsulin`, page_location: seo.canonical, page_referrer: referrer });
        window.fbq?.('track', 'PageView');
    };
    sendPage(initialSeo);
    router.on('navigate', event => sendPage(event.detail.page.props.seo as SeoMetadata));
    document.addEventListener('click', event => {
        const target = event.target instanceof Element ? event.target.closest('a[href]') as HTMLAnchorElement | null : null;
        if (!target) return;
        const url = new URL(target.href);
        if (url.hostname === 'wa.me') trackContactEvent('whatsapp', url.searchParams.get('text')?.match(/\[([A-Z0-9-]+)\]$/)?.[1]);
        else if (url.protocol === 'mailto:') trackContactEvent('email');
    });
    if (id && /^G-[A-Z0-9]+$/.test(id)) {
        const script = document.createElement('script');
        script.async = true;
        script.src = `https://www.googletagmanager.com/gtag/js?id=${id}`;
        document.head.appendChild(script);
    }
}
