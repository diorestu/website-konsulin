export type ArticleData = {
    title: string;
    slug: string;
    excerpt: string;
    content: string;
    category: string;
    status: string;
    cover_alt: string;
    seo_title: string;
    seo_description: string;
    cover: File | null;
    remove_cover: boolean;
};

export type ArticleItem = Omit<ArticleData, 'cover' | 'remove_cover' | 'category' | 'cover_alt' | 'seo_title' | 'seo_description'> & {
    id: number;
    cover_url: string | null;
    category: string | null;
    cover_alt: string | null;
    seo_title: string | null;
    seo_description: string | null;
};

export function articleFormData(article: ArticleItem | null): ArticleData {
    return {
        title: article?.title ?? '', slug: article?.slug ?? '',
        excerpt: article?.excerpt ?? '', content: article?.content ?? '',
        category: article?.category ?? '', status: article?.status ?? 'draft',
        cover_alt: article?.cover_alt ?? '', seo_title: article?.seo_title ?? '',
        seo_description: article?.seo_description ?? '', cover: null, remove_cover: false,
    };
}

export function articleSlug(title: string): string {
    return title.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
        .replace(/[^a-z0-9]+/g, '-').slice(0, 160).replace(/^-+|-+$/g, '');
}
