<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:180'],
            'company' => ['nullable', 'string', 'max:180'],
            'service' => ['required', Rule::in(array_column(config('konsulin.services'), 'id'))],
            'message' => ['required', 'string', 'min:15', 'max:3000'],
            'consent' => ['required', 'accepted'],
            'website' => ['nullable', 'string', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tuliskan nama Anda agar permintaan dapat dikenali.',
            'name.max' => 'Gunakan nama maksimal 120 karakter.',
            'email.required' => 'Tuliskan alamat email untuk tindak lanjut.',
            'email.email' => 'Periksa kembali format alamat email Anda.',
            'email.max' => 'Gunakan email maksimal 180 karakter.',
            'company.max' => 'Gunakan nama usaha maksimal 180 karakter.',
            'service.required' => 'Pilih layanan yang ingin Anda diskusikan.',
            'service.in' => 'Pilih salah satu layanan yang tersedia.',
            'message.required' => 'Ceritakan secara singkat kebutuhan Anda.',
            'message.min' => 'Tambahkan sedikit detail, minimal 15 karakter.',
            'message.max' => 'Ringkas kebutuhan Anda hingga maksimal 3.000 karakter.',
            'consent.required' => 'Setujui penggunaan data untuk permintaan konsultasi ini.',
            'consent.accepted' => 'Setujui penggunaan data untuk permintaan konsultasi ini.',
            'website.max' => 'Permintaan tidak dapat diproses. Muat ulang halaman dan coba lagi.',
        ];
    }
}
