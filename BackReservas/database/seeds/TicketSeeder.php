<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'title' => 'Drive-In Cinema @ The Mall of San Juan',
            'description' => 'Drive-In Cinema @ The Mall of San Juan desde el 15 de julio de 2020. Boleto es por 1 Auto para un máximo de 5 personas en el auto.',
            'price' => 20000,
            'duration' => '2 horas',
            'place' => 'The Mall of San Juan',
            'photo' => 'https://www.ticketpop.com/assets/img/cartelera_MOSJ_FEB-4-5-6-ab29323330.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tickets')->insert([
            'title' => 'Dorado Drive-In Cinema en Parque Agroturístico El Dorado',
            'description' => 'Dorado Drive-In Cinema desde el 22 de octubre de 2020 en el Parque Agroturístico El Dorado a las 7:00 pm. Boleto es por 1 Auto para un máximo de ',
            'price' => 25000,
            'duration' => '2.5 horas',
            'place' => 'Agroturístico El Dorado',
            'photo' => 'https://www.ticketpop.com/assets/img/1180-dorado-b9a7bbdbee.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tickets')->insert([
            'title' => 'Melendi',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's ",
            'price' => 60000,
            'duration' => '2 horas',
            'place' => 'Santa Marta',
            'photo' => 'https://www.ticketpop.com/assets/img/cartelera_MOSJ_FEB-4-5-6-ab29323330.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tickets')->insert([
            'title' => 'In The Heights',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's",
            'price' => 30000,
            'duration' => '2 horas',
            'place' => 'Medellin',
            'photo' => 'https://www.ticketpop.com/assets/img/Intheheights-2021_1180-dc6b4dd032.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tickets')->insert([
            'title' => 'Vicente García',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's",
            'price' => 20000,
            'duration' => '2 horas',
            'place' => 'Cali',
            'photo' => 'https://www.ticketpop.com/assets/img/vicente-1180-374be21337.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tickets')->insert([
            'title' => 'Jorge Drexler',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's",
            'price' => 70000,
            'duration' => '1 horas',
            'place' => 'Bogotá',
            'photo' => 'https://www.ticketpop.com/assets/img/JD_Main-Artwork_TicketPop-Event-Image-1-d071706f92.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
