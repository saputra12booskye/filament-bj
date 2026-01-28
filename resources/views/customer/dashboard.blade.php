<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Jersey Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00ff88;
            --primary-dark: #00cc6e;
            --dark: #0a0e27;
            --dark-light: #1a1f3a;
            --gray: #8892a6;
            --white: #ffffff;
            --field-green: #1e7a46;
            --orange: #ffa502;
            --blue: #0066ff;
            --red: #ff4757;
            --sidebar-width: 280px;
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
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background with football field pattern */
        body::before {
            content: '';
            position: fixed;
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
            z-index: 0;
        }

        @keyframes fieldMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(100px, 100px); }
        }

        /* Gradient orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            animation: float 8s ease-in-out infinite;
            z-index: 0;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: var(--primary);
            top: -200px;
            right: 10%;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 350px;
            height: 350px;
            background: var(--blue);
            bottom: -150px;
            left: 10%;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, 50px) scale(1.1); }
        }

        /* Layout */
        .dashboard-layout {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: rgba(26, 31, 58, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px 0;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
            animation: slideInLeft 0.5s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sidebar-header {
            padding: 0 30px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.3);
        }

        .logo-icon svg {
            width: 24px;
            height: 24px;
            fill: var(--dark);
        }

        .logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 24px;
            color: var(--white);
            letter-spacing: 1px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
        }

        .user-info h4 {
            font-size: 15px;
            color: var(--white);
            font-weight: 600;
            margin-bottom: 2px;
        }

        .user-info p {
            font-size: 12px;
            color: var(--gray);
        }

        /* Navigation */
        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-section {
            margin-bottom: 30px;
        }

        .nav-label {
            padding: 0 30px;
            font-size: 11px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 30px;
            color: var(--gray);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: var(--primary);
            border-radius: 0 4px 4px 0;
            transition: height 0.3s;
        }

        .nav-item:hover,
        .nav-item.active {
            color: var(--white);
            background: rgba(0, 255, 136, 0.05);
        }

        .nav-item:hover::before,
        .nav-item.active::before {
            height: 100%;
        }

        .nav-icon {
            font-size: 20px;
            width: 24px;
            text-align: center;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--primary);
            color: var(--dark);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 700;
        }

        /* Logout button */
        .sidebar-footer {
            padding: 20px 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        .logout-btn {
            width: 100%;
            padding: 14px;
            background: rgba(255, 71, 87, 0.1);
            border: 1px solid rgba(255, 71, 87, 0.3);
            border-radius: 12px;
            color: var(--red);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: rgba(255, 71, 87, 0.2);
            border-color: var(--red);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 40px;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Welcome Header */
        .welcome-header {
            margin-bottom: 30px;
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome-header h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 42px;
            color: var(--white);
            letter-spacing: 2px;
            margin-bottom: 8px;
            background: linear-gradient(135deg, var(--white), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-header p {
            color: var(--gray);
            font-size: 16px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(26, 31, 58, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            animation: fadeInUp 0.6s ease-out backwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
            border-color: var(--primary);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--blue));
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            font-size: 26px;
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.3);
        }

        .stat-card.orders .stat-icon {
            background: linear-gradient(135deg, var(--blue), #0052cc);
        }

        .stat-card.status .stat-icon {
            background: linear-gradient(135deg, var(--orange), #e67e22);
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-value {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 34px;
            color: var(--white);
            letter-spacing: 1px;
            line-height: 1;
        }

        .stat-detail {
            font-size: 13px;
            color: var(--gray);
            margin-top: 8px;
        }

        .stat-detail strong {
            color: var(--white);
        }

        /* Last Order Card */
        .last-order-card {
            background: rgba(26, 31, 58, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.6s ease-out 0.4s backwards;
        }

        .last-order-card h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 24px;
            color: var(--white);
            letter-spacing: 1px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .order-content {
            background: rgba(10, 14, 39, 0.5);
            border-radius: 16px;
            padding: 24px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .order-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .order-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .order-field label {
            font-size: 12px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .order-field .value {
            font-size: 16px;
            color: var(--white);
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .status-badge.pending {
            background: rgba(255, 165, 2, 0.2);
            color: var(--orange);
            border: 1px solid var(--orange);
        }

        .status-badge.success {
            background: rgba(0, 255, 136, 0.2);
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .status-badge.cancelled {
            background: rgba(255, 71, 87, 0.2);
            color: var(--red);
            border: 1px solid var(--red);
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--gray);
        }

        .empty-state svg {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 101;
            width: 50px;
            height: 50px;
            background: rgba(26, 31, 58, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 80px 30px 40px;
            }

            .mobile-menu-toggle {
                display: flex;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .order-info {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 80px 20px 30px;
            }

            .welcome-header h1 {
                font-size: 32px;
            }

            .stat-card {
                padding: 24px;
            }
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 99;
        }

        .sidebar-overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <!-- Mobile Menu Toggle -->
    <div class="mobile-menu-toggle" onclick="toggleSidebar()">
        ☰
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2L4 6v4c0 5.5 3.8 10.7 8 12 4.2-1.3 8-6.5 8-12V6l-8-4z"/>
                        </svg>
                    </div>
                    <span class="logo-text">Jersey Store</span>
                </div>

                <div class="user-profile">
                    <div class="user-avatar">{{ substr($customer->name, 0, 1) }}</div>
                    <div class="user-info">
                        <h4>{{ $customer->name }}</h4>
                        <p>Customer</p>
                    </div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-label">Menu Utama</div>
                    <a href="#" class="nav-item active">
                        <span class="nav-icon">🏠</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="/orders" class="nav-item">
                        <span class="nav-icon">📦</span>
                        <span>Pesanan Saya</span>
                        @if($totalOrders > 0)
                        <span class="nav-badge">{{ $totalOrders }}</span>
                        @endif
                    </a>
                    <a href="/products" class="nav-item">
                        <span class="nav-icon">🛍️</span>
                        <span>Belanja Jersey</span>
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-label">Akun</div>
                    <a href="/profile" class="nav-item">
                        <span class="nav-icon">👤</span>
                        <span>Profil Saya</span>
                    </a>
                    <a href="/addresses" class="nav-item">
                        <span class="nav-icon">📍</span>
                        <span>Alamat</span>
                    </a>
                    <a href="/favorites" class="nav-item">
                        <span class="nav-icon">❤️</span>
                        <span>Favorit</span>
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-label">Bantuan</div>
                    <a href="/help" class="nav-item">
                        <span class="nav-icon">💬</span>
                        <span>Pusat Bantuan</span>
                    </a>
                    <a href="/settings" class="nav-item">
                        <span class="nav-icon">⚙️</span>
                        <span>Pengaturan</span>
                    </a>
                </div>
            </nav>

            <div class="sidebar-footer">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <span>🚪</span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Welcome Header -->
            <div class="welcome-header">
                <h1>Halo, {{ $customer->name }} 👋</h1>
                <p>Selamat datang kembali di dashboard akun Anda</p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card orders">
                    <div class="stat-icon">📦</div>
                    <div class="stat-label">Total Pesanan</div>
                    <div class="stat-value">{{ $totalOrders }}</div>
                    <div class="stat-detail">Semua pesanan Anda</div>
                </div>

                @if ($lastOrder)
                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-label">Pesanan Terakhir</div>
                    <div class="stat-value">Rp {{ number_format($lastOrder->total_price, 0, ',', '.') }}</div>
                    <div class="stat-detail">Kode: <strong>{{ $lastOrder->order_code }}</strong></div>
                </div>

                <div class="stat-card status">
                    <div class="stat-icon">📊</div>
                    <div class="stat-label">Status</div>
                    <div class="stat-value" style="font-size: 20px;">
                        <span class="status-badge {{ strtolower($lastOrder->status) }}">
                            {{ ucfirst($lastOrder->status) }}
                        </span>
                    </div>
                    <div class="stat-detail">Status pesanan terakhir</div>
                </div>
                @else
                <div class="stat-card">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-label">Mulai Belanja</div>
                    <div class="stat-value" style="font-size: 18px;">Belum Ada</div>
                    <div class="stat-detail">Pesanan pertama Anda</div>
                </div>

                <div class="stat-card status">
                    <div class="stat-icon">🚀</div>
                    <div class="stat-label">Status</div>
                    <div class="stat-value" style="font-size: 18px;">Siap Order</div>
                    <div class="stat-detail">Mulai petualangan jersey!</div>
                </div>
                @endif
            </div>

            <!-- Last Order Details -->
            <div class="last-order-card">
                <h3>
                    <span>📋</span>
                    Detail Pesanan Terakhir
                </h3>

                @if ($lastOrder)
                <div class="order-content">
                    <div class="order-info">
                        <div class="order-field">
                            <label>Kode Pesanan</label>
                            <div class="value">{{ $lastOrder->order_code }}</div>
                        </div>

                        <div class="order-field">
                            <label>Total Pembayaran</label>
                            <div class="value">Rp {{ number_format($lastOrder->total_price, 0, ',', '.') }}</div>
                        </div>

                        <div class="order-field">
                            <label>Status Pesanan</label>
                            <div class="value">
                                <span class="status-badge {{ strtolower($lastOrder->status) }}">
                                    {{ ucfirst($lastOrder->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-7-2h2v-4h4v-2h-4V7h-2v4H7v2h4z"/>
                    </svg>
                    <p>Belum ada pesanan.</p>
                    <p style="margin-top: 8px; font-size: 13px;">Mulai belanja jersey favorit Anda sekarang!</p>
                </div>
                @endif
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Close sidebar when clicking nav item on mobile
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', function() {
                if (window.innerWidth <= 1024) {
                    toggleSidebar();
                }
            });
        });

        // Animate numbers on load
        const statValues = document.querySelectorAll('.stat-value');
        statValues.forEach(stat => {
            const text = stat.textContent.trim();
            const numMatch = text.match(/\d+/);
            
            if (numMatch) {
                const final = parseInt(numMatch[0]);
                let current = 0;
                const increment = final / 30;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= final) {
                        clearInterval(timer);
                    } else {
                        stat.textContent = text.replace(/\d+/, Math.floor(current).toString());
                    }
                }, 30);
            }
        });

        // Add smooth hover effects
        const cards = document.querySelectorAll('.stat-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>