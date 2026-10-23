<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'new' => DB::table('consultation_requests')->where('status', 'new')->count(),
                'in_progress' => DB::table('consultation_requests')->where('status', 'in_progress')->count(),
                'completed' => DB::table('consultation_requests')->where('status', 'completed')->count(),
                'services' => Service::where('is_active', true)->count(),
            ],
            'recent' => DB::table('consultation_requests')->select(['id', 'name', 'service', 'status', 'created_at'])->latest('id')->limit(5)->get(),
        ]);
    }
}
