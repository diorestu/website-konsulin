<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('access-admin') ?? false;
    }

    public function rules(): array
    {
        $service = $this->route('service');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:40', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('services', 'slug')->ignore($service), ...($service ? [Rule::in([$service->slug])] : [])],
            'summary' => ['required', 'string', 'max:1000'],
            'description' => ['required', 'string', 'max:20000'],
            'scope' => ['required', 'array', 'min:1', 'max:30'], 'scope.*' => ['required', 'string', 'max:1000'],
            'preparation' => ['required', 'array', 'min:1', 'max:30'], 'preparation.*' => ['required', 'string', 'max:1000'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:10000'],
            'is_active' => ['required', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:255'], 'seo_description' => ['nullable', 'string', 'max:1000'],
            'related_services' => ['present', 'array', 'max:6'],
            'related_services.*' => ['required', 'string', 'distinct', Rule::exists('services', 'slug'), Rule::notIn([$this->input('slug')])],
        ];
    }
}
