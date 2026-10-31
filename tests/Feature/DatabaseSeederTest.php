<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The migrations and seeders create 6 customers and 6 users.
     */
    public function test_seeders_fill_customers_and_users_tables(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertSame(6, Customer::count());
        $this->assertSame(6, User::count());

        $this->assertDatabaseHas('customers', ['code' => 'CUS-0001', 'full_name' => 'Maria Santos', 'tier' => 'Gold']);
        $this->assertDatabaseHas('users', ['username' => 'kpingol', 'full_name' => 'Kyle Pingol', 'role' => 'Administrator']);

        $this->assertTrue(Hash::check('password', User::where('username', 'kpingol')->value('password')));
    }

    /**
     * Running the seeder twice does not create duplicates.
     */
    public function test_seeders_can_run_more_than_once(): void
    {
        $this->seed(DatabaseSeeder::class);
        $this->seed(DatabaseSeeder::class);

        $this->assertSame(6, Customer::count());
        $this->assertSame(6, User::count());
    }
}
