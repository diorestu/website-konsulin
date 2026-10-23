import { useId, type ReactNode } from 'react';

export default function FormField({ label, value, onChange, error, hint, type = 'text', multiline = false, readOnly = false, required = false, autoComplete, children }: {label: string; value?: string | number; onChange?: (value: string) => void; error?: string; hint?: string; type?: string; multiline?: boolean; readOnly?: boolean; required?: boolean; autoComplete?: string; children?: ReactNode}) {
    const id = useId();
    const props = {id, className: `form-control${error ? ' is-invalid' : ''}`, value, onChange: (event: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => onChange?.(event.target.value), readOnly, required, autoComplete, 'aria-invalid': error ? true as const : undefined, 'aria-describedby': error || hint ? `${id}-help` : undefined};
    return <div className="mb-3"><label className="form-label" htmlFor={id}>{label}{required && <span className="text-danger ms-1" aria-hidden="true">*</span>}</label>{children ?? (multiline ? <textarea {...props} rows={4} /> : <input {...props} type={type} />)}{error ? <div id={`${id}-help`} className="invalid-feedback d-block">{error}</div> : hint && <div id={`${id}-help`} className="form-text">{hint}</div>}</div>;
}
