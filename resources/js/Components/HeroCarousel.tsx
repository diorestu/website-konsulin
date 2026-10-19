import { useEffect, useState } from 'react';
import { useReducedMotion } from 'motion/react';
import Icon from './Icon';

const slides = [
    { src: '/images/gallery/konsulin-3.jpg', alt: 'Dokumentasi kebersamaan Konsulin dan klien', height: 1300 },
    { src: '/images/gallery/konsulin-1.jpg', alt: 'Tim Konsulin bersama klien di ruang pertemuan', height: 1326 },
    { src: '/images/gallery/konsulin-5.jpg', alt: 'Pertemuan Konsulin bersama klien di Tabanan, Bali', height: 1320 },
];

export default function HeroCarousel() {
    const [current, setCurrent] = useState(0);
    const [paused, setPaused] = useState(false);
    const [hovered, setHovered] = useState(false);
    const [focused, setFocused] = useState(false);
    const [hidden, setHidden] = useState(false);
    const reducedMotion = useReducedMotion();
    const playing = !paused && !hovered && !focused && !hidden && !reducedMotion;

    useEffect(() => {
        const updateVisibility = () => setHidden(document.hidden);
        updateVisibility();
        document.addEventListener('visibilitychange', updateVisibility);
        return () => document.removeEventListener('visibilitychange', updateVisibility);
    }, []);

    useEffect(() => {
        if (!playing) return;
        const timer = window.setInterval(() => setCurrent(index => (index + 1) % slides.length), 6000);
        return () => window.clearInterval(timer);
    }, [playing, current]);

    const move = (direction: number) => {
        setPaused(true);
        setCurrent(index => (index + direction + slides.length) % slides.length);
    };

    return <div className="hero-visual hero-carousel-visual">
        <div className="hero-image hero-carousel" role="region" aria-roledescription="carousel" aria-label="Sorotan Konsulin"
            onMouseEnter={() => setHovered(true)} onMouseLeave={() => setHovered(false)}
            onFocusCapture={() => setFocused(true)} onBlurCapture={event => { if (!event.currentTarget.contains(event.relatedTarget as Node | null)) setFocused(false); }}>
            {slides.map((slide, index) => <img key={slide.src} className={`carousel-image ${current === index ? 'is-current' : ''}`} src={slide.src} alt={slide.alt} width="1600" height={slide.height} aria-hidden={current !== index} fetchPriority={index === 0 ? 'high' : 'auto'} />)}
            <div className="carousel-controls">
                <button type="button" aria-label="Gambar sebelumnya" onClick={() => move(-1)}><Icon name="arrow" className="carousel-previous" /></button>
                <span className="carousel-count" aria-live={playing ? 'off' : 'polite'} aria-atomic="true">{current + 1} / {slides.length}</span>
                <button type="button" aria-label="Gambar berikutnya" onClick={() => move(1)}><Icon name="arrow" /></button>
                <button type="button" className="carousel-pause" disabled={Boolean(reducedMotion)} title={reducedMotion ? 'Pemutaran otomatis dinonaktifkan karena preferensi reduced motion.' : undefined} aria-label={reducedMotion ? 'Pemutaran otomatis dinonaktifkan' : paused ? 'Putar carousel otomatis' : 'Jeda carousel'} onClick={() => setPaused(value => !value)}><Icon name={paused || reducedMotion ? 'play' : 'pause'} /></button>
            </div>
        </div>
    </div>;
}
