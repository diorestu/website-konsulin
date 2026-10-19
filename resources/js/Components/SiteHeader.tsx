import { Link, usePage } from '@inertiajs/react';
import { useEffect, useRef, useState } from 'react';
import Icon from './Icon';
import { navigation } from '../navigation';

export default function SiteHeader() {
    const [open, setOpen] = useState(false);
    const toggle = useRef<HTMLButtonElement>(null);
    const menu = useRef<HTMLElement>(null);
    const pathname = usePage().url.split(/[?#]/)[0];
    const isActive = (href: string) => pathname === href || (href !== '/' && pathname.startsWith(`${href}/`));

    useEffect(() => { setOpen(false); }, [pathname]);

    useEffect(() => {
        if (!open) return;
        const onKey = (event: KeyboardEvent) => {
            if (event.key === 'Escape') {
                setOpen(false);
                toggle.current?.focus();
            }
        };
        const onClick = (event: MouseEvent) => {
            if (!menu.current?.contains(event.target as Node) && !toggle.current?.contains(event.target as Node)) setOpen(false);
        };
        document.addEventListener('keydown', onKey);
        document.addEventListener('click', onClick);
        return () => { document.removeEventListener('keydown', onKey); document.removeEventListener('click', onClick); };
    }, [open]);

    return <>
        <a className="skip-link" href="#main">Langsung ke konten</a>
        <header className="site-header">
            <div className="container header-inner">
                <Link href="/" className="brand-logo-link header-logo-link" aria-label="Konsulin.id, beranda">
                    <img src="/images/header.png" alt="Konsulin.id — Adi Putra & Partners" width="1620" height="720" />
                </Link>
                <nav className="desktop-nav" aria-label="Navigasi utama">
                    {navigation.map(item => <Link key={item.href} href={item.href} aria-current={isActive(item.href) ? 'page' : undefined}>{item.label}</Link>)}
                </nav>
                <div className="header-actions">
                    <button ref={toggle} type="button" className="menu-toggle" aria-expanded={open} aria-controls="mobile-navigation" aria-label={open ? 'Tutup menu' : 'Buka menu'} onClick={() => setOpen(value => !value)}><span className="menu-glyph" aria-hidden="true"><span /><span /><span /></span></button>
                </div>
            </div>
            <nav ref={menu} id="mobile-navigation" className={`mobile-nav ${open ? 'is-open' : ''}`} aria-label="Navigasi seluler" inert={!open}>
                {navigation.map(item => <Link key={item.href} href={item.href} aria-current={isActive(item.href) ? 'page' : undefined} onClick={() => setOpen(false)}>{item.label}<Icon name="arrow" /></Link>)}
            </nav>
        </header>
    </>;
}
