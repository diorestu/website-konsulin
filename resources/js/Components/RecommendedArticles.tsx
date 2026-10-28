import { Link } from '@inertiajs/react';
import Icon from './Icon';

export type RecommendedArticle = {
    id: number; title: string; excerpt: string; category: string | null;
    cover_url: string | null; cover_alt: string | null; published_at: string; url: string;
};

export default function RecommendedArticles({ articles }: { articles: RecommendedArticle[] }) {
    if (!articles.length) return null;

    return <section className="container article-recommendations" aria-labelledby="recommended-articles-heading">
        <div className="blog-section-heading"><h2 id="recommended-articles-heading">Artikel lainnya untuk Anda</h2><Link className="text-link" href="/blog">Semua artikel <Icon name="arrow" /></Link></div>
        <div className="blog-latest-grid">{articles.map(article => <article className="blog-latest-card" key={article.id}>
            {article.cover_url && <Link href={article.url} className="blog-cover-link" tabIndex={-1} aria-hidden="true"><img src={article.cover_url} alt={article.cover_alt ?? ''} loading="lazy" /></Link>}
            <div className="blog-latest-copy">
                <p className="blog-meta">{article.category && `${article.category} · `}<time dateTime={article.published_at}>{new Date(article.published_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</time></p>
                <h3><Link href={article.url}>{article.title}</Link></h3>
                <p className="blog-excerpt">{article.excerpt}</p>
                <Link className="text-link" href={article.url} aria-label={`Baca ${article.title}`}>Baca artikel <Icon name="arrow" /></Link>
            </div>
        </article>)}</div>
    </section>;
}
