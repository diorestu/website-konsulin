import { Link } from '@inertiajs/react';
import Icon from './Icon';
import type { Service } from '../types';
import { getServiceWhatsAppUrl } from '../contact';

export default function ServiceDirectory({
    services,
    directWhatsApp = false,
}: {
    services: Service[];
    directWhatsApp?: boolean;
}) {
    return <ul className="service-directory" aria-label="Our services">
        {services.map(service => <li key={service.id}>
            {directWhatsApp ? (
                <a
                    className="service-directory-link"
                    href={getServiceWhatsAppUrl(service.name)}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-labelledby={`service-title-${service.id}`}
                >
                    <h3 id={`service-title-${service.id}`} className="service-directory-name">{service.name}</h3>
                    <Icon name="diagonal" />
                </a>
            ) : (
                <Link className="service-directory-link" href={`/layanan/${service.id}`} aria-labelledby={`service-title-${service.id}`}>
                    <h3 id={`service-title-${service.id}`} className="service-directory-name">{service.name}</h3>
                    <Icon name="diagonal" />
                </Link>
            )}
        </li>)}
    </ul>;
}
