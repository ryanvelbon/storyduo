<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'name' => 'Spanish',
                'name_native' => 'Español',
                'code' => 'es',
                'flag_code' => 'es',
            ],
            [
                'name' => 'Italian',
                'name_native' => 'Italiano',
                'code' => 'it',
                'flag_code' => 'it',
            ],
            [
                'name' => 'German',
                'name_native' => 'Deutsch',
                'code' => 'de',
                'flag_code' => 'de',
            ],
            [
                'name' => 'French',
                'name_native' => 'Français',
                'code' => 'fr',
                'flag_code' => 'fr',
            ],
            [
                'name' => 'Portuguese',
                'name_native' => 'Português',
                'code' => 'pt',
                'flag_code' => 'pt',
            ],
            [
                'name' => 'Turkish',
                'name_native' => 'Türkçe',
                'code' => 'tr',
                'flag_code' => 'tr',
            ],
            [
                'name' => 'Indonesian',
                'name_native' => 'Bahasa Indonesia',
                'code' => 'id',
                'flag_code' => 'id',
            ],
            [
                'name' => 'Greek',
                'name_native' => 'Ελληνικά',
                'code' => 'el',
                'flag_code' => 'gr',
            ],
            [
                'name' => 'Russian',
                'name_native' => 'Русский',
                'code' => 'ru',
                'flag_code' => 'ru',
            ],
            [
                'name' => 'Dutch',
                'name_native' => 'Nederlands',
                'code' => 'nl',
                'flag_code' => 'nl',
            ],
            [
                'name' => 'Maltese',
                'name_native' => 'Malti',
                'code' => 'mt',
                'flag_code' => 'mt',
            ],
            [
                'name' => 'Malay',
                'name_native' => 'Bahasa Melayu',
                'code' => 'ms',
                'flag_code' => 'my',
            ],
            [
                'name' => 'Thai',
                'name_native' => 'ไทย',
                'code' => 'th',
                'flag_code' => 'th',
            ],
            [
                'name' => 'Vietnamese',
                'name_native' => 'Tiếng Việt',
                'code' => 'vi',
                'flag_code' => 'vn',
            ],
            [
                'name' => 'Khmer',
                'name_native' => 'ភាសាខ្មែរ',
                'code' => 'km',
                'flag_code' => 'kh',
            ],
            [
                'name' => 'Lao',
                'name_native' => 'ລາວ',
                'code' => 'lo',
                'flag_code' => 'la',
            ],
            [
                'name' => 'Javanese',
                'name_native' => 'Basa Jawa',
                'code' => 'jv',
                'flag_code' => 'id',
            ],
            [
                'name' => 'Sicilian',
                'name_native' => 'Sicilianu',
                'code' => 'scn',
                'flag_code' => 'scn',
            ],
            [
                'name' => 'Arabic',
                'name_native' => 'العربية',
                'code' => 'ar',
                'flag_code' => 'ps',
            ],
            [
                'name' => 'Polish',
                'name_native' => 'Polski',
                'code' => 'pl',
                'flag_code' => 'pl',
            ],
            [
                'name' => 'Hindi',
                'name_native' => 'हिन्दी',
                'code' => 'hi',
                'flag_code' => 'in',
            ],
            [
                'name' => 'Tamil',
                'name_native' => 'தமிழ்',
                'code' => 'ta',
                'flag_code' => 'in',
            ],
        ]);
    }
}
