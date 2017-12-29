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
        $minute = 0;
        $hour = 0;
        while(! ($minute == 0 && $hour == 24))
        {
            \App\Time::create([
                'at' => "$hour:$minute"
            ]);
            if ($minute == 55)
            {
                $minute = 0;
                $hour++;
                continue;
            }
            $minute += 5;
        }

        $auricBasin = \App\Event::create([
            'name' => 'Octovine',
            'location' => 'Auric Basin',
            'location_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'waypoint_link' => '[&BAEJAAA=]',
            'wiki_link' => 'https://wiki.guildwars2.com/wiki/Auric_Basin',
            'class' => 'octovine'
        ]);

        $auricBasin->states()->createMany([
            ['name' => 'Challenges', 'starts_at' => '0:45'],
            ['name' => 'Octovine', 'starts_at' => '1:00'],
            ['name' => 'Reset', 'starts_at' => '1:20'],
        ]);
    }
}
