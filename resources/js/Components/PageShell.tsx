import { useEffect, useRef } from 'react';
import type { ReactNode } from 'react';
import SiteHeader from './SiteHeader';
import SiteFooter from './SiteFooter';
import Breadcrumbs from './Breadcrumbs';
import SeoHead from './SeoHead';
import RelatedPages from './RelatedPages';

export default function PageShell({ title, description, children, pageHeader }: { title: string; description: string; children: ReactNode; pageHeader?: ReactNode }) {
    const main = useRef<HTMLElement>(null);
    useEffect(() => { main.current?.focus({ preventScroll: true }); }, [title]);

    return <>
        <SeoHead />
        <SiteHeader />
        <main id="main" tabIndex={-1} ref={main} className="public-page">
            {pageHeader ?? <header className="public-page-heading container"><Breadcrumbs title={title} /><h1>{title}</h1><p>{description}</p></header>}
            {children}
            <RelatedPages />
        </main>
        <SiteFooter />
    </>;
}
