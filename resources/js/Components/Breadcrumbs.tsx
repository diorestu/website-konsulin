import { Link } from '@inertiajs/react';

export default function Breadcrumbs({ title, parent }: { title: string; parent?: { title: string; href: string } }) {
    return <nav className="page-breadcrumb" aria-label="Breadcrumb">
        <ol>
            <li><Link href="/">Beranda</Link></li>
            {parent && <li><span aria-hidden="true">/</span><Link href={parent.href}>{parent.title}</Link></li>}
            <li><span aria-hidden="true">/</span><span aria-current="page">{title}</span></li>
        </ol>
    </nav>;
}
