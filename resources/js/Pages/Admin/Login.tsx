import { Head, useForm } from '@inertiajs/react';
import FormField from '../../Components/Admin/FormField';
export default function Login() {
    const form = useForm({email: '', password: ''});
    return <><Head title="Masuk admin" /><main className="admin-login"><div className="admin-login-card"><div className="text-center mb-4"><a className="admin-login-brand text-decoration-none" href="/">KONSULIN.</a><p className="text-secondary mt-2 mb-0">Administrasi website</p></div><div className="card"><div className="card-body"><h1 className="h4 mb-2">Masuk ke panel admin</h1><p className="text-secondary mb-4">Gunakan akun admin Anda untuk melanjutkan.</p><form onSubmit={event => {event.preventDefault(); form.post('/admin/login', {onFinish: () => form.reset('password')});}}>
        <FormField label="Email" autoComplete="username" type="email" required value={form.data.email} onChange={value => form.setData('email', value)} error={form.errors.email} />
        <FormField label="Password" autoComplete="current-password" type="password" required value={form.data.password} onChange={value => form.setData('password', value)} error={form.errors.password} />
        <button className="btn btn-primary w-100 mt-2" disabled={form.processing}>{form.processing ? 'Memproses…' : 'Masuk'}</button>
    </form></div></div><a href="/" className="d-block text-center small mt-4">Kembali ke website</a></div></main></>;
}
