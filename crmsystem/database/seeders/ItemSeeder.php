<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'カット',
                'memo' => 'カット詳細',
                'price' => 6000,
            ],
            [
                'name' => 'カラー',
                'memo' => 'カラー詳細',
                'price' => 8000,
            ],
            [
                'name' => 'パーマ',
                'memo' => 'パーマ詳細',
                'price' => 13000,
            ]
        ]);
    }
}
