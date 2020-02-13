<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
          'name' => 'Laravel 8',
          'slug'=> Str::slug('Laravel 8')
        ]);

         Channel::create([
          'name' => 'Vue 8',
          'slug'=> Str::slug('Vue 8')
        ]);

         Channel::create([
          'name' => 'JS 8',
          'slug'=> Str::slug('JS 8')
        ]);
    }
}
