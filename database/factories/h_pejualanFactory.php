<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\h_penjualan;

class h_pejualanFactory extends Factory
{
    protected $model = h_penjualan::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            //
            $payment = $this->faker->randomElement(['umum', 'BPJS','Asuransi']);
            return [
                'nomor_resep' => $this->faker-numberBetween(1,100),
                'tanggal' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'no_rm_pasien' => $this->faker->numberBetween(44,321),
                'no_registrasi_pasien' => $this->faker->numberBetween(44,321),
                'jenis_pasien' => $payment,
                'total' => $this->faker->numberBetween(10000,100000),
            ];
    }
}
