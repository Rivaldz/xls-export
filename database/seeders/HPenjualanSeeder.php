<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 125 ; $i++) { 
        $faker = Faker::create('id_ID');
        $payment = $faker->unique()->randomElement($array = array ('Umum','BPJS','Asuransi'));
        $year = rand(2020, 2021);
        $month = rand(1, 12);
        $day = rand(1, 28);

        $date = Carbon::create($year,$month ,$day , 0, 0, 0);
            \DB::table('h_penjualans')->insert([
                'nomor_resep' => $faker->randomDigit,
                'tanggal' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
                'no_rm_pasien' => $faker->numberBetween(44,321),
                'no_registrasi_pasien' => $faker->numberBetween(44,321),
                'nama_pasien' => $faker->name,
                'jenis_pasien' => $payment,
                'total' => $faker->numberBetween(10000,100000),
                'created_at' => $faker->datetime,
                'updated_at' => $faker->datetime,
            ]);
        }

    }
}
