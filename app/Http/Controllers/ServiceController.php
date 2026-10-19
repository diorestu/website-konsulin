<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    public function show(string $service): Response
    {
        $details = collect(config('konsulin.services'))->firstWhere('id', $service);

        abort_unless($details, 404);

        return Inertia::render('ServiceDetail', ['service' => $details]);
    }
}
