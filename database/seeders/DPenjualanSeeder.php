<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\h_penjualan;
use Faker\Factory as Faker;

class DPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Medicine($faker));
        $id_h_penjualan = h_penjualan::all()->pluck('id')->toArray();
        
        for ($i=0; $i < 125 ; $i++) { 
            $satuan = $faker->randomElement($array = array ('pack','lusin','strip','karton'));

            $jumlah = $faker->numberBetween(1,300);
            $harga = $faker->numberBetween(1000,100000);
    
            \DB::table('d_penjualans')->insert([
                'id_h_penjualan' => $faker->unique()->randomElement($id_h_penjualan),
                'id_obat' => $faker->numberBetween(1,50),
                'nama_obat' => $faker->medicine,
                'jumlah' => $jumlah,
                'satuan' => $satuan,
                'harga' => $harga,
                'subtotal' => $jumlah * $harga,
                'created_at' => $faker->datetime,
                'updated_at' => $faker->datetime,
            ]);
        }
    }
}
