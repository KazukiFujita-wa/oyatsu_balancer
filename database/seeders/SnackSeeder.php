<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SnackSeeder extends Seeder
{
    public function run(): void
    {
        $snacks = [
            // 甘いお菓子
            ['name' => 'ポッキー', 'price' => 150, 'taste' => 'sweet', 'image' => null],
            ['name' => 'きのこの山', 'price' => 180, 'taste' => 'sweet', 'image' => null],
            ['name' => 'たけのこの里', 'price' => 180, 'taste' => 'sweet', 'image' => null],
            ['name' => 'アルフォート', 'price' => 200, 'taste' => 'sweet', 'image' => null],
            ['name' => 'チョコパイ', 'price' => 160, 'taste' => 'sweet', 'image' => null],
            ['name' => 'コアラのマーチ', 'price' => 130, 'taste' => 'sweet', 'image' => null],
            ['name' => 'パイの実', 'price' => 170, 'taste' => 'sweet', 'image' => null],
            ['name' => 'マカダミアナッツチョコ', 'price' => 250, 'taste' => 'sweet', 'image' => null],
            ['name' => 'ブラックサンダー', 'price' => 40, 'taste' => 'sweet', 'image' => null],
            ['name' => 'うまい棒(チョコ)', 'price' => 12, 'taste' => 'sweet', 'image' => null],
            
            // しょっぱいお菓子
            ['name' => 'じゃがりこ', 'price' => 160, 'taste' => 'salty', 'image' => null],
            ['name' => 'プリングルス', 'price' => 180, 'taste' => 'salty', 'image' => null],
            ['name' => 'カラムーチョ', 'price' => 150, 'taste' => 'salty', 'image' => null],
            ['name' => 'サッポロポテト', 'price' => 140, 'taste' => 'salty', 'image' => null],
            ['name' => 'ポテトチップス', 'price' => 130, 'taste' => 'salty', 'image' => null],
            ['name' => 'チップスター', 'price' => 120, 'taste' => 'salty', 'image' => null],
            ['name' => 'ベビースター', 'price' => 80, 'taste' => 'salty', 'image' => null],
            ['name' => '柿の種', 'price' => 200, 'taste' => 'salty', 'image' => null],
            ['name' => 'かっぱえびせん', 'price' => 140, 'taste' => 'salty', 'image' => null],
            ['name' => 'うまい棒(めんたい)', 'price' => 12, 'taste' => 'salty', 'image' => null],
        ];

        foreach ($snacks as $snack) {
            DB::table('snacks')->insert([
                'name' => $snack['name'],
                'price' => $snack['price'],
                'taste' => $snack['taste'],
                'image' => $snack['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}