import { createInertiaApp } from '@inertiajs/react';
import type { ComponentType } from 'react';
import { createRoot } from 'react-dom/client';
import { MotionConfig } from 'motion/react';
import '@fontsource/poppins/latin-400.css';
import '@fontsource/poppins/latin-500.css';
import '@fontsource/poppins/latin-600.css';
import '@fontsource/poppins/latin-700.css';
import '@fontsource/poppins/latin-800.css';

createInertiaApp({
    title: (title) => `${title} — Konsulin`,
    resolve: async (name) => {
        const pages = import.meta.glob<{ default: ComponentType }>('./Pages/**/*.tsx');
        const page = pages[`./Pages/${name}.tsx`];
        if (!page) throw new Error(`Halaman tidak tersedia: ${name}`);
        return (await page()).default;
    },
    setup({ el, App, props }) {
        if (!el) return;
        createRoot(el).render(<MotionConfig reducedMotion="user"><App {...props} /></MotionConfig>);
    },
    progress: { color: 'var(--color-accent)' },
});
