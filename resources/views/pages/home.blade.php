@extends('layouts.app')

@section('view_file', 'pages/home.blade.php')

@section('content')
    <section class="hero">
        <div class="hero-copy">
            <p class="eyebrow">Point of Sale &middot; Laravel {{ app()->version() }}</p>
            <h1>Run the counter, know your customers.</h1>
            <p class="lead">
                TFA6 POS is the Laravel point-of-sale app, now backed by a real database. Customer and user records
                come from migrations and seeders and are retrieved with Eloquent models instead of static arrays.
            </p>
            <div class="actions">
                <a href="{{ route('customers.index') }}" class="btn btn-primary">View Customer Accounts</a>
                <a href="{{ route('users.index') }}" class="btn btn-ghost">View User Accounts</a>
            </div>
        </div>

        <div class="receipt" aria-hidden="true">
            <div class="receipt-head">
                <strong>TFA6 POS</strong>
                <span>Receipt #000128</span>
            </div>
            <ul class="receipt-lines">
                <li><span>Iced Coffee &times; 2</span><span>&#8369;240.00</span></li>
                <li><span>Ensaymada &times; 3</span><span>&#8369;135.00</span></li>
                <li><span>Bottled Water</span><span>&#8369;25.00</span></li>
            </ul>
            <div class="receipt-total"><span>Total</span><span>&#8369;400.00</span></div>
            <p class="receipt-foot">Cashier: kpingol &middot; Customer: CUS-0001</p>
        </div>
    </section>

    <section class="section">
        <h2 class="section-title">Modules</h2>
        <div class="card-grid">
            @foreach ($modules as $module)
                <a href="{{ route($module['route']) }}" class="module-card">
                    <span class="module-icon icon-{{ $module['icon'] }}" aria-hidden="true">
                        @if ($module['icon'] === 'customers')
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14.5a6.5 6.5 0 0 1 3.5 5.5"/></svg>
                        @elseif ($module['icon'] === 'users')
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        @else
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7.5h.01"/></svg>
                        @endif
                    </span>
                    <h3>{{ $module['title'] }}</h3>
                    <p>{{ $module['description'] }}</p>
                    <span class="module-link">Open &rarr;</span>
                </a>
            @endforeach
        </div>
    </section>

    <section class="section">
        <h2 class="section-title">How a page is served</h2>
        <ol class="flow">
            <li>
                <span class="flow-step">1</span>
                <div>
                    <h3>Route</h3>
                    <p><code>routes/web.php</code> matches the URL and names the controller method to run.</p>
                </div>
            </li>
            <li>
                <span class="flow-step">2</span>
                <div>
                    <h3>Controller</h3>
                    <p><code>app/Http/Controllers</code> prepares the data, such as the static customer array.</p>
                </div>
            </li>
            <li>
                <span class="flow-step">3</span>
                <div>
                    <h3>Blade view</h3>
                    <p><code>resources/views</code> loops through the data with <code>@@foreach</code> and renders HTML.</p>
                </div>
            </li>
        </ol>
    </section>
@endsection
