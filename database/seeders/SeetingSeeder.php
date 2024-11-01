<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeetingSeeder extends Seeder
{

    use WithoutModelEvents;

    public function run()
    {
        $rows = [
            [
                'name' => 'Link Facebook',
                'key' => 'site.link_facebook',
                'value' => 'https://www.facebook.com',
            ],
            [
                'name' => 'Link Instagram',
                'key' => 'site.link_instagram',
                'value' => 'https://www.instagram.com/',
            ],
            [
                'name' => 'Link YouTube',
                'key' => 'site.link_youtube',
                'value' => 'https://linktr.ee',
            ],
            [
                'name' => 'Link Linkedin',
                'key' => 'site.link_linkedin',
                'value' => 'https://linktr.ee',
            ],
            [
                'name' => 'Link WhatsApp',
                'key' => 'site.link_whatsapp',
                'value' => 'https://wa.me/5586981225473',
            ],
            [
                'name' => 'Telefone',
                'key' => 'site.phone_number',
                'value' => '(86) 98122-5473',
            ],
            [
                'name' => 'E-mail',
                'key' => 'site.email',
                'value' => 'contato@vortexeducacao.com.br',
            ],
        ];

        Setting::query()
            ->insert($rows);
    }
}
