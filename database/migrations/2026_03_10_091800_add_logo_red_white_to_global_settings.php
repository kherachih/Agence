<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $keys = ['logo_red', 'logo_white'];

        foreach ($keys as $key) {
            if (!DB::table('global_settings')->where('key', $key)->exists()) {
                DB::table('global_settings')->insert([
                    'key' => $key,
                    'value' => '',
                ]);
            }
        }
    }

    public function down(): void
    {
        DB::table('global_settings')->whereIn('key', ['logo_red', 'logo_white'])->delete();
    }
};
