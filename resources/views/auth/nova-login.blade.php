<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login • Àyewòsàn Laboratory</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: Figtree, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            margin: 0;
        }

        .shell {
            max-width: 1100px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        .card {
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(148, 163, 184, 0.25);
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: 0 25px 45px -30px rgba(15, 23, 42, 0.9);
        }

        .layout {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 1024px) {
            .layout {
                grid-template-columns: 1fr 1.2fr;
                align-items: start;
            }
        }

        .title {
            font-size: 2rem;
            font-weight: 600;
            margin: 0 0 0.5rem;
            color: #f8fafc;
        }

        .subtitle {
            margin: 0 0 1.5rem;
            color: #94a3b8;
            line-height: 1.7;
        }

        .field {
            display: grid;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }

        .field label {
            font-size: 0.9rem;
            color: #cbd5f5;
        }

        .field input {
            border-radius: 0.75rem;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(15, 23, 42, 0.5);
            color: #f8fafc;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
            margin-top: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.7rem 1.5rem;
            border-radius: 9999px;
            border: 1px solid transparent;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: #f97316;
            color: #0f172a;
            box-shadow: 0 18px 30px -20px rgba(249, 115, 22, 0.6);
        }

        .btn-secondary {
            background: rgba(148, 163, 184, 0.12);
            border-color: rgba(148, 163, 184, 0.35);
            color: #e2e8f0;
        }

        .demo-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .demo-table th,
        .demo-table td {
            text-align: left;
            padding: 0.75rem 0.5rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
        }

        .demo-table th {
            color: #cbd5f5;
            font-weight: 600;
        }

        .demo-table td {
            color: #e2e8f0;
        }

        .demo-section {
            margin-top: 2rem;
        }

        .demo-section h3 {
            margin: 0 0 0.5rem;
            font-size: 1.1rem;
            color: #f8fafc;
        }

        .note {
            font-size: 0.85rem;
            color: #94a3b8;
            margin-top: 0.75rem;
        }

        .pill {
            display: inline-flex;
            padding: 0.2rem 0.75rem;
            border-radius: 9999px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(148, 163, 184, 0.25);
            font-size: 0.75rem;
            color: #cbd5f5;
        }

        .alert {
            padding: 0.9rem 1rem;
            border-radius: 0.85rem;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.4);
            color: #fecaca;
        }
    </style>
</head>

@php
    $demoStaff = [
        ['key' => 'super_admin', 'role' => 'Super Admin', 'email' => 'superadmin@example.com', 'password' => 'password'],
        ['key' => 'receptionist', 'role' => 'Receptionist', 'email' => 'receptionist@example.com', 'password' => 'password'],
        ['key' => 'accountant', 'role' => 'Accountant', 'email' => 'accountant@example.com', 'password' => 'password'],
        ['key' => 'lab_technician', 'role' => 'Laboratory Technician', 'email' => 'laboratorytechnician@example.com', 'password' => 'password'],
        ['key' => 'non_tech_admin', 'role' => 'Non-technical Admin', 'email' => 'non-technicaladmin@example.com', 'password' => 'password'],
    ];

    $allDemoUsers = collect($demoStaff)->keyBy('key');
@endphp

<body>
    <div class="shell">
        <div class="layout">
            <div class="card">
                <span class="pill">Demo Dashboard Access</span>
                <h1 class="title">Sign in to Àyewòsàn</h1>
                <p class="subtitle">Use any of the demo accounts below or enter your own credentials to access the staff dashboard.</p>

                <form method="POST" action="{{ route('nova.login') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-error">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="field">
                        <label for="email">Email address</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required>
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required>
                    </div>

                    <div class="field" style="margin-bottom: 0;">
                        <label style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.85rem;">
                            <input type="checkbox" name="remember" value="1" style="width: 1rem; height: 1rem;" {{ old('remember') ? 'checked' : '' }}>
                            Remember me
                        </label>
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <a href="{{ url('/') }}" class="btn btn-secondary">Back to Landing</a>
                    </div>
                </form>

                <p class="note">Tip: click any "Autofill" button to populate the login form instantly.</p>
            </div>

            <div class="card">
                <h2 class="title" style="font-size: 1.5rem;">Demo Login Details</h2>
                <p class="subtitle">Each demo account uses the password <strong>password</strong>. Choose a role below and click autofill to load the credentials.</p>

                <div class="demo-section">
                    <h3>Staff Roles</h3>
                    <table class="demo-table">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demoStaff as $user)
                                <tr>
                                    <td>{{ $user['role'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['password'] }}</td>
                                    <td><button type="button" class="btn btn-secondary" onclick="fillDemo('{{ $user['key'] }}')">Autofill</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="note">This demo installation wipes all data and resets once every day at 22:30</p>
            </div>
        </div>
    </div>

    <script>
        const demoUsers = @json($allDemoUsers);
        const emailField = document.getElementById('email');
        const passwordField = document.getElementById('password');

        function fillDemo(key) {
            const user = demoUsers[key];
            if (!user) {
                return;
            }
            emailField.value = user.email || '';
            passwordField.value = user.password || '';
            emailField.focus();
        }
    </script>
</body>

</html>
