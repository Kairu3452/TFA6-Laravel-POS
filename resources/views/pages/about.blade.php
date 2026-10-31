@extends('layouts.app')

@section('view_file', 'pages/about.blade.php')

@section('content')
    <header class="page-header">
        <p class="eyebrow">About</p>
        <h1>About TFA6 POS</h1>
        <p class="lead">
            This application rebuilds the four-page POS from TFA1 using Laravel instead of CodeIgniter 4.
            The MVC responsibilities are the same; only the file names, folder structure and syntax change.
        </p>
    </header>

    <div class="about-grid">
        <section class="panel">
            <h2>What the system does</h2>
            <ul class="check-list">
                <li><strong>Landing page</strong> (<code>/</code>) introduces the POS and links to every module.</li>
                <li><strong>About page</strong> (<code>/about</code>) explains the project and the framework mapping.</li>
                <li><strong>Customer Accounts</strong> (<code>/customers</code>) lists customers from the <code>customers</code> table (Eloquent).</li>
                <li><strong>User Accounts</strong> (<code>/users</code>) lists POS staff accounts from the <code>users</code> table (Eloquent).</li>
            </ul>
            <p class="muted">
                TFA6 replaces the TFA5 static arrays with a real database: migrations create the
                <code>customers</code> and <code>users</code> tables, seeders fill them with sample data, and the
                controllers retrieve the records through the <code>Customer</code> and <code>User</code> Eloquent models.
            </p>
        </section>

        <section class="panel">
            <h2>Project details</h2>
            <dl class="details">
                <div><dt>Student</dt><dd>Kyle Pingol</dd></div>
                <div><dt>Section</dt><dd>TC31</dd></div>
                <div><dt>Professor</dt><dd>Dr. Roman Villones</dd></div>
                <div><dt>Course</dt><dd>IT0049 &ndash; Web System Technologies</dd></div>
                <div><dt>Activity</dt><dd>Technical Formative Assessment 6</dd></div>
                <div><dt>Framework</dt><dd>Laravel {{ app()->version() }} (PHP {{ PHP_VERSION }})</dd></div>
            </dl>
        </section>
    </div>

    <section class="section">
        <h2 class="section-title">CodeIgniter 4 (TFA1) vs Laravel (TFA6)</h2>
        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th scope="col">Responsibility</th>
                        <th scope="col">CodeIgniter 4</th>
                        <th scope="col">Laravel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comparisons as $row)
                        <tr>
                            <th scope="row">{{ $row['part'] }}</th>
                            <td><code>{{ $row['codeigniter'] }}</code></td>
                            <td><code>{{ $row['laravel'] }}</code></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
