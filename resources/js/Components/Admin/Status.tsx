export const statusLabels: Record<string, string> = {new: 'Baru', in_progress: 'Diproses', completed: 'Selesai'};
export default function Status({value}: {value: string}) {
    return <span className={`badge ${value === 'new' ? 'text-bg-primary' : value === 'completed' ? 'text-bg-success' : 'text-bg-secondary'}`}>{statusLabels[value] ?? value}</span>;
}
