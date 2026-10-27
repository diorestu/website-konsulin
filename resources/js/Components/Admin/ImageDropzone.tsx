import Dropzone from 'dropzone';
import { useEffect, useId, useRef } from 'react';

type Props = {
    label: string;
    onSelect: (file: File) => void | Promise<void>;
    onError: (message: string) => void;
    disabled?: boolean;
    error?: string;
    fileName?: string;
};

export default function ImageDropzone({ label, onSelect, onError, disabled = false, error, fileName }: Props) {
    const element = useRef<HTMLDivElement>(null);
    const dropzone = useRef<Dropzone | null>(null);
    const callbacks = useRef({ onSelect, onError, disabled });
    const selecting = useRef(false);
    const descriptionId = useId();

    useEffect(() => { callbacks.current = { onSelect, onError, disabled }; }, [onSelect, onError, disabled]);

    useEffect(() => {
        if (!element.current) return;
        const instance = new Dropzone(element.current, {
            url: '/admin/articles/images',
            autoQueue: false,
            autoProcessQueue: false,
            acceptedFiles: 'image/jpeg,image/png,image/webp',
            maxFilesize: 5,
            maxFiles: 1,
            disablePreviews: true,
            createImageThumbnails: false,
            hiddenInputContainer: element.current,
            dictFileTooBig: 'Ukuran gambar maksimal 5 MB.',
            dictInvalidFileType: 'Gunakan gambar JPG, PNG, atau WebP.',
            dictMaxFilesExceeded: 'Pilih satu gambar setiap kali.',
            accept(file, done) {
                if (callbacks.current.disabled || selecting.current) {
                    done('Tunggu proses gambar selesai sebelum memilih gambar lain.');
                    return;
                }
                selecting.current = true;
                done();
                callbacks.current.onError('');
                Promise.resolve().then(() => callbacks.current.onSelect(file))
                    .catch(() => callbacks.current.onError('Gambar gagal dipilih. Silakan coba lagi.'))
                    .finally(() => {
                        selecting.current = false;
                        instance.removeFile(file);
                    });
            },
            error(file, message) {
                callbacks.current.onError(typeof message === 'string' ? message : 'Gambar tidak dapat digunakan.');
                instance.removeFile(file);
            },
        });
        dropzone.current = instance;
        return () => {
            dropzone.current = null;
            instance.destroy();
        };
    }, []);

    useEffect(() => {
        if (disabled) dropzone.current?.disable();
        else dropzone.current?.enable();
        if (dropzone.current?.hiddenFileInput) dropzone.current.hiddenFileInput.disabled = disabled;
    }, [disabled]);

    return <div className="mb-3">
        <div ref={element} className={`article-dropzone${error ? ' is-invalid' : ''}`} role="button" tabIndex={disabled ? -1 : 0}
            aria-label={label} aria-disabled={disabled} aria-invalid={Boolean(error)} aria-describedby={descriptionId}
            onKeyDown={event => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    if (!disabled) dropzone.current?.hiddenFileInput?.click();
                }
            }}>
            <div className="dz-message">
                <i className="bi bi-cloud-arrow-up" aria-hidden="true" />
                <span className="fw-medium d-block">{label}</span>
                <span className="small d-block">{disabled ? 'Tunggu proses selesai…' : 'Tarik gambar ke sini atau klik untuk memilih'}</span>
                {fileName && <span className="small d-block mt-2 text-break">Dipilih: {fileName}</span>}
            </div>
        </div>
        <p id={descriptionId} className={error ? 'text-danger small mt-2 mb-0' : 'form-text mb-0'} role={error ? 'alert' : undefined}>
            {error || 'Satu gambar JPG, PNG, atau WebP. Maksimal 5 MB.'}
        </p>
    </div>;
}
