import { EditorContent, useEditor } from '@tiptap/react';
import StarterKit from '@tiptap/starter-kit';
import Image from '@tiptap/extension-image';
import { useEffect, useState } from 'react';
import ImageDropzone from './ImageDropzone';

export default function ArticleEditor({value, onChange, error, onBusyChange, disabled = false}: {value: string; onChange: (html: string) => void; error?: string; onBusyChange: (busy: boolean) => void; disabled?: boolean}) {
    const [linkOpen, setLinkOpen] = useState(false);
    const [link, setLink] = useState('');
    const [linkError, setLinkError] = useState('');
    const [alt, setAlt] = useState('');
    const [uploading, setUploading] = useState(false);
    const [uploadError, setUploadError] = useState('');
    const editor = useEditor({extensions: [StarterKit.configure({heading: {levels: [2, 3]}, link: {openOnClick: false}}), Image], content: value,
        shouldRerenderOnTransaction: true, editorProps: {attributes: {role: 'textbox', 'aria-label': 'Isi artikel', 'aria-multiline': 'true', class: 'article-prose'}},
        onUpdate: ({editor}) => onChange(editor.getHTML()),
    });
    useEffect(() => {
        if (editor && value !== editor.getHTML()) editor.commands.setContent(value, { emitUpdate: false });
    }, [editor, value]);
    useEffect(() => { editor?.setEditable(!disabled); }, [editor, disabled]);
    useEffect(() => {
        editor?.view.dom.setAttribute('aria-invalid', String(Boolean(error)));
        editor?.view.dom.setAttribute('aria-describedby', error ? 'article-content-error' : 'article-content-help');
    }, [editor, error]);
    if (!editor) return <p>Memuat editor…</p>;
    const action = (label: string, icon: string, run: () => void, active = false, disabled = false) => <button type="button" className={`btn btn-sm ${active ? 'btn-secondary' : 'btn-light'}`} title={label} aria-label={label} aria-pressed={active} disabled={disabled} onClick={run}><i className={`bi bi-${icon}`} aria-hidden="true" /></button>;
    const upload = async (image: File) => {
        if (disabled || uploading) return;
        if (!['image/jpeg', 'image/png', 'image/webp'].includes(image.type) || image.size > 5 * 1024 * 1024) {
            setUploadError('Pilih gambar JPG, PNG, atau WebP dengan ukuran maksimal 5 MB.');
            return;
        }
        setUploading(true); onBusyChange(true); setUploadError('');
        try {
            const body = new FormData(); body.append('image', image);
            const token = document.cookie.split('; ').find(item => item.startsWith('XSRF-TOKEN='))?.split('=').slice(1).join('=');
            const response = await fetch('/admin/articles/images', {method: 'POST', body, credentials: 'same-origin', headers: {'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', ...(token ? {'X-XSRF-TOKEN': decodeURIComponent(token)} : {})}});
            if ([401, 419].includes(response.status) || response.redirected) throw new Error('Sesi login berakhir. Salin tulisan Anda sebelum memuat ulang halaman dan masuk kembali.');
            if (!response.headers.get('content-type')?.includes('application/json')) throw new Error('Server belum dapat menerima gambar. Silakan coba lagi.');
            const data = await response.json();
            if (!response.ok) throw new Error(data.errors?.image?.[0] ?? 'Gambar gagal diunggah. Silakan coba lagi.');
            if (typeof data.url !== 'string' || !data.url.startsWith('/storage/')) throw new Error('Alamat gambar tidak valid. Silakan unggah kembali.');
            if (!editor.isDestroyed) editor.chain().focus().setImage({src: data.url, alt}).run();
        } catch (error) { setUploadError(error instanceof Error ? error.message : 'Gambar gagal diunggah.'); }
        finally { setUploading(false); onBusyChange(false); }
    };
    const applyLink = () => {
        const href = link.trim();
        try {
            const url = new URL(href);
            if (!['http:', 'https:', 'mailto:'].includes(url.protocol)) throw new Error();
            editor.chain().focus().extendMarkRange('link').setLink({href}).run();
            setLinkError(''); setLinkOpen(false);
        } catch { setLinkError('Masukkan tautan lengkap dengan https:// atau mailto:.'); }
    };
    return <div className="mb-3"><span className="form-label d-block" id="article-content-label">Isi artikel <span className="text-danger">*</span></span><div className={`article-editor${error ? ' border-danger' : ''}`}>
        <div className="article-toolbar" role="toolbar" aria-label="Format artikel">
            {action('Paragraf', 'paragraph', () => {editor.chain().focus().setParagraph().run();}, editor.isActive('paragraph'))}
            {action('Heading 2', 'type-h2', () => {editor.chain().focus().toggleHeading({level: 2}).run();}, editor.isActive('heading', {level: 2}))}
            {action('Heading 3', 'type-h3', () => {editor.chain().focus().toggleHeading({level: 3}).run();}, editor.isActive('heading', {level: 3}))}
            {action('Tebal', 'type-bold', () => {editor.chain().focus().toggleBold().run();}, editor.isActive('bold'))}
            {action('Miring', 'type-italic', () => {editor.chain().focus().toggleItalic().run();}, editor.isActive('italic'))}
            {action('Garis bawah', 'type-underline', () => {editor.chain().focus().toggleUnderline().run();}, editor.isActive('underline'))}
            {action('Daftar poin', 'list-ul', () => {editor.chain().focus().toggleBulletList().run();}, editor.isActive('bulletList'))}
            {action('Daftar nomor', 'list-ol', () => {editor.chain().focus().toggleOrderedList().run();}, editor.isActive('orderedList'))}
            {action('Kutipan', 'quote', () => {editor.chain().focus().toggleBlockquote().run();}, editor.isActive('blockquote'))}
            {action('Tautan', 'link-45deg', () => {setLink(editor.getAttributes('link').href ?? ''); setLinkError(''); setLinkOpen(!linkOpen);}, editor.isActive('link'))}
            {action('Batalkan', 'arrow-counterclockwise', () => {editor.chain().focus().undo().run();}, false, !editor.can().undo())}
            {action('Ulangi', 'arrow-clockwise', () => {editor.chain().focus().redo().run();}, false, !editor.can().redo())}
        </div>
        {linkOpen && <div className="article-editor-options"><label htmlFor="article-link" className="small">URL tautan</label><input id="article-link" className="form-control" type="url" placeholder="https://…" value={link} aria-invalid={Boolean(linkError)} aria-describedby={linkError ? 'article-link-error' : undefined} onChange={event => setLink(event.target.value)} onKeyDown={event => {if (event.key === 'Enter') {event.preventDefault(); applyLink();} if (event.key === 'Escape') {event.preventDefault(); setLinkOpen(false); editor.commands.focus();}}} /><button type="button" className="btn btn-sm btn-outline-secondary" onClick={applyLink}>Terapkan</button><button type="button" className="btn btn-sm btn-light" onClick={() => {editor.chain().focus().unsetLink().run(); setLinkOpen(false);}}>Hapus tautan</button><button type="button" className="btn btn-sm btn-light" onClick={() => {setLinkOpen(false); editor.commands.focus();}}>Batal</button>{linkError && <p id="article-link-error" className="text-danger small mb-0 w-100" role="alert">{linkError}</p>}</div>}
        <EditorContent editor={editor} />
        <div className="article-editor-options"><label className="small" htmlFor="inline-alt">Teks alternatif gambar</label><input className="form-control form-control-sm" id="inline-alt" value={alt} disabled={uploading} onKeyDown={event => {if (event.key === 'Enter') event.preventDefault();}} onChange={event => setAlt(event.target.value)} placeholder="Deskripsikan gambar sebelum mengunggah" /><ImageDropzone label={uploading ? 'Mengunggah gambar…' : 'Sisipkan gambar ke artikel'} onSelect={upload} onError={setUploadError} error={uploadError} disabled={disabled || uploading} /></div>
    </div>{error && <p id="article-content-error" className="text-danger small mt-2" role="alert">{error}</p>}<p id="article-content-help" className="form-text">{editor.getText().trim().split(/\s+/).filter(Boolean).length} kata · Gambar JPG, PNG, atau WebP, maksimal 5 MB.</p></div>;
}
