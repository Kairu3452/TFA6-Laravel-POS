@extends('layouts.app')

@section('view_file', 'users/index.blade.php')

@section('content')
    <header class="page-header">
        <p class="eyebrow">Accounts</p>
        <h1>User Accounts</h1>
        <p class="lead">Staff accounts that can log in to the POS, with their role and last login.</p>
        <p class="source-note">Data source: <code>users</code> table via the <code>User</code> Eloquent model</p>
    </header>

    <section class="stats" aria-label="User summary">
        <div class="stat">
            <span class="stat-label">Total users</span>
            <span class="stat-value">{{ $summary['total'] }}</span>
        </div>
        <div class="stat">
            <span class="stat-label">Active</span>
            <span class="stat-value">{{ $summary['active'] }}</span>
        </div>
        @foreach ($summary['roles'] as $role => $count)
            <div class="stat">
                <span class="stat-label">{{ \Illuminate\Support\Str::plural($role, $count) }}</span>
                <span class="stat-value">{{ $count }}</span>
            </div>
        @endforeach
    </section>

    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last login</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td>
                            <span class="cell-title">{{ $user->full_name }}</span>
                            <span class="cell-sub">{{ $user->email }}</span>
                        </td>
                        <td><code>{{ $user->username }}</code></td>
                        <td><span class="badge role-{{ \Illuminate\Support\Str::slug($user->role) }}">{{ $user->role }}</span></td>
                        <td><span class="status status-{{ strtolower($user->status) }}">{{ $user->status }}</span></td>
                        <td class="nowrap">{{ $user->last_login_at?->format('M d, Y g:i A') ?? 'Never' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
