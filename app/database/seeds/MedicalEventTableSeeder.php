<?php

class MedicalEventTableSeeder extends Seeder {

    /**
     * Run the medical event table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_events')->delete();

        for ($i = 0; $i < 6; $i++) {

            MedicalEvent::create([
                'event_title' => "Title$i",
                'event_start' => (new DateTime('NOW'))->add(new DateInterval('P'.$i.'D')),
                'event_description' => "Description $i",
                'user_id' => ($i % 2) + 1,
            ]);
        }
    }
}
