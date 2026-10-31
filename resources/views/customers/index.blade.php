@extends('layouts.app')

@section('view_file', 'customers/index.blade.php')

@section('content')
    <header class="page-header">
        <p class="eyebrow">Accounts</p>
        <h1>Customer Accounts</h1>
        <p class="lead">Registered POS customers, their membership tier and loyalty points.</p>
        <p class="source-note">Data source: <code>customers</code> table via the <code>Customer</code> Eloquent model</p>
    </header>

    <section class="stats" aria-label="Customer summary">
        <div class="stat">
            <span class="stat-label">Total customers</span>
            <span class="stat-value">{{ $summary['total'] }}</span>
        </div>
        <div class="stat">
            <span class="stat-label">Active</span>
            <span class="stat-value">{{ $summary['active'] }}</span>
        </div>
        <div class="stat">
            <span class="stat-label">Gold members</span>
            <span class="stat-value">{{ $summary['gold'] }}</span>
        </div>
        <div class="stat">
            <span class="stat-label">Loyalty points</span>
            <span class="stat-value">{{ number_format($summary['points']) }}</span>
        </div>
    </section>

    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Tier</th>
                    <th scope="col" class="num">Points</th>
                    <th scope="col">Status</th>
                    <th scope="col">Joined</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td><code>{{ $customer->code }}</code></td>
                        <td>
                            <span class="cell-title">{{ $customer->full_name }}</span>
                            <span class="cell-sub">{{ $customer->email }}</span>
                        </td>
                        <td class="nowrap">{{ $customer->phone }}</td>
                        <td>{{ $customer->city }}</td>
                        <td><span class="badge tier-{{ strtolower($customer->tier) }}">{{ $customer->tier }}</span></td>
                        <td class="num">{{ number_format($customer->points) }}</td>
                        <td><span class="status status-{{ strtolower($customer->status) }}">{{ $customer->status }}</span></td>
                        <td class="nowrap">{{ $customer->joined->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
