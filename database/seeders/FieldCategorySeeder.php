<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Specialization;
use Illuminate\Support\Str;

class FieldCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spec = Specialization::first();
        DB::table('field_categories')->insert([
            'name' => 'Діагнози',
            'key' => Str::slug('Діагнози'),
            'specialization_id' => $spec->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('field_categories')->insert([
            'name' => 'Скарги',
            'key' => Str::slug('Скарги'),
            'specialization_id' => $spec->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('field_categories')->insert([
            'name' => 'Перенесені та супутні захворювання',
            'key' => Str::slug('Перенесені та супутні захворювання','_'),
            'specialization_id' => $spec->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('field_categories')->insert([
            'name' => 'Щоденник лікаря',
            'key' => Str::slug('Щоденник лікаря','_'),
            'specialization_id' => $spec->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('field_categories')->insert([
            'name' => 'Епікриз',
            'key' => Str::slug('Епікриз','_'),
            'specialization_id' => $spec->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('field_categories')->insert([
            'name' => 'План обстеження',
            'key' => Str::slug('План обстеження','_'),
            'specialization_id' => $spec->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('field_categories')->insert([
            'name' => 'План лікування',
            'key' => Str::slug('План лікування','_'),
            'specialization_id' => $spec->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
