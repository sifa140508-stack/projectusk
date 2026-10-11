<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - Aplikasi Sertifikasi</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 400px;
            background: white;
            padding: 30px;

            border-radius: 12px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 8px;
        }

        .login-box p {
            text-align: center;
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;

            border: 1px solid #ccc;
            border-radius: 7px;
        }

        button {
            width: 100%;
            padding: 11px;

            border: none;
            border-radius: 7px;

            background: #2563eb;
            color: white;

            cursor: pointer;
            font-size: 15px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;

            padding: 10px;
            border-radius: 7px;

            margin-bottom: 18px;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h2>Aplikasi Sertifikasi</h2>

        <p>Login Administrator</p>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}"
              method="POST">

            @csrf

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

            </div>

            <button type="submit">
                Login
            </button>

        </form>

    </div>

</body>

</html>