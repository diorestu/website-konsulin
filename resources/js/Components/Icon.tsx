import type { CSSProperties } from 'react';

type Props = { name: 'arrow' | 'diagonal' | 'check' | 'plus' | 'close' | 'menu' | 'document' | 'down' | 'pause' | 'play' | 'chat'; className?: string; style?: CSSProperties };

export default function Icon({ name, ...props }: Props) {
    const paths = {
        arrow: <><path d="M4 12h15M13 6l6 6-6 6" /></>,
        diagonal: <><path d="M6 18 18 6M6 6h12v12" /></>,
        check: <path d="m5 12 4 4L19 6" />,
        plus: <path d="M5 12h14M12 5v14" />,
        close: <path d="m6 6 12 12M18 6 6 18" />,
        menu: <path d="M4 8h16M4 16h16" />,
        document: <><path d="M14 3H6a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8zM14 3v6h5M9 13h6M9 17h6" /></>,
        down: <path d="m6 9 6 6 6-6" />,
        pause: <path d="M9 5v14M15 5v14" />,
        play: <path d="m8 5 11 7-11 7z" />,
        chat: <><path d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5 9 9 0 0 1-4-.9L3 21l1.9-5.5a9 9 0 0 1-.9-4A8.5 8.5 0 0 1 12.5 3 8.5 8.5 0 0 1 21 11.5Z" /><path d="M8 9h8M8 13h5" /></>,
    };
    return <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true" {...props}>{paths[name]}</svg>;
}
