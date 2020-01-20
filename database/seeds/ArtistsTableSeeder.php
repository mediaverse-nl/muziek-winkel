<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Artists::class, 10)->create()->each(function ($r) {
            $r->albums()->save(factory(App\Albums::class)->make());
        });
    }
}
