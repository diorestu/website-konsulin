<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ConsultationController extends Controller
{
    public function index(Request $request): Response
    {
        $filters = $request->validate(['search' => ['nullable', 'string', 'max:100'], 'status' => ['nullable', 'in:new,in_progress,completed']]);
        $consultations = DB::table('consultation_requests')->select(['id', 'name', 'email', 'company', 'service', 'status', 'created_at'])
            ->when($filters['search'] ?? null, function ($query, $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->orWhere('company', 'like', '%'.$search.'%');
                });
            })->when($filters['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->latest('id')->paginate(15)->withQueryString();

        return Inertia::render('Admin/Consultations', ['consultations' => $consultations, 'filters' => $filters]);
    }

    public function show(int $consultation): Response
    {
        $record = DB::table('consultation_requests')->find($consultation);
        abort_unless($record, 404);

        return Inertia::render('Admin/ConsultationDetail', ['consultation' => $record]);
    }

    public function update(Request $request, int $consultation): RedirectResponse
    {
        abort_unless(DB::table('consultation_requests')->where('id', $consultation)->exists(), 404);
        $validated = $request->validate(['status' => ['required', 'in:new,in_progress,completed']]);
        DB::table('consultation_requests')->where('id', $consultation)->update([...$validated, 'updated_at' => now()]);

        return back()->with('success', 'Status konsultasi diperbarui.');
    }
}
