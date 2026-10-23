<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    public function index(Request $request): Response
    {
        $filters = $request->validate(['search' => ['nullable', 'string', 'max:100'], 'status' => ['nullable', 'in:active,inactive']]);
        $services = Service::query()->when($filters['search'] ?? null, fn ($query, $search) => $query->where('name', 'like', '%'.$search.'%'))
            ->when($filters['status'] ?? null, fn ($query, $status) => $query->where('is_active', $status === 'active'))
            ->orderBy('sort_order')->orderBy('id')->paginate(15)->withQueryString();

        return Inertia::render('Admin/Services', ['services' => $services, 'filters' => $filters]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/ServiceForm', ['service' => null, 'options' => Service::orderBy('name')->get(['slug', 'name'])]);
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        $service = Service::create($request->validated());

        return to_route('admin.services.edit', $service)->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service): Response
    {
        return Inertia::render('Admin/ServiceForm', ['service' => $service, 'options' => Service::whereKeyNot($service->id)->orderBy('name')->get(['slug', 'name'])]);
    }

    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        return back()->with('success', 'Perubahan layanan disimpan.');
    }
}
