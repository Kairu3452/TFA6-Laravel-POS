<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Seed the customers table with 6 sample records (the same records
     * that were hard-coded in the TFA5 static array).
     */
    public function run(): void
    {
        $customers = [
            ['code' => 'CUS-0001', 'full_name' => 'Maria Santos', 'email' => 'maria.santos@example.com', 'phone' => '0917 555 0101', 'city' => 'Quezon City', 'tier' => 'Gold', 'points' => 2450, 'status' => 'Active', 'joined' => '2025-01-14'],
            ['code' => 'CUS-0002', 'full_name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@example.com', 'phone' => '0918 555 0102', 'city' => 'Manila', 'tier' => 'Silver', 'points' => 1180, 'status' => 'Active', 'joined' => '2025-03-02'],
            ['code' => 'CUS-0003', 'full_name' => 'Angela Reyes', 'email' => 'angela.reyes@example.com', 'phone' => '0919 555 0103', 'city' => 'Makati City', 'tier' => 'Regular', 'points' => 320, 'status' => 'Active', 'joined' => '2025-06-21'],
            ['code' => 'CUS-0004', 'full_name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '0920 555 0104', 'city' => 'Taguig City', 'tier' => 'Gold', 'points' => 3105, 'status' => 'Active', 'joined' => '2024-11-08'],
            ['code' => 'CUS-0005', 'full_name' => 'Bea Mendoza', 'email' => 'bea.mendoza@example.com', 'phone' => '0921 555 0105', 'city' => 'Pasig City', 'tier' => 'Silver', 'points' => 875, 'status' => 'Inactive', 'joined' => '2025-02-27'],
            ['code' => 'CUS-0006', 'full_name' => 'Carlo Bautista', 'email' => 'carlo.bautista@example.com', 'phone' => '0922 555 0106', 'city' => 'Caloocan City', 'tier' => 'Regular', 'points' => 140, 'status' => 'Active', 'joined' => '2025-09-05'],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrCreate(['code' => $customer['code']], $customer);
        }
    }
}
