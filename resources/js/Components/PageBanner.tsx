export default function PageBanner({ title }: { title: string }) {
    return <header className="values-banner">
        <img src="/images/workspace.jpg" alt="" width="1200" height="800" fetchPriority="high" />
        <div className="container"><h1>{title}</h1></div>
    </header>;
}
