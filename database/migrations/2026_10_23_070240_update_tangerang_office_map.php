<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $row = DB::table('site_settings')->where('key', 'website')->first();
        if (! $row) {
            return;
        }
        $settings = json_decode($row->value, true, 512, JSON_THROW_ON_ERROR);
        foreach ($settings['offices'] ?? [] as $index => $office) {
            if (($office['name'] ?? '') === 'HQ Tangerang') {
                $settings['offices'][$index]['map_url'] = 'https://maps.app.goo.gl/aaCC8CwQ24rmXj5Q9';
                $settings['offices'][$index]['map_embed_url'] = 'https://maps.google.com/maps?cid=607535924842059666&z=17&output=embed';
            }
        }
        DB::table('site_settings')->where('key', 'website')->update(['value' => json_encode($settings, JSON_THROW_ON_ERROR), 'updated_at' => now()]);
    }

    public function down(): void
    {
        $row = DB::table('site_settings')->where('key', 'website')->first();
        if (! $row) {
            return;
        }
        $settings = json_decode($row->value, true, 512, JSON_THROW_ON_ERROR);
        foreach ($settings['offices'] ?? [] as $index => $office) {
            if (($office['map_url'] ?? '') === 'https://maps.app.goo.gl/aaCC8CwQ24rmXj5Q9') {
                unset($settings['offices'][$index]['map_url'], $settings['offices'][$index]['map_embed_url']);
            }
        }
        DB::table('site_settings')->where('key', 'website')->update(['value' => json_encode($settings, JSON_THROW_ON_ERROR), 'updated_at' => now()]);
    }
};
