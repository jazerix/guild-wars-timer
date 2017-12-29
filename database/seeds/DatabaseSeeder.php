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
        /*$auricBasin = \App\Event::create([
            'name' => 'Octovine',
            'location' => 'Auric Basin',
            'type' => 'hot',
            'has_states' => true,
            'waypoint_link' => '[&BAEJAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'class' => 'octovine'
        ])->states()->createMany([
            ['name' => 'Challenges', 'starts_at' => '0:45'],
            ['name' => 'Octovine', 'starts_at' => '1:00'],
            ['name' => 'Reset', 'starts_at' => '1:20'],
        ]);*/

        $tequatl = \App\Event::create([
            'name' => 'Tequatl',
            'location' => 'Splintered Coast',
            'type' => 'world',
            'has_states' => true,
            'duration' => '15',
            'waypoint_link' => '[&BNABAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Tequatl_the_Sunless',
            'class' => 'tequatl'
        ])->times()->createMany([
            ['time_at' => '0:00'],
            ['time_at' => '3:00'],
            ['time_at' => '7:00'],
            ['time_at' => '11:30'],
            ['time_at' => '16:00'],
            ['time_at' => '19:00'],
        ]);
    }
}
