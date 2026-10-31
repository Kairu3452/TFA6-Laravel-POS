<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Handles the two informational pages of the POS application.
 *
 * Route (routes/web.php) -> PageController method -> Blade view
 *   GET /       -> home()  -> resources/views/pages/home.blade.php
 *   GET /about  -> about() -> resources/views/pages/about.blade.php
 */
class PageController extends Controller
{
    /**
     * Landing page (/).
     */
    public function home(): View
    {
        $modules = [
            [
                'title' => 'Customer Accounts',
                'description' => 'View every registered customer, their membership tier and loyalty points.',
                'route' => 'customers.index',
                'icon' => 'customers',
            ],
            [
                'title' => 'User Accounts',
                'description' => 'See the staff accounts that can log in to the POS and the role of each one.',
                'route' => 'users.index',
                'icon' => 'users',
            ],
            [
                'title' => 'About the System',
                'description' => 'Learn how this Laravel rebuild maps to the CodeIgniter version from TFA1.',
                'route' => 'about',
                'icon' => 'about',
            ],
        ];

        return view('pages.home', [
            'title' => 'Home',
            'modules' => $modules,
        ]);
    }

    /**
     * About page (/about).
     */
    public function about(): View
    {
        // CodeIgniter 4 (TFA1) vs Laravel (TFA6): same MVC responsibilities, different files.
        $comparisons = [
            ['part' => 'Routes', 'codeigniter' => 'app/Config/Routes.php', 'laravel' => 'routes/web.php'],
            ['part' => 'Controllers', 'codeigniter' => 'app/Controllers/', 'laravel' => 'app/Http/Controllers/'],
            ['part' => 'Views', 'codeigniter' => 'app/Views/*.php', 'laravel' => 'resources/views/*.blade.php'],
            ['part' => 'Echo a value', 'codeigniter' => '<?= esc($name) ?>', 'laravel' => '{{ $name }}'],
            ['part' => 'Loop', 'codeigniter' => '<?php foreach ($rows as $row): ?>', 'laravel' => '@foreach ($rows as $row)'],
            ['part' => 'Layouts', 'codeigniter' => '$this->extend() / $this->section()', 'laravel' => '@extends / @section / @yield'],
            ['part' => 'CLI tool', 'codeigniter' => 'php spark', 'laravel' => 'php artisan'],
            ['part' => 'Dev server', 'codeigniter' => 'php spark serve', 'laravel' => 'php artisan serve'],
        ];

        return view('pages.about', [
            'title' => 'About',
            'comparisons' => $comparisons,
        ]);
    }
}
