import { Link } from '@inertiajs/react';
import PageShell from '../Components/PageShell';
import Icon from '../Components/Icon';

type Item = {id: number; title: string; slug: string; excerpt: string; category: string | null; cover_url: string | null; cover_alt: string | null; published_at: string};
type ArticleList = {data: Item[]; current_page: number; last_page: number; total: number; prev_page_url: string | null; next_page_url: string | null};
type Props = {articles: {data: Item[]}; taxArticles: ArticleList; accountingArticles: ArticleList};

function ArticleMeta({article}: {article: Item}) {
    return <p className="blog-meta">{article.category && <span>{article.category} · </span>}<time dateTime={article.published_at}>{new Date(article.published_at).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'})}</time></p>;
}

function ArticleImage({article}: {article: Item}) {
    return article.cover_url ? <Link href={`/blog/${article.slug}`} className="blog-cover-link" tabIndex={-1} aria-hidden="true"><img src={article.cover_url} alt={article.cover_alt ?? ''} loading="lazy" /></Link> : null;
}

function ReadArticle({article}: {article: Item}) {
    return <Link className="text-link" href={`/blog/${article.slug}`} aria-label={`Baca ${article.title}`}>Baca artikel <Icon name="arrow" /></Link>;
}

function CategorySection({title, id, articles}: {title: string; id: string; articles: ArticleList}) {
    return <section className="blog-category" aria-labelledby={id}>
        <div className="blog-section-heading"><h2 id={id}>{title}</h2><span>{articles.total} artikel</span></div>
        {articles.data.length ? <div className="blog-category-list">{articles.data.map(article => <article className="blog-story" key={article.id}>
            <h3><Link href={`/blog/${article.slug}`}>{article.title}</Link></h3>
            <ArticleMeta article={article} />
            <div className={`blog-story-content${article.cover_url ? ' has-cover' : ''}`}>
                <ArticleImage article={article} />
                <div className="blog-story-copy"><p>{article.excerpt}</p><ReadArticle article={article} /></div>
            </div>
        </article>)}</div> : <p className="blog-category-empty">{articles.current_page > 1 ? 'Tidak ada artikel di halaman ini.' : `Belum ada artikel ${title.toLowerCase()} yang diterbitkan.`}</p>}
        {articles.last_page > 1 && <nav className="blog-category-pagination" aria-label={`Halaman artikel ${title}`}>
            {articles.prev_page_url && <Link className="text-link" href={articles.prev_page_url} preserveScroll>Sebelumnya</Link>}
            <span>{articles.current_page} / {articles.last_page}</span>
            {articles.next_page_url && <Link className="text-link" href={articles.next_page_url} preserveScroll>Berikutnya</Link>}
        </nav>}
    </section>;
}

export default function Blog({articles, taxArticles, accountingArticles}: Props) {
    return <PageShell title="Blog Pajak & Akuntansi" description="Ruang baca tentang pajak, akuntansi, dan pengelolaan usaha.">
        {articles.data.length ? <div className="container blog-list">
            <section className="blog-latest" aria-labelledby="blog-latest-heading">
                <div className="blog-section-heading"><h2 id="blog-latest-heading">Artikel terbaru</h2></div>
                <div className="blog-latest-grid">{articles.data.map(article => <article className="blog-latest-card" key={article.id}>
                    <ArticleImage article={article} />
                    <div className="blog-latest-copy"><ArticleMeta article={article} /><h3><Link href={`/blog/${article.slug}`}>{article.title}</Link></h3><p className="blog-excerpt">{article.excerpt}</p><ReadArticle article={article} /></div>
                </article>)}</div>
            </section>
            <div className="blog-categories">
                <CategorySection title="Pajak" id="blog-tax-heading" articles={taxArticles} />
                <CategorySection title="Accounting" id="blog-accounting-heading" articles={accountingArticles} />
            </div>
        </div> : <section className="container blog-empty"><h2>Artikel sedang disiapkan.</h2><p>Belum ada artikel yang dipublikasikan. Kunjungi kembali halaman ini untuk membaca tulisan terbaru dari Konsulin.</p><Link className="button button-primary" href="/layanan">Jelajahi layanan</Link></section>}
    </PageShell>;
}
