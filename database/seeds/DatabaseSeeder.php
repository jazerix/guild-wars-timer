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
            'waypoint_link' => '[&BPcAAAA=]',
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

        $mega = \App\Event::create([
            'name' => 'Megadestroyer',
            'location' => 'Maelstrom\'s Bile',
            'type' => 'world',
            'has_states' => false,
            'duration' => '15',
            'waypoint_link' => '[&BM0CAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/The_Battle_for_Mount_Maelstrom',
            'class' => 'mega'
        ])->times()->createMany([
            ['time_at' => '0:30'],
            ['time_at' => '3:30'],
            ['time_at' => '6:30'],
            ['time_at' => '9:30'],
            ['time_at' => '12:30'],
            ['time_at' => '15:30'],
            ['time_at' => '18:30'],
            ['time_at' => '21:30'],
        ]);

        $karka = \App\Event::create([
            'name' => 'Karka Queen',
            'location' => 'Driftglass Springs',
            'type' => 'world',
            'has_states' => false,
            'duration' => '10',
            'waypoint_link' => '[&BNcGAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Defeat_the_Karka_Queen_threatening_the_settlements',
            'class' => 'karka'
        ])->times()->createMany([
            ['time_at' => '2:00'],
            ['time_at' => '6:00'],
            ['time_at' => '10:30'],
            ['time_at' => '15:00'],
            ['time_at' => '18:00'],
            ['time_at' => '23:00'],
        ]);

        $ejw = \App\Event::create([
            'name' => 'Triple Trouble',
            'location' => 'Firth of Revanion',
            'type' => 'world',
            'has_states' => false,
            'duration' => '23',
            'waypoint_link' => '[&BKoBAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Triple_Trouble',
            'class' => 'ejw'
        ])->times()->createMany([
            ['time_at' => '1:00'],
            ['time_at' => '4:00'],
            ['time_at' => '8:00'],
            ['time_at' => '12:30'],
            ['time_at' => '17:00'],
            ['time_at' => '20:00'],
        ]);

        $shatterer = \App\Event::create([
            'name' => 'The Shatterer',
            'location' => 'Lowland Burns',
            'type' => 'world',
            'has_states' => false,
            'duration' => '15',
            'waypoint_link' => '[&BK8BAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Slay_the_Shatterer',
            'class' => 'shatterer'
        ])->times()->createMany([
            ['time_at' => '1:00'],
            ['time_at' => '4:00'],
            ['time_at' => '7:00'],
            ['time_at' => '10:30'],
            ['time_at' => '13:00'],
            ['time_at' => '16:00'],
            ['time_at' => '19:00'],
            ['time_at' => '22:00'],
        ]);

        $golem = \App\Event::create([
            'name' => 'Golem Mark II',
            'location' => 'Whitland Flats',
            'type' => 'world',
            'has_states' => false,
            'duration' => '15',
            'waypoint_link' => '[&BNQCAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Defeat_the_Inquest%27s_golem_Mark_II',
            'class' => 'golem'
        ])->times()->createMany([
            ['time_at' => '2:00'],
            ['time_at' => '5:00'],
            ['time_at' => '8:00'],
            ['time_at' => '11:30'],
            ['time_at' => '14:00'],
            ['time_at' => '17:00'],
            ['time_at' => '20:00'],
            ['time_at' => '23:00'],
        ]);

        $elemental = \App\Event::create([
            'name' => 'Fire Elemental',
            'location' => 'Thaumanova Reactor',
            'type' => 'world',
            'has_states' => false,
            'duration' => '15',
            'waypoint_link' => '[&BEcAAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Destroy_the_fire_elemental_created_from_chaotic_energy_fusing_with_the_C.L.E.A.N._5000%27s_energy_core',
            'class' => 'elemental'
        ])->times()->createMany([
            ['time_at' => '0:45'],
            ['time_at' => '2:45'],
            ['time_at' => '4:45'],
            ['time_at' => '6:45'],
            ['time_at' => '8:45'],
            ['time_at' => '10:45'],
            ['time_at' => '12:45'],
            ['time_at' => '14:45'],
            ['time_at' => '16:45'],
            ['time_at' => '18:45'],
            ['time_at' => '20:45'],
            ['time_at' => '22:45'],
        ]);

        $svanir = \App\Event::create([
            'name' => 'Svanir Shaman Chief',
            'location' => 'Hunter\'s Lake',
            'type' => 'world',
            'has_states' => false,
            'duration' => '15',
            'waypoint_link' => '[&BMIDAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Kill_the_Svanir_shaman_chief_to_break_his_control_over_the_ice_elemental',
            'class' => 'svanir'
        ])->times()->createMany([
            ['time_at' => '0:15'],
            ['time_at' => '2:15'],
            ['time_at' => '4:15'],
            ['time_at' => '6:15'],
            ['time_at' => '8:15'],
            ['time_at' => '10:15'],
            ['time_at' => '12:15'],
            ['time_at' => '14:15'],
            ['time_at' => '16:15'],
            ['time_at' => '18:15'],
            ['time_at' => '20:15'],
            ['time_at' => '22:15'],
        ]);

        $modniir = \App\Event::create([
            'name' => 'Modniir Ulgoth',
            'location' => 'Modniir Gorge',
            'type' => 'world',
            'has_states' => false,
            'duration' => '20',
            'waypoint_link' => '[&BLEAAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Defeat_Ulgoth_the_Modniir_and_his_minions',
            'class' => 'modniir'
        ])->times()->createMany([
            ['time_at' => '1:30'],
            ['time_at' => '4:30'],
            ['time_at' => '7:30'],
            ['time_at' => '10:30'],
            ['time_at' => '13:30'],
            ['time_at' => '16:30'],
            ['time_at' => '19:30'],
            ['time_at' => '22:30'],
        ]);

        $taidha = \App\Event::create([
            'name' => 'Taidha Covington',
            'location' => 'Laughing Gull Island',
            'type' => 'world',
            'has_states' => false,
            'duration' => '10',
            'waypoint_link' => '[&BKgBAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Kill_Admiral_Taidha_Covington',
            'class' => 'taidha'
        ])->times()->createMany([
            ['time_at' => '0:00'],
            ['time_at' => '3:00'],
            ['time_at' => '6:00'],
            ['time_at' => '9:00'],
            ['time_at' => '12:00'],
            ['time_at' => '15:00'],
            ['time_at' => '18:00'],
            ['time_at' => '21:00'],
        ]);

        $gjw = \App\Event::create([
            'name' => 'Great Jungle Wurm',
            'location' => 'Wychmire Swamp',
            'type' => 'world',
            'has_states' => false,
            'duration' => '15',
            'waypoint_link' => '[&BD4BAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Defeat_the_great_jungle_wurm',
            'class' => 'gjw'
        ])->times()->createMany([
            ['time_at' => '1:15'],
            ['time_at' => '3:15'],
            ['time_at' => '5:15'],
            ['time_at' => '7:15'],
            ['time_at' => '9:15'],
            ['time_at' => '11:15'],
            ['time_at' => '13:15'],
            ['time_at' => '15:15'],
            ['time_at' => '17:15'],
            ['time_at' => '19:15'],
            ['time_at' => '21:15'],
            ['time_at' => '23:15'],
        ]);

        $auricBasin = \App\Event::create([
            'name' => 'Octovine',
            'location' => 'Auric Basin',
            'type' => 'hot',
            'has_states' => true,
            'waypoint_link' => '[&BAEJAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'class' => 'octovine'
        ])->times()->createMany([
            ['time_at' => '0:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '1:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '1:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '1:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '2:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '3:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '3:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '3:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '4:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '5:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '5:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '5:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '6:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '7:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '7:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '7:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '8:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '9:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '9:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '9:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '10:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '11:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '11:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '11:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '12:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '13:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '13:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '13:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '14:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '15:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '15:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '15:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '16:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '17:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '17:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '17:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '18:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '19:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '19:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '19:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '20:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '21:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '21:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '21:30', 'duration' => 75, 'state' => 'Pylons'],
            ['time_at' => '22:45', 'duration' => 15, 'state' => 'Challenges'],
            ['time_at' => '23:00', 'duration' => 20, 'state' => 'Octovine'],
            ['time_at' => '23:20', 'duration' => 10, 'state' => 'Reset'],
            ['time_at' => '23:30', 'duration' => 75, 'state' => 'Pylons'],
        ]);

        $auricBasin = \App\Event::create([
            'name' => 'Night Bosses',
            'location' => 'Verdant Brink',
            'type' => 'hot',
            'has_states' => true,
            'waypoint_link' => '[&BAgIAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'class' => 'wyvern'
        ])->times()->createMany([
            ['time_at' => '0:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '0:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '1:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '2:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '2:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '3:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '4:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '4:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '5:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '6:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '6:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '7:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '8:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '8:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '9:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '10:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '10:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '11:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '12:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '12:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '13:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '14:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '14:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '15:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '16:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '16:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '17:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '18:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '18:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '19:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '20:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '20:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '21:45', 'duration' => 25, 'state' => 'Night'],
            ['time_at' => '22:10', 'duration' => 20, 'state' => 'Night Bosses'],
            ['time_at' => '22:30', 'duration' => 75, 'state' => 'Daytime'],
            ['time_at' => '23:45', 'duration' => 25, 'state' => 'Night']
        ]);
    }
}