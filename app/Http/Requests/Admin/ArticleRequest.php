<?php

namespace App\Http\Requests\Admin;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('access-admin') ?? false;
    }

    public function rules(): array
    {
        $article = $this->route('article');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:160', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('articles', 'slug')->ignore($article), ...($article ? [Rule::in([$article->slug])] : [])],
            'excerpt' => ['required', 'string', 'max:1000'],
            'content' => ['required', 'string', 'max:200000', function (string $attribute, mixed $value, \Closure $fail): void {
                if (is_string($value) && preg_replace('/[\s\p{Z}\p{Cf}]+/u', '', html_entity_decode(strip_tags(Article::sanitize($value)), ENT_QUOTES | ENT_HTML5)) === '') {
                    $fail('Isi artikel perlu memuat teks.');
                }
            }],
            'category' => ['nullable', 'string', 'max:80'], 'status' => ['required', 'in:draft,published,archived'],
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'], 'remove_cover' => ['sometimes', 'boolean'],
            'cover_alt' => ['nullable', 'string', 'max:255'], 'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max.string' => ':attribute maksimal :max karakter.',
            'slug.regex' => 'URL hanya boleh berisi huruf kecil, angka, dan tanda hubung di antara kata.',
            'slug.unique' => 'URL ini sudah digunakan artikel lain. Gunakan URL yang berbeda.',
            'slug.in' => 'URL artikel yang sudah disimpan tidak dapat diubah.',
            'status.in' => 'Pilih status Draft, Terbit, atau Arsip.',
            'cover.image' => 'Sampul harus berupa gambar.',
            'cover.mimes' => 'Gunakan gambar JPG, PNG, atau WebP.',
            'cover.max' => 'Ukuran gambar sampul maksimal 5 MB.',
            'cover.uploaded' => 'Gambar sampul gagal diunggah. Coba gambar yang lebih kecil.',
            'remove_cover.boolean' => 'Pilihan hapus sampul tidak valid.',
        ];
    }

    /** @return array<string, string> */
    public function attributes(): array
    {
        return [
            'title' => 'Judul artikel', 'slug' => 'URL artikel', 'excerpt' => 'Ringkasan',
            'content' => 'Isi artikel', 'category' => 'Kategori', 'status' => 'Status',
            'cover_alt' => 'Teks alternatif sampul', 'seo_title' => 'Judul SEO',
            'seo_description' => 'Deskripsi SEO',
        ];
    }
}
