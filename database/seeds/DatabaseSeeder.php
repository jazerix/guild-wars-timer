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
            'name' => 'Tequatl the Sunless',
            'location' => 'Splintered Coast',
            'type' => 'world',
            'has_states' => false,
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

        $jormag = \App\Event::create([
            'name' => 'Claw of Jormag',
            'location' => 'Frostwalk Tundra',
            'type' => 'world',
            'has_states' => false,
            'duration' => '30',
            'waypoint_link' => '[&BHwCAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Claw_of_Jormag',
            'class' => 'jormag'
        ])->times()->createMany([
            ['time_at' => '2:30'],
            ['time_at' => '5:30'],
            ['time_at' => '8:30'],
            ['time_at' => '11:30'],
            ['time_at' => '14:30'],
            ['time_at' => '17:30'],
            ['time_at' => '20:30'],
            ['time_at' => '23:30'],
        ]);

        $behemoth = \App\Event::create([
            'name' => 'Shadow Behemoth',
            'location' => 'Godslost Swamp',
            'type' => 'world',
            'has_states' => false,
            'duration' => '15',
            'waypoint_link' => '[&BPwAAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Defeat_the_shadow_behemoth',
            'class' => 'behemoth'
        ])->times()->createMany([
            ['time_at' => '1:45'],
            ['time_at' => '3:45'],
            ['time_at' => '5:45'],
            ['time_at' => '7:45'],
            ['time_at' => '9:45'],
            ['time_at' => '11:45'],
            ['time_at' => '13:45'],
            ['time_at' => '15:45'],
            ['time_at' => '17:45'],
            ['time_at' => '19:45'],
            ['time_at' => '21:45'],
            ['time_at' => '23:45'],
        ]);
    }
}
