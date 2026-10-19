<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    public function store(StoreConsultationRequest $request): RedirectResponse
    {
        DB::table('consultation_requests')->insert([
            ...$request->safe()->only(['name', 'email', 'company', 'service', 'message']),
            'consented_at' => now(),
            'status' => 'new',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $returnRoute = parse_url($request->headers->get('referer', ''), PHP_URL_PATH) === '/kontak'
            ? 'contact' : 'home';

        return to_route($returnRoute)->with('consultation_received', true);
    }
}
