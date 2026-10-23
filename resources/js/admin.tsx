import { createInertiaApp } from '@inertiajs/react';
import type { ComponentType } from 'react';
import { createRoot } from 'react-dom/client';
import 'admin-lte/dist/css/adminlte.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import '../css/admin.css';

createInertiaApp({
    title: title => `${title} — Admin Konsulin`,
    resolve: async name => {
        const pages = import.meta.glob<{default: ComponentType}>('./Pages/Admin/**/*.tsx');
        const page = pages[`./Pages/${name}.tsx`];
        if (!page) throw new Error(`Halaman admin tidak tersedia: ${name}`);
        return (await page()).default;
    },
    setup({ el, App, props }) {
        if (el) createRoot(el).render(<App {...props} />);
    },
    progress: { color: '#14213d' },
});
