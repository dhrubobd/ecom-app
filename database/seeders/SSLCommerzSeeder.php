<?php

namespace Database\Seeders;

use App\Models\SslcommerzCredential;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SSLCommerzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SslcommerzCredential::updateorCreate(
            [
                'id' => 1,
            ],
            [
                'store_id' => 'your_store_id',
                'store_password' => 'your_store_password',
                'currency' => 'BDT',
                'success_url' => 'https://yourdomain.com/success',
                'fail_url' => 'https://yourdomain.com/fail',
                'cancel_url' => 'https://yourdomain.com/cancel',
                'ipn_url' => 'https://yourdomain.com/ipn',
                'init_url' => 'https://yourdomain.com/init',
            ]
        );
    }
}
