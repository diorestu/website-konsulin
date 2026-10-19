import { Link, usePage } from '@inertiajs/react';
import { useId } from 'react';
import type { SeoMetadata } from './SeoHead';
import Icon from './Icon';

export default function RelatedPages() {
    const { seo } = usePage<{ seo: SeoMetadata }>().props;
    const headingId = useId();
    return <section className="related-pages container" aria-labelledby={headingId}>
        <h2 id={headingId}>{seo.relatedTitle}</h2>
        <ul>{seo.relatedLinks.map(link => <li key={link.href}><Link href={link.href}>{link.title}<Icon name="arrow" /></Link></li>)}</ul>
    </section>;
}
