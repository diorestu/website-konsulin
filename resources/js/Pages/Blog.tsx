import { Link } from '@inertiajs/react';
import PageShell from '../Components/PageShell';

export default function Blog() {
    return <PageShell title="Blog" description="Ruang baca tentang pajak, akuntansi, dan pengelolaan usaha.">
        <section className="container blog-empty"><h2>Artikel sedang disiapkan.</h2><p>Belum ada artikel yang dipublikasikan. Sementara itu, Anda dapat mengenali lingkup layanan melalui halaman detail masing-masing.</p><Link className="button button-primary" href="/layanan">Jelajahi layanan</Link></section>
    </PageShell>;
}
