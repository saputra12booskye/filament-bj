<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jersey Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 20px;
        }

        /* Animated football background */
        .football {
            position: absolute;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            opacity: 0.15;
            animation: float linear infinite;
        }

        .football::before {
            content: '⚽';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 30px;
        }

        .football:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-duration: 15s;
            animation-delay: 0s;
        }

        .football:nth-child(2) {
            top: 70%;
            left: 80%;
            animation-duration: 20s;
            animation-delay: 2s;
        }

        .football:nth-child(3) {
            top: 30%;
            left: 70%;
            animation-duration: 18s;
            animation-delay: 4s;
        }

        .football:nth-child(4) {
            top: 80%;
            left: 20%;
            animation-duration: 22s;
            animation-delay: 1s;
        }

        .football:nth-child(5) {
            top: 50%;
            left: 90%;
            animation-duration: 17s;
            animation-delay: 3s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-100px) rotate(180deg);
            }
            100% {
                transform: translateY(0) rotate(360deg);
            }
        }

        /* Decorative shapes */
        .shape {
            position: absolute;
            opacity: 0.1;
        }

        .shape-1 {
            top: 10%;
            left: 5%;
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: morphing 8s ease-in-out infinite;
        }

        .shape-2 {
            top: 70%;
            right: 10%;
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #48dbfb, #0abde3);
            border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
            animation: morphing 10s ease-in-out infinite;
            animation-delay: 1s;
        }

        .shape-3 {
            bottom: 10%;
            left: 15%;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #ff9ff3, #feca57);
            border-radius: 30% 70% 53% 47% / 58% 37% 63% 42%;
            animation: morphing 12s ease-in-out infinite;
            animation-delay: 2s;
        }

        @keyframes morphing {
            0%, 100% {
                border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
                transform: rotate(0deg);
            }
            25% {
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
                transform: rotate(90deg);
            }
            50% {
                border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%;
                transform: rotate(180deg);
            }
            75% {
                border-radius: 30% 70% 53% 47% / 58% 37% 63% 42%;
                transform: rotate(270deg);
            }
        }

        .login-container {
            background: white;
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            display: flex;
            max-width: 900px;
            max-height: 600px;
            width: 100%;
            overflow: hidden;
            position: relative;
            z-index: 1;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left side - Illustration */
        .left-side {
            flex: 1;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .illustration-container {
            position: relative;
            width: 100%;
            max-width: 280px;
        }

        /* Animated illustration */
        .illustration {
            position: relative;
            animation: float-illustration 6s ease-in-out infinite;
        }

        @keyframes float-illustration {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .character {
            position: relative;
            z-index: 2;
        }

        .character-body {
            width: 80px;
            height: 120px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 40px 40px 20px 20px;
            margin: 0 auto;
            position: relative;
        }

        .character-head {
            width: 60px;
            height: 60px;
            background: #ffd93d;
            border-radius: 50%;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
        }

        .character-arm {
            width: 30px;
            height: 80px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 15px;
            position: absolute;
            top: 20px;
        }

        .character-arm.left {
            left: -25px;
            transform: rotate(-30deg);
        }

        .character-arm.right {
            right: -25px;
            transform: rotate(30deg);
            animation: wave 2s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% {
                transform: rotate(30deg);
            }
            50% {
                transform: rotate(50deg);
            }
        }

        .lock-screen {
            width: 200px;
            height: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            position: absolute;
            left: -50px;
            top: 50%;
            transform: translateY(-50%);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: translateY(-50%) scale(1);
            }
            50% {
                transform: translateY(-50%) scale(1.05);
            }
        }

        .lock-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
        }

        .lock-dots {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }

        .dot {
            width: 12px;
            height: 12px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
        }

        .speech-bubble {
            background: white;
            padding: 15px 20px;
            border-radius: 20px;
            position: absolute;
            top: 20px;
            right: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            animation: bounce 2s ease-in-out infinite;
        }

        .speech-bubble::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 30px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid white;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .speech-bubble-text {
            font-size: 24px;
            color: #667eea;
        }

        /* Right side - Form */
        .right-side {
            flex: 1;
            padding: 40px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-placeholder {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            border-radius: 20px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            overflow: hidden;
        }

        .logo-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        h2 {
            font-size: 28px;
            color: #2d3436;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .subtitle {
            color: #636e72;
            font-size: 13px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
            animation: fadeInRight 0.6s ease-out backwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        label {
            display: block;
            color: #2d3436;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        input {
            width: 100%;
            padding: 12px 18px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 14px;
            color: #2d3436;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            background: #f8f9fa;
        }

        input:focus {
            outline: none;
            border-color: #ff6b6b;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.1);
        }

        input::placeholder {
            color: #b2bec3;
        }

        .forgot-password {
            text-align: right;
            margin-top: 8px;
        }

        .forgot-password a {
            color: #ff6b6b;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: #feca57;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 8px;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            animation: fadeInRight 0.6s ease-out 0.3s backwards;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            color: #b2bec3;
            font-size: 13px;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #e1e8ed;
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .register-link {
            text-align: center;
            color: #636e72;
            font-size: 13px;
        }

        .register-link a {
            color: #ff6b6b;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .register-link a:hover {
            color: #feca57;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .left-side {
                display: none;
            }

            .right-side {
                padding: 50px 40px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                border-radius: 20px;
            }

            .right-side {
                padding: 40px 30px;
            }

            h2 {
                font-size: 26px;
            }

            .logo-placeholder {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated footballs -->
    <div class="football"></div>
    <div class="football"></div>
    <div class="football"></div>
    <div class="football"></div>
    <div class="football"></div>

    <!-- Decorative shapes -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <div class="login-container">
        <!-- Left Side - Illustration -->
        <div class="left-side">
            <div class="illustration-container">
                <div class="illustration">
                    <img src="{{ asset('images/logo.png') }}" alt="Jersey"
                    width="360px" height="360px">  
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="right-side">
            <div class="logo-section">
                <div class="logo-placeholder">
                    <img src="{{ asset('images/logoatas.png') }}">
                </div>
                <h2>Login</h2>
                <p class="subtitle">Masukkan email dan password untuk<br>mengakses dashboard panel pelanggan</p>
            </div>

            <form method="POST" action="{{ route('customer.login') }}" id="loginForm">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Masukkan email Anda"
                            required
                            autocomplete="email"
                        >
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
                    </div>
                    <div class="forgot-password">
                        <a href="/forgot-password">Lupa email/password? Klik disini</a>
                    </div>
                </div>

                <button type="submit" class="login-btn" id="submitBtn">Login</button>
            </form>

            <div class="divider">atau</div>

            <div class="register-link">
                Belum punya akun? <a href="/register">Silahkan Register</a>
            </div>
        </div>
    </div>

    <script>
        // Form submission
        const form = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(e) {
            submitBtn.innerHTML = 'Memproses...';
            submitBtn.disabled = true;
        });

        // Add floating animation to inputs on focus
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>