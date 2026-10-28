import PageShell from '../Components/PageShell';
import Breadcrumbs from '../Components/Breadcrumbs';
import RecommendedArticles, { type RecommendedArticle } from '../Components/RecommendedArticles';
type Item = {title: string; excerpt: string; content: string; category: string | null; cover_url: string | null; cover_alt: string | null; published_at: string};
export default function ArticleDetail({article, recommendedArticles}: {article: Item; recommendedArticles: RecommendedArticle[]}) {
    return <PageShell title={article.title} description={article.excerpt} pageHeader={<header className="article-heading container"><Breadcrumbs title={article.title} parent={{title: 'Blog', href: '/blog'}} /><p className="blog-meta">{article.category && `${article.category} · `}<time dateTime={article.published_at}>{new Date(article.published_at).toLocaleDateString('id-ID', {day:'numeric', month:'long', year:'numeric'})}</time></p><h1>{article.title}</h1><p className="article-excerpt">{article.excerpt}</p></header>}><article className="container article-reading">{article.cover_url && <img className="article-cover" src={article.cover_url} alt={article.cover_alt || article.title} />}<div className="article-prose" dangerouslySetInnerHTML={{__html: article.content}} /></article><RecommendedArticles articles={recommendedArticles} /></PageShell>;
}
