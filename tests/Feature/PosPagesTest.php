<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PosPagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Fill the customers and users tables before every test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);
    }

    /**
     * All four routes respond and render the expected Blade view.
     */
    public function test_every_page_loads(): void
    {
        $pages = [
            '/' => ['pages.home', 'Run the counter, know your customers.'],
            '/about' => ['pages.about', 'About TFA6 POS'],
            '/customers' => ['customers.index', 'Customer Accounts'],
            '/users' => ['users.index', 'User Accounts'],
        ];

        foreach ($pages as $uri => [$view, $heading]) {
            $this->get($uri)
                ->assertOk()
                ->assertViewIs($view)
                ->assertSee($heading);
        }
    }

    /**
     * Every page shows navigation links to all four pages.
     */
    public function test_navigation_links_to_all_pages_on_every_page(): void
    {
        foreach (['/', '/about', '/customers', '/users'] as $uri) {
            $response = $this->get($uri)->assertOk();

            foreach (['home', 'about', 'customers.index', 'users.index'] as $name) {
                $response->assertSee('href="'.route($name).'"', false);
            }
        }
    }

    /**
     * The customers page receives an Eloquent collection of Customer models
     * and renders every seeded record.
     */
    public function test_customers_page_lists_records_from_the_database(): void
    {
        $response = $this->get('/customers')->assertOk()->assertViewHas('customers');

        $customers = $response->viewData('customers');
        $this->assertInstanceOf(Collection::class, $customers);
        $this->assertContainsOnlyInstancesOf(Customer::class, $customers);
        $this->assertGreaterThanOrEqual(5, $customers->count());

        foreach (Customer::all() as $customer) {
            $response->assertSee($customer->full_name)->assertSee($customer->code);
        }
    }

    /**
     * The users page receives an Eloquent collection of User models and
     * renders every seeded record.
     */
    public function test_users_page_lists_records_from_the_database(): void
    {
        $response = $this->get('/users')->assertOk()->assertViewHas('users');

        $users = $response->viewData('users');
        $this->assertInstanceOf(Collection::class, $users);
        $this->assertContainsOnlyInstancesOf(User::class, $users);
        $this->assertGreaterThanOrEqual(5, $users->count());

        foreach (User::all() as $user) {
            $response->assertSee($user->full_name)->assertSee($user->username);
        }
    }

    /**
     * A record added to the database shows up on the page (no static data).
     */
    public function test_new_database_record_appears_on_customers_page(): void
    {
        Customer::create([
            'code' => 'CUS-0099',
            'full_name' => 'Test Customer',
            'email' => 'test.customer@example.com',
            'phone' => '0999 555 0199',
            'city' => 'Manila',
            'tier' => 'Regular',
            'points' => 0,
            'status' => 'Active',
            'joined' => '2026-10-31',
        ]);

        $this->get('/customers')->assertOk()->assertSee('Test Customer')->assertSee('CUS-0099');
    }

    /**
     * Unknown pages return 404.
     */
    public function test_unknown_page_returns_404(): void
    {
        $this->get('/does-not-exist')->assertNotFound();
    }
}
