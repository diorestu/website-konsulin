import { Head, Link, usePage } from '@inertiajs/react';
import { useEffect, useRef, useState, type ReactNode } from 'react';

type AdminProps = {admin: {name: string; email: string}; flash: {success: string | null}};
const navigation = [
    ['/admin', 'Dashboard', 'grid'], ['/admin/consultations', 'Konsultasi', 'chat-left-text'],
    ['/admin/services', 'Layanan', 'briefcase'], ['/admin/articles', 'Artikel', 'file-earmark-richtext'], ['/admin/settings', 'Pengaturan website', 'sliders'], ['/admin/account', 'Akun', 'person-gear'],
];

export default function AdminLayout({ title, description, actions, children }: {title: string; description?: string; actions?: ReactNode; children: ReactNode}) {
    const {url, props: {admin, flash}} = usePage<AdminProps>();
    const [open, setOpen] = useState(false);
    const toggle = useRef<HTMLButtonElement>(null);
    const main = useRef<HTMLElement>(null);
    useEffect(() => { setOpen(false); main.current?.focus({preventScroll: true}); }, [url]);
    useEffect(() => {
        document.body.classList.toggle('sidebar-open', open);
        const key = (event: KeyboardEvent) => { if (event.key === 'Escape') { setOpen(false); toggle.current?.focus(); } };
        document.addEventListener('keydown', key);
        return () => { document.body.classList.remove('sidebar-open'); document.removeEventListener('keydown', key); };
    }, [open]);
    return <><Head title={title} /><a className="admin-skip" href="#admin-main">Langsung ke konten</a><div className="app-wrapper">
        <nav className="app-header navbar navbar-expand bg-white border-bottom" aria-label="Toolbar admin"><div className="container-fluid">
            <button ref={toggle} className="btn btn-light d-lg-none" type="button" onClick={() => setOpen(!open)} aria-label={open ? 'Tutup navigasi' : 'Buka navigasi'} aria-controls="admin-sidebar" aria-expanded={open}><i className="bi bi-list" aria-hidden="true" /></button>
            <span className="admin-workspace-label">Manajemen website</span><div className="ms-auto d-flex align-items-center gap-3"><a href="/" className="btn btn-sm btn-outline-secondary" target="_blank" rel="noopener noreferrer">Lihat website <i className="bi bi-arrow-up-right ms-1" aria-hidden="true" /></a><span className="small d-none d-sm-inline">{admin.name}</span></div>
        </div></nav>
        <aside id="admin-sidebar" className="app-sidebar bg-dark" data-bs-theme="dark" aria-label="Navigasi admin">
            <div className="sidebar-brand"><Link href="/admin" className="brand-link"><span className="brand-text fw-semibold">KONSULIN<span className="admin-brand-dot">.</span></span><span className="badge text-bg-secondary ms-2">Admin</span></Link></div>
            <div className="sidebar-wrapper"><nav><ul className="nav sidebar-menu flex-column gap-1">
                {navigation.map(([href, label, icon]) => <li className="nav-item" key={href}><Link className={`nav-link ${(href === '/admin' ? url.split('?')[0] === href : url.startsWith(href)) ? 'active' : ''}`} href={href} aria-label={label} aria-current={(href === '/admin' ? url.split('?')[0] === href : url.startsWith(href)) ? 'page' : undefined}><i className={`nav-icon bi bi-${icon}`} aria-hidden="true" /><p>{label}</p></Link></li>)}
                <li className="nav-item admin-logout"><Link href="/admin/logout" method="post" as="button" className="nav-link w-100" aria-label="Keluar"><i className="nav-icon bi bi-box-arrow-right" aria-hidden="true" /><p>Keluar</p></Link></li>
            </ul></nav></div>
        </aside>
        {open && <button className="admin-backdrop d-lg-none" type="button" onClick={() => setOpen(false)} aria-label="Tutup navigasi" />}
        <main id="admin-main" className="app-main" ref={main} tabIndex={-1}>
            <div className="app-content-header"><div className="container-fluid"><div className="d-flex flex-wrap justify-content-between align-items-center gap-3"><div><h1>{title}</h1>{description && <p className="text-secondary mb-0 mt-2">{description}</p>}</div>{actions}</div></div></div>
            <div className="app-content"><div className="container-fluid">{flash?.success && <div role="status" className="alert alert-success">{flash.success}</div>}{children}</div></div>
        </main>
        <footer className="app-footer small"><span>Konsulin · Panel administrasi</span></footer>
    </div></>;
}
