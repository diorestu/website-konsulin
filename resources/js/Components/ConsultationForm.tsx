import { Link, useForm } from '@inertiajs/react';
import { useEffect, useRef, useState } from 'react';
import type { FormEvent } from 'react';
import type { Service } from '../types';
import Icon from './Icon';

type Fields = 'name' | 'email' | 'company' | 'service' | 'message' | 'consent' | 'website';

export default function ConsultationForm({ services, selectedService }: { services: Service[]; selectedService: string }) {
    const form = useForm({ name: '', email: '', company: '', service: '', message: '', consent: false, website: '' });
    const [sent, setSent] = useState(false);
    const { setData } = form;
    useEffect(() => { if (selectedService) { setData('service', selectedService); setSent(false); } }, [selectedService, setData]);
    const [requestError, setRequestError] = useState('');
    const successRef = useRef<HTMLDivElement>(null);
    const formRef = useRef<HTMLFormElement>(null);
    const submit = (event: FormEvent) => {
        event.preventDefault();
        setRequestError('');
        form.post('/konsultasi', {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                setSent(true);
                requestAnimationFrame(() => successRef.current?.focus({ preventScroll: true }));
            },
            onHttpException: (response) => {
                setRequestError(response.status === 429 ? 'Terlalu banyak permintaan. Tunggu satu menit, lalu coba lagi.' : 'Permintaan belum tersimpan. Muat ulang halaman dan coba lagi.');
                return false;
            },
            onNetworkError: () => {
                setRequestError('Koneksi terputus. Periksa internet Anda dan coba kirim kembali.');
                return false;
            },
            onError: (errors) => {
                const field = Object.keys(errors)[0];
                formRef.current?.querySelector<HTMLElement>(`[name="${field}"]`)?.focus({ preventScroll: true });
            },
        });
    };
    const error = (field: Fields) => form.errors[field] ? <p id={`${field}-error`} className="field-error" role="alert">{form.errors[field]}</p> : null;
    const attributes = (field: Fields) => ({ 'aria-invalid': Boolean(form.errors[field]), 'aria-describedby': form.errors[field] ? `${field}-error` : undefined });

    return sent ? <div className="form-success" role="status" tabIndex={-1} ref={successRef}>
        <span className="success-mark"><Icon name="check" /></span>
        <h3>Terima kasih sudah bercerita.</h3>
        <p>Permintaan konsultasi Anda telah tersimpan. Simpan informasi yang Anda kirim untuk percakapan berikutnya.</p>
        <p className="small-note">Konfirmasi ini menyatakan pencatatan di website. Notifikasi email belum diaktifkan.</p>
        <button className="button button-outline" onClick={() => { setSent(false); requestAnimationFrame(() => formRef.current?.querySelector<HTMLInputElement>('[name="name"]')?.focus()); }}>Kirim kebutuhan lain</button>
    </div> : <form ref={formRef} onSubmit={submit} className="consultation-form">
        <div className="form-grid">
            <div className="field"><label htmlFor="name">Nama lengkap <span>*</span></label><input id="name" name="name" autoComplete="name" required maxLength={120} placeholder="Nama Anda" value={form.data.name} onChange={e => form.setData('name', e.target.value)} {...attributes('name')} />{error('name')}</div>
            <div className="field"><label htmlFor="email">Email <span>*</span></label><input id="email" name="email" type="email" autoComplete="email" required maxLength={180} placeholder="nama@perusahaan.com" value={form.data.email} onChange={e => form.setData('email', e.target.value)} {...attributes('email')} />{error('email')}</div>
            <div className="field"><label htmlFor="company">Nama usaha <span className="optional">(opsional)</span></label><input id="company" name="company" autoComplete="organization" maxLength={180} placeholder="Nama usaha Anda" value={form.data.company} onChange={e => form.setData('company', e.target.value)} {...attributes('company')} />{error('company')}</div>
            <div className="field"><label htmlFor="service">Layanan <span>*</span></label><select id="service" name="service" required value={form.data.service} onChange={e => form.setData('service', e.target.value)} {...attributes('service')}><option value="" disabled>Pilih kebutuhan Anda</option>{services.map(service => <option key={service.id} value={service.id}>{service.name}</option>)}</select>{error('service')}</div>
        </div>
        <div className="field message-field"><label htmlFor="message">Apa yang ingin Anda diskusikan? <span>*</span></label><textarea id="message" name="message" required minLength={15} maxLength={3000} rows={3} placeholder="Ceritakan kebutuhan bisnis Anda secara singkat…" value={form.data.message} onChange={e => form.setData('message', e.target.value)} {...attributes('message')} />{error('message')}<p className="field-hint">Tidak perlu menyertakan NPWP, kata sandi, atau dokumen keuangan.</p></div>
        <div className="honeypot" aria-hidden="true"><label htmlFor="website">Website</label><input id="website" name="website" tabIndex={-1} autoComplete="off" value={form.data.website} onChange={e => form.setData('website', e.target.value)} /></div>
        <div className="consent-field"><label className="consent-label"><input type="checkbox" name="consent" checked={form.data.consent} onChange={e => form.setData('consent', e.target.checked)} required {...attributes('consent')} /><span>Saya menyetujui penggunaan data untuk permintaan konsultasi ini sesuai <Link href="/privasi">kebijakan privasi</Link>.</span></label>{error('consent')}</div>
        {form.errors.website ? <p role="alert" className="field-error">{form.errors.website}</p> : null}
        {requestError ? <p className="field-error" role="alert">{requestError}</p> : null}
        <button className="button button-primary form-submit" type="submit" disabled={form.processing}>{form.processing ? 'Menyimpan permintaan…' : 'Kirim permintaan'}{!form.processing && <Icon name="arrow" />}</button>
        <p className="form-disclosure">Permintaan dicatat di website ini. Notifikasi email belum diaktifkan.</p>
    </form>;
}
