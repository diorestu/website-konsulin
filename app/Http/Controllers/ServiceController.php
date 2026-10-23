<?php

namespace App\Http\Controllers;

use App\Support\PublicContent;
use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    public function show(string $service): Response
    {
        $details = collect(PublicContent::services())->firstWhere('id', $service);

        abort_unless($details, 404);

        return Inertia::render('ServiceDetail', ['service' => $details]);
    }
}
