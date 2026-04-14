<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioPagesTest extends TestCase
{
    public function test_home_page_loads(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Portofolio kafe modern')
            ->assertSee('Siap dipakai untuk profil kafe, promo, atau landing page reservasi');
    }

    public function test_menu_page_loads(): void
    {
        $this->get('/menu')
            ->assertOk()
            ->assertSee('Koleksi menu yang mewakili karakter kafe')
            ->assertSee('Promo dan set menu bisa ditambahkan kapan saja.');
    }

    public function test_gallery_page_loads(): void
    {
        $this->get('/gallery')
            ->assertOk()
            ->assertSee('Galeri')
            ->assertSee('Tunjukkan suasana, bukan hanya produk');
    }

    public function test_contact_page_loads(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSee('Kontak')
            ->assertSee('Form reservasi sederhana');
    }
}