<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auricBasin = \App\Event::create([
            'name' => 'Octovine',
            'location' => 'Auric Basin',
            'type' => 'hot',
            'has_states' => true,
            'location_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'waypoint_link' => '[&BAEJAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'class' => 'octovine'
        ])->states()->createMany([
            ['name' => 'Challenges', 'starts_at' => '0:45'],
            ['name' => 'Octovine', 'starts_at' => '1:00'],
            ['name' => 'Reset', 'starts_at' => '1:20'],
        ]);

        $tequatl = \App\Event::create([
            'name' => 'Tequatl',
            'location' => 'Splintered Coast',
            'type' => 'world',
            'has_states' => true,
            'location_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'waypoint_link' => '[&BAEJAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'class' => 'octovine'
        ]);
    }
}
