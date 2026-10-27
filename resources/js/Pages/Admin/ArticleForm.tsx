import { Link, useForm } from '@inertiajs/react';
import { useEffect, useRef, useState, type FormEvent } from 'react';
import AdminLayout from '../../Components/Admin/AdminLayout';
import FormField from '../../Components/Admin/FormField';
import ArticleEditor from '../../Components/Admin/ArticleEditor';
import ImageDropzone from '../../Components/Admin/ImageDropzone';
import { articleFormData, articleSlug, type ArticleData, type ArticleItem } from '../../articleForm';

export default function ArticleForm({ article }: { article: ArticleItem | null }) {
    return <ArticleFormFields key={article?.id ?? 'new'} article={article} />;
}

function ArticleFormFields({ article }: { article: ArticleItem | null }) {
    const form = useForm<ArticleData>(articleFormData(article));
    const [busy, setBusy] = useState(false);
    const [slugEdited, setSlugEdited] = useState(false);
    const [coverPreview, setCoverPreview] = useState<string | null>(null);
    const [coverError, setCoverError] = useState('');
    const formElement = useRef<HTMLFormElement>(null);

    useEffect(() => {
        if (!form.data.cover) {
            setCoverPreview(null);
            return;
        }
        const url = URL.createObjectURL(form.data.cover);
        setCoverPreview(url);
        return () => URL.revokeObjectURL(url);
    }, [form.data.cover]);

    const cover = coverPreview ?? (!form.data.remove_cover ? article?.cover_url : null);
    const savingLabel = form.data.status === 'published' ? (article?.status === 'published' ? 'Simpan perubahan' : 'Terbitkan artikel') : form.data.status === 'archived' ? 'Arsipkan artikel' : 'Simpan draft';

    function submit(event: FormEvent<HTMLFormElement>) {
        event.preventDefault();
        if (form.processing || busy || coverError) return;
        form.transform(data => article ? { ...data, _method: 'put' } : data);
        form.post(article ? `/admin/articles/${article.id}` : '/admin/articles', {
            forceFormData: true,
            preserveScroll: true,
            onSuccess: page => {
                const saved = page.props.article as ArticleItem;
                const data = articleFormData(saved);
                form.setData(data);
                form.setDefaults(data);
            },
            onError: () => {
                requestAnimationFrame(() => {
                    const invalid = formElement.current?.querySelector<HTMLElement>('[aria-invalid="true"]');
                    invalid?.focus();
                    invalid?.scrollIntoView({ behavior: 'instant', block: 'center' });
                });
            },
        });
    }

    function selectCover(image: File | null) {
        setCoverError('');
        if (image && (!['image/jpeg', 'image/png', 'image/webp'].includes(image.type) || image.size > 5 * 1024 * 1024)) {
            setCoverError('Pilih gambar JPG, PNG, atau WebP dengan ukuran maksimal 5 MB.');
            return;
        }
        form.clearErrors('cover');
        form.setData(data => ({ ...data, cover: image, remove_cover: image ? false : data.remove_cover }));
    }

    return <AdminLayout title={article ? 'Edit artikel' : 'Tulis artikel'} description="Tulis konten, siapkan gambar, lalu simpan draft atau terbitkan artikel." actions={<Link className="btn btn-outline-secondary" href="/admin/articles">Kembali</Link>}>
        <form ref={formElement} onSubmit={submit} noValidate aria-busy={form.processing || busy}>
            {form.hasErrors && <div className="alert alert-danger" role="alert">Artikel belum disimpan. Periksa isian yang ditandai; tulisan Anda tetap ada.</div>}
            <fieldset className="border-0 p-0 m-0" style={{ minWidth: 0 }} disabled={form.processing}>
                <div className="row g-4">
                    <div className="col-xl-8">
                        <section className="card mb-4"><div className="card-body">
                            <FormField label="Judul artikel" required value={form.data.title} onChange={title => form.setData(data => ({ ...data, title, slug: !article && !slugEdited ? articleSlug(title) : data.slug }))} error={form.errors.title} />
                            <FormField label="Slug / URL" required readOnly={Boolean(article)} value={form.data.slug} onChange={slug => { setSlugEdited(Boolean(slug)); form.setData('slug', slug); }} error={form.errors.slug} hint={article ? 'URL dipertahankan agar tautan artikel tetap berfungsi.' : 'Dibuat dari judul. Setelah diubah manual, URL tidak mengikuti perubahan judul.'} />
                            <FormField label="Ringkasan" multiline required value={form.data.excerpt} onChange={value => form.setData('excerpt', value)} error={form.errors.excerpt} hint="Ditampilkan pada daftar Blog. Maksimal 1.000 karakter." />
                            <ArticleEditor value={form.data.content} onChange={value => form.setData('content', value)} error={form.errors.content} onBusyChange={setBusy} disabled={form.processing} />
                        </div></section>
                        <section className="card"><div className="card-header"><h2 className="card-title">Metadata SEO</h2></div><div className="card-body">
                            <FormField label="Judul SEO" value={form.data.seo_title} onChange={value => form.setData('seo_title', value)} error={form.errors.seo_title} hint="Opsional. Jika kosong, menggunakan judul artikel." />
                            <FormField label="Deskripsi SEO" multiline value={form.data.seo_description} onChange={value => form.setData('seo_description', value)} error={form.errors.seo_description} hint="Opsional. Jika kosong, menggunakan ringkasan artikel." />
                        </div></section>
                    </div>
                    <div className="col-xl-4">
                        <section className="card mb-4"><div className="card-header"><h2 className="card-title">Publikasi</h2></div><div className="card-body">
                            <label htmlFor="article-status" className="form-label">Status</label>
                            <select className={`form-select mb-3${form.errors.status ? ' is-invalid' : ''}`} id="article-status" value={form.data.status} aria-invalid={Boolean(form.errors.status)} aria-describedby="article-status-help" onChange={event => form.setData('status', event.target.value)}>
                                <option value="draft">Draft</option><option value="published">Terbit</option><option value="archived">Arsip</option>
                            </select>
                            <p id="article-status-help" className={`small ${form.errors.status ? 'text-danger' : 'text-secondary'}`}>{form.errors.status || (form.data.status === 'published' ? 'Setelah disimpan, artikel langsung tampil di website.' : 'Artikel hanya tersimpan di panel admin dan tidak tampil di website.')}</p>
                            <FormField label="Kategori" value={form.data.category} onChange={value => form.setData('category', value)} error={form.errors.category} hint="Gunakan Pajak/Perpajakan atau Accounting/Akuntansi untuk pengelompokan Blog." />
                            <button type="submit" className="btn btn-primary w-100" disabled={form.processing || busy || Boolean(coverError)}>{form.processing ? 'Menyimpan…' : busy ? 'Menunggu unggah gambar…' : savingLabel}</button>
                            {form.progress && <p className="small mt-2 mb-0" role="status">Mengirim artikel: {form.progress.percentage ?? 0}%</p>}
                            {article?.status === 'published' && <a className="d-block mt-3" href={`/blog/${article.slug}`} target="_blank" rel="noopener noreferrer">Lihat artikel ↗</a>}
                        </div></section>
                        <section className="card"><div className="card-header"><h2 className="card-title">Gambar sampul</h2></div><div className="card-body">
                            {cover && <img src={cover} className="img-fluid rounded mb-3" alt={form.data.cover_alt || 'Pratinjau sampul'} />}
                            <ImageDropzone label="Unggah gambar sampul" onSelect={selectCover} onError={setCoverError} error={coverError || form.errors.cover} disabled={form.processing} fileName={form.data.cover?.name} />
                            {(cover || coverError) && <button type="button" className="btn btn-sm btn-outline-danger mb-3" onClick={() => { form.setData(data => ({ ...data, cover: null, remove_cover: true })); setCoverError(''); form.clearErrors('cover'); }}>Hapus sampul</button>}
                            <FormField label="Teks alternatif sampul" value={form.data.cover_alt} onChange={value => form.setData('cover_alt', value)} error={form.errors.cover_alt} />
                        </div></section>
                    </div>
                </div>
            </fieldset>
        </form>
    </AdminLayout>;
}
