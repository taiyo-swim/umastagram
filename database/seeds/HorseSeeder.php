<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horses')->insert([
            'name' => 'ディープインパクト',
            'color' => '鹿毛',
            'father_name' => 'サンデーサイレンス',
            'mother_name' => 'ウインドインハーヘア',
            'mothers_father_name' => 'Alzao',
            'owner' => '金子真人ホールディングス',
            'trainer' => '池江康郎',
            'producer' => 'ノーザンファーム',
            'birthday' => '2002年3月25日',
            'winning' => '06’ジャパンカップ(G1)',
        ]);
    }
}
