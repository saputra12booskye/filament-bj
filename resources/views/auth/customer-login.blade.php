<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jersey Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00ff88;
            --primary-dark: #00cc6e;
            --dark: #0a0e27;
            --dark-light: #1a1f3a;
            --gray: #8892a6;
            --white: #ffffff;
            --field-green: #1e7a46;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background with football field pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(90deg, transparent 49%, rgba(0, 255, 136, 0.1) 49%, rgba(0, 255, 136, 0.1) 51%, transparent 51%),
                linear-gradient(0deg, transparent 49%, rgba(0, 255, 136, 0.1) 49%, rgba(0, 255, 136, 0.1) 51%, transparent 51%);
            background-size: 100px 100px;
            opacity: 0.3;
            animation: fieldMove 20s linear infinite;
        }

        @keyframes fieldMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(100px, 100px); }
        }

        /* Gradient orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            animation: float 8s ease-in-out infinite;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: var(--primary);
            top: -200px;
            left: -200px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 300px;
            height: 300px;
            background: #0066ff;
            bottom: -150px;
            right: -150px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, 50px) scale(1.1); }
        }

        .container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            padding: 20px;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: rgba(26, 31, 58, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.05);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            box-shadow: 
                0 10px 30px rgba(0, 255, 136, 0.3),
                0 0 0 4px rgba(0, 255, 136, 0.1);
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .logo-icon svg {
            width: 40px;
            height: 40px;
            fill: var(--dark);
        }

        h2 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 36px;
            color: var(--white);
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--gray);
            font-size: 14px;
            font-weight: 500;
        }

        form {
            margin-top: 32px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        label {
            display: block;
            color: var(--white);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 12px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            opacity: 0.5;
            transition: opacity 0.3s;
        }

        input {
            width: 100%;
            padding: 16px 16px 16px 48px;
            background: rgba(10, 14, 39, 0.5);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: var(--white);
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            outline: none;
        }

        input::placeholder {
            color: var(--gray);
        }

        input:focus {
            border-color: var(--primary);
            background: rgba(10, 14, 39, 0.8);
            box-shadow: 0 0 0 4px rgba(0, 255, 136, 0.1);
        }

        input:focus + .input-icon {
            opacity: 1;
        }

        button[type="submit"] {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            border-radius: 12px;
            color: var(--dark);
            font-size: 16px;
            font-weight: 700;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.3);
            position: relative;
            overflow: hidden;
        }

        button[type="submit"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.4);
        }

        button[type="submit"]:hover::before {
            left: 100%;
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 32px 0;
            color: var(--gray);
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .divider span {
            padding: 0 16px;
        }

        .register-link {
            text-align: center;
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .register-link a:hover {
            color: var(--white);
            gap: 10px;
        }

        .register-link a::after {
            content: '→';
            transition: transform 0.3s;
        }

        .register-link a:hover::after {
            transform: translateX(4px);
        }

        /* Jersey pattern decoration */
        .jersey-pattern {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            opacity: 0.05;
            pointer-events: none;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-card {
                padding: 36px 28px;
            }

            h2 {
                font-size: 28px;
            }

            .logo-icon {
                width: 60px;
                height: 60px;
            }

            .logo-icon svg {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="container">
        <div class="login-card">
            <!-- Jersey pattern decoration -->
            <svg class="jersey-pattern" viewBox="0 0 100 100" fill="currentColor">
                <path d="M50 10 L40 30 L20 30 L20 70 L40 70 L40 90 L60 90 L60 70 L80 70 L80 30 L60 30 Z"/>
            </svg>

            <div class="logo-section">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2L4 6v4c0 5.5 3.8 10.7 8 12 4.2-1.3 8-6.5 8-12V6l-8-4zm-1 16h2v2h-2v-2zm0-10h2v8h-2V8z"/>
                    </svg>
                </div>
                <h2>Login Customer</h2>
                <p class="subtitle">Akses koleksi jersey terbaik Anda</p>
            </div>

            <form method="POST" action="{{ route('customer.login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="contoh@email.com" 
                            required
                            autocomplete="email"
                        >
                        <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password Anda" 
                            required
                            autocomplete="current-password"
                        >
                        <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
                        </svg>
                    </div>
                </div>

                <button type="submit">Masuk Sekarang</button>
            </form>

            <div class="divider">
                <span>Belum punya akun?</span>
            </div>

            <div class="register-link">
                <a href="/register">Daftar sekarang</a>
            </div>
        </div>
    </div>

    <script>
        // Add smooth animation for input focus
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Prevent form submission animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<span style="opacity: 0.7">Memproses...</span>';
            button.style.pointerEvents = 'none';
        });
    </script>
</body>
</html>