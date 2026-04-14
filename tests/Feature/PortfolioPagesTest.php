<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioPagesTest extends TestCase
{
    public function test_home_page_loads(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Kopi Senja')
            ->assertSee('Portofolio kafe modern');
    }

    public function test_menu_page_loads(): void
    {
        $this->get('/menu')
            ->assertOk()
            ->assertSee('Menu unggulan')
            ->assertSee('Senja Latte');
    }

    public function test_gallery_page_loads(): void
    {
        $this->get('/gallery')
            ->assertOk()
            ->assertSee('Galeri')
            ->assertSee('suasana');
    }

    public function test_contact_page_loads(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSee('Kontak')
            ->assertSee('Reservasi');
    }
}