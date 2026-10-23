import { Link } from '@inertiajs/react';
export type Paginated<T> = {data: T[]; current_page: number; last_page: number; total: number; prev_page_url: string | null; next_page_url: string | null};
export default function Pagination({data}: {data: Omit<Paginated<unknown>, 'data'>}) {
    return <nav className="d-flex flex-wrap align-items-center justify-content-between gap-3 border-top p-3" aria-label="Pagination"><span className="text-secondary small">{data.total} data · Halaman {data.current_page} dari {data.last_page}</span><div className="d-flex gap-2">{data.prev_page_url && <Link className="btn btn-sm btn-outline-secondary" href={data.prev_page_url}>Sebelumnya</Link>}{data.next_page_url && <Link className="btn btn-sm btn-outline-secondary" href={data.next_page_url}>Berikutnya</Link>}</div></nav>;
}
