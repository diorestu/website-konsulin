<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('access-admin') ?? false;
    }

    public function rules(): array
    {
        return [
            'brand_name' => ['required', 'string', 'max:255'],
            'brand_description' => ['required', 'string', 'max:1000'],
            'brand_services' => ['required', 'string', 'max:1000'],
            'footer_tagline' => ['required', 'string', 'max:255'],
            'whatsapp_primary' => ['required', 'regex:/^62[0-9]{8,13}$/'],
            'whatsapp_secondary' => ['required', 'regex:/^62[0-9]{8,13}$/'],
            'email' => ['required', 'email:rfc', 'max:180'],
            'instagram' => ['nullable', 'url:http,https', 'max:500'],
            'tiktok' => ['nullable', 'url:http,https', 'max:500'],
            'linkedin' => ['nullable', 'url:http,https', 'max:500'],
            'offices' => ['present', 'array', 'max:20'],
            'offices.*' => ['array:name,address,map_url,map_embed_url'],
            'offices.*.name' => ['required', 'string', 'max:120'],
            'offices.*.address' => ['required', 'string', 'max:1000'],
            'offices.*.map_url' => ['nullable', 'url:https', 'max:1000', 'regex:~^https://(?:maps\.app\.goo\.gl/|(?:www\.google\.com|maps\.google\.com)/maps(?:[/?]))~'],
            'offices.*.map_embed_url' => ['nullable', 'url:https', 'max:2000', 'regex:~^https://(?:www\.google\.com|maps\.google\.com)/maps(?:[/?])~'],
            'humi_company' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/'],
        ];
    }
}
