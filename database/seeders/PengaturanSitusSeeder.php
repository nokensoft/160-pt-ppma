<?php

namespace Database\Seeders;

use App\Models\PengaturanSitus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PengaturanSitusSeeder extends Seeder
{
    public function run(): void
    {
        // Copy logo ke storage
        $logoSrc = public_path('img/logo-ppma-papua-2026.png');
        $logoPath = null;
        if (File::exists($logoSrc)) {
            $logoPath = 'situs/logo-ppma-papua-2026.png';
            Storage::disk('public')->put($logoPath, File::get($logoSrc));
            $this->command->info('Logo disalin ke storage: ' . $logoPath);
        }

        // Copy gambar kantor ke storage untuk OG Image
        $kantorSrc = public_path('img/logo-ppma-papua-2026.png');
        $ogImagePath = null;
        if (File::exists($kantorSrc)) {
            $ogImagePath = 'situs/og-image-ppma-papua.png';
            Storage::disk('public')->put($ogImagePath, File::get($kantorSrc));
            $this->command->info('OG Image disalin ke storage: ' . $ogImagePath);
        }

        $settings = [
            // Umum
            'nama_situs'    => 'PPMA Papua',
            'nama_situs_en' => 'The Association for Papuan Indigenous Peoples Study & Empowerment',
            'deskripsi_situs' => 'Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua (PPMA Papua) — Mendorong kedaulatan masyarakat adat Papua sejak 1988. Periode 2020–2025.',
            // Kontak
            'email'              => 'ptppma_papua@yahoo.com',
            'email_direktur'     => 'naomialfrida@gmail.com',
            'email_ketua'        => 'Wamebu.zadrak@yahoo.com',
            'telepon'            => '+62 821-9750-1692',
            'fax'                => '+62 821-9750-1692',
            'whatsapp_direktur'  => '6282197501692',
            'whatsapp_ketua'     => '6282197501692',
            'alamat'             => 'Jl. Pramuka No. 18, Buper Waena, Kota Jayapura, Provinsi Papua, Indonesia',
            'website'            => 'www.ptppma.org',
            'logo'               => $logoPath,
            // Peta
            'koordinat_maps'   => '-2.5956° LS, 140.6518° BT (Buper Waena, Jayapura)',
            'google_maps_link' => 'https://maps.app.goo.gl/nnM7wy8oRGP1LUb88',
            'google_maps_embed'=> 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4727.878863785716!2d140.6304858749691!3d-2.5901543973879075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686cf55189529d0f%3A0x63f901f3c0960fda!2sPt.%20PPMA-papua!5e1!3m2!1sid!2sid!4v1774798326928!5m2!1sid!2sid',
            // Media Sosial
            'sosmed_facebook'  => null,
            'sosmed_instagram' => null,
            'sosmed_youtube'   => null,
            'sosmed_twitter'   => null,
            'sosmed_tiktok'    => null,
            'sosmed_whatsapp'  => '6282197501692',
            // Rekening Donasi
            'donasi_rek_bri'     => null,
            'donasi_rek_bni'     => null,
            'donasi_rek_mandiri' => null,
            // SEO
            'seo_meta_keywords'   => 'PPMA Papua, Pt PPMA, masyarakat adat Papua, pemberdayaan, pengkajian, advokasi, Papua, hak adat, indigenous peoples',
            'seo_meta_description'=> 'Website resmi PPMA Papua — Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua. Mendorong kedaulatan masyarakat adat sejak 1988.',
            'seo_og_image'        => $ogImagePath,
        ];

        foreach ($settings as $key => $value) {
            PengaturanSitus::create(['key' => $key, 'value' => $value]);
        }
    }
}
