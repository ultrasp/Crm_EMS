<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FieldCategory;
use Illuminate\Support\Str;

class FieldTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = FieldCategory::get();
        foreach ($categories as $key => $cat) {
            for ($i=1; $i < 5; $i++) { 
                DB::table('field_templates')->insert([
                    'name' => $cat->name.' шаблон '.$i,
                    'full_description' => $cat->name.' шаблон '.$i.' описание',
                    'field_category_id' => $cat->id,
                    'subscriber_id' => 0,
                    'created_by' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
