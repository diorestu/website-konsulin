import PageShell from '../Components/PageShell';
import PageBanner from '../Components/PageBanner';
import AboutSection from '../Components/AboutSection';
import DirectorsSection from '../Components/DirectorsSection';

export default function About() {
    return <PageShell title="Tentang Kami" description="Kenali profil dan pendekatan pelayanan pajak serta akuntansi kami." pageHeader={<PageBanner title="Tentang Kami" />}><AboutSection /><DirectorsSection /></PageShell>;
}
