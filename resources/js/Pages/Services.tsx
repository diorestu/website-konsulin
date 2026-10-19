import PageShell from '../Components/PageShell';
import PageBanner from '../Components/PageBanner';
import ServiceDirectory from '../Components/ServiceDirectory';
import type { Service } from '../types';

export default function Services({ services }: { services: Service[] }) {
    return <PageShell title="Layanan Kami" description="Pilih Layanan Pajak dan Akuntansi yang Anda Butuhkan." pageHeader={<PageBanner title="Layanan Kami" />}>
        <section className="services-section public-service-list"><div className="container"><ServiceDirectory services={services} /></div></section>
    </PageShell>;
}
