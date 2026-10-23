import { EditorContent, useEditor } from '@tiptap/react';
import StarterKit from '@tiptap/starter-kit';
import Image from '@tiptap/extension-image';
import { useRef, useState } from 'react';

export default function ArticleEditor({value, onChange, error, onBusyChange}: {value: string; onChange: (html: string) => void; error?: string; onBusyChange: (busy: boolean) => void}) {
    const [linkOpen, setLinkOpen] = useState(false);
    const [link, setLink] = useState('');
    const [alt, setAlt] = useState('');
    const [uploading, setUploading] = useState(false);
    const [uploadError, setUploadError] = useState('');
    const file = useRef<HTMLInputElement>(null);
    const editor = useEditor({extensions: [StarterKit.configure({heading: {levels: [2, 3]}, link: {openOnClick: false}}), Image], content: value,
        shouldRerenderOnTransaction: true, editorProps: {attributes: {role: 'textbox', 'aria-label': 'Isi artikel', 'aria-multiline': 'true', class: 'article-prose'}},
        onUpdate: ({editor}) => onChange(editor.getHTML()),
    });
    if (!editor) return <p>Memuat editor…</p>;
    const action = (label: string, icon: string, run: () => void, active = false, disabled = false) => <button type="button" className={`btn btn-sm ${active ? 'btn-secondary' : 'btn-light'}`} title={label} aria-label={label} aria-pressed={active} disabled={disabled} onClick={run}><i className={`bi bi-${icon}`} aria-hidden="true" /></button>;
    const upload = async (image: File) => {
        setUploading(true); onBusyChange(true); setUploadError('');
        try {
            const body = new FormData(); body.append('image', image);
            const token = document.cookie.split('; ').find(item => item.startsWith('XSRF-TOKEN='))?.split('=').slice(1).join('=');
            const response = await fetch('/admin/articles/images', {method: 'POST', body, credentials: 'same-origin', headers: {'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest', ...(token ? {'X-XSRF-TOKEN': decodeURIComponent(token)} : {})}});
            const data = await response.json();
            if (!response.ok) throw new Error(data.errors?.image?.[0] ?? 'Gambar gagal diunggah. Silakan coba lagi.');
            editor.chain().focus().setImage({src: data.url, alt}).run();
        } catch (error) { setUploadError(error instanceof Error ? error.message : 'Gambar gagal diunggah.'); }
        finally { setUploading(false); onBusyChange(false); if (file.current) file.current.value = ''; }
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
            {action('Tautan', 'link-45deg', () => {setLink(editor.getAttributes('link').href ?? ''); setLinkOpen(!linkOpen);}, editor.isActive('link'))}
            {action('Batalkan', 'arrow-counterclockwise', () => {editor.chain().focus().undo().run();}, false, !editor.can().undo())}
            {action('Ulangi', 'arrow-clockwise', () => {editor.chain().focus().redo().run();}, false, !editor.can().redo())}
        </div>
        {linkOpen && <div className="article-editor-options"><label htmlFor="article-link" className="small">URL tautan</label><input id="article-link" className="form-control" type="url" placeholder="https://…" value={link} onChange={event => setLink(event.target.value)} /><button type="button" className="btn btn-sm btn-outline-secondary" onClick={() => {if (/^(https?:\/\/|mailto:)/i.test(link)) {editor.chain().focus().extendMarkRange('link').setLink({href: link}).run(); setLinkOpen(false);}}}>Terapkan</button><button type="button" className="btn btn-sm btn-light" onClick={() => {editor.chain().focus().unsetLink().run(); setLinkOpen(false);}}>Hapus tautan</button></div>}
        <EditorContent editor={editor} />
        <div className="article-editor-options"><label className="small" htmlFor="inline-alt">Teks alternatif gambar</label><input className="form-control form-control-sm" id="inline-alt" value={alt} onChange={event => setAlt(event.target.value)} placeholder="Deskripsikan gambar sebelum mengunggah" /><input ref={file} type="file" className="d-none" accept="image/jpeg,image/png,image/webp" onChange={event => {const image = event.target.files?.[0]; if (image) void upload(image);}} /><button type="button" className="btn btn-sm btn-outline-secondary" disabled={uploading} onClick={() => file.current?.click()}><i className="bi bi-image me-1" aria-hidden="true" />{uploading ? 'Mengunggah…' : 'Sisipkan gambar'}</button></div>
    </div>{error && <p className="text-danger small mt-2" role="alert">{error}</p>}{uploadError && <p className="text-danger small mt-2" role="alert">{uploadError}</p>}<p className="form-text">{editor.getText().trim().split(/\s+/).filter(Boolean).length} kata · Gambar JPG, PNG, atau WebP, maksimal 5 MB.</p></div>;
}
