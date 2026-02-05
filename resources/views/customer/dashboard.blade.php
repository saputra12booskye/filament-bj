<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Jersey Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --red: #ff3b30;
            --red-dark: #d32f2f;
            --yellow: #ffc107;
            --yellow-dark: #ffa000;
            --white: #ffffff;
            --gray-50: #fafafa;
            --gray-100: #f5f5f5;
            --gray-200: #eeeeee;
            --gray-300: #e0e0e0;
            --gray-400: #bdbdbd;
            --gray-600: #757575;
            --gray-700: #616161;
            --gray-800: #424242;
            --dark: #212121;
            --blue: #2196f3;
            --green: #4caf50;
            --orange: #ff9800;
            --sidebar-width: 280px;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 32px rgba(0,0,0,0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--white);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Layout */
        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--gray-50) 0%, var(--white) 100%);
            border-right: 2px solid var(--gray-200);
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
            padding: 0 25px 25px;
            border-bottom: 2px solid var(--gray-200);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .logo-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px rgba(255, 59, 48, 0.25);
            position: relative;
        }

        .logo-icon::after {
            content: '';
            position: absolute;
            inset: -4px;
            background: linear-gradient(135deg, var(--red), var(--yellow));
            border-radius: 18px;
            opacity: 0.2;
            z-index: -1;
        }

        .logo-icon svg {
            width: 28px;
            height: 28px;
            fill: var(--white);
        }

        .logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 26px;
            background: linear-gradient(135deg, var(--red), var(--yellow-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 1px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px;
            background: var(--white);
            border-radius: 16px;
            border: 2px solid var(--gray-200);
            transition: all 0.3s;
        }

        .user-profile:hover {
            border-color: var(--red);
            box-shadow: var(--shadow-sm);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 700;
            color: var(--white);
            box-shadow: 0 4px 12px rgba(255, 59, 48, 0.2);
        }

        .user-info h4 {
            font-size: 15px;
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 3px;
        }

        .user-info p {
            font-size: 12px;
            color: var(--gray-600);
            font-weight: 500;
        }

        /* Navigation */
        .sidebar-nav {
            padding: 25px 0;
        }

        .nav-section {
            margin-bottom: 30px;
        }

        .nav-label {
            padding: 0 25px;
            font-size: 11px;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 25px;
            margin: 0 12px;
            color: var(--gray-700);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            left: -12px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: linear-gradient(180deg, var(--red), var(--yellow));
            border-radius: 0 4px 4px 0;
            transition: height 0.3s;
        }

        .nav-item:hover,
        .nav-item.active {
            color: var(--red);
            background: linear-gradient(135deg, rgba(255, 59, 48, 0.08), rgba(255, 193, 7, 0.08));
        }

        .nav-item:hover::before,
        .nav-item.active::before {
            height: 60%;
        }

        .nav-icon {
            font-size: 22px;
            width: 24px;
            text-align: center;
        }

        .nav-badge {
            margin-left: auto;
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            color: var(--white);
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(255, 59, 48, 0.3);
        }

        /* Logout button */
        .sidebar-footer {
            padding: 20px 25px;
            border-top: 2px solid var(--gray-200);
            margin-top: auto;
        }

        .logout-btn {
            width: 100%;
            padding: 14px;
            background: var(--white);
            border: 2px solid var(--red);
            border-radius: 12px;
            color: var(--red);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn:hover {
            background: var(--red);
            color: var(--white);
            box-shadow: 0 8px 24px rgba(255, 59, 48, 0.3);
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 40px;
            background: var(--gray-50);
            min-height: 100vh;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Welcome Header */
        .welcome-header {
            margin-bottom: 35px;
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
            font-size: 48px;
            background: linear-gradient(135deg, var(--dark), var(--red));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .welcome-header p {
            color: var(--gray-600);
            font-size: 16px;
            font-weight: 500;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
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
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--red);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--red), var(--yellow));
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 28px;
            box-shadow: 0 8px 24px rgba(255, 59, 48, 0.25);
        }

        .stat-card.orders .stat-icon {
            background: linear-gradient(135deg, var(--blue), #1976d2);
            box-shadow: 0 8px 24px rgba(33, 150, 243, 0.25);
        }

        .stat-card.status .stat-icon {
            background: linear-gradient(135deg, var(--orange), #f57c00);
            box-shadow: 0 8px 24px rgba(255, 152, 0, 0.25);
        }

        .stat-card.green .stat-icon {
            background: linear-gradient(135deg, var(--green), #388e3c);
            box-shadow: 0 8px 24px rgba(76, 175, 80, 0.25);
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-value {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 38px;
            color: var(--dark);
            letter-spacing: 1px;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-detail {
            font-size: 13px;
            color: var(--gray-600);
            font-weight: 500;
        }

        .stat-detail strong {
            color: var(--dark);
            font-weight: 700;
        }

        /* Last Order Card */
        .last-order-card {
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 20px;
            padding: 35px;
            box-shadow: var(--shadow-sm);
            animation: fadeInUp 0.6s ease-out 0.4s backwards;
            position: relative;
            overflow: hidden;
        }

        .last-order-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--red), var(--yellow));
        }

        .last-order-card h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 28px;
            color: var(--dark);
            letter-spacing: 1px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .order-content {
            background: var(--gray-50);
            border-radius: 16px;
            padding: 28px;
            border: 2px solid var(--gray-200);
        }

        .order-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
        }

        .order-field {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .order-field label {
            font-size: 12px;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-weight: 700;
        }

        .order-field .value {
            font-size: 17px;
            color: var(--dark);
            font-weight: 700;
        }

        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 700;
            text-transform: capitalize;
            border: 2px solid;
        }

        .status-badge.pending {
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.15), rgba(255, 152, 0, 0.1));
            color: var(--orange);
            border-color: var(--orange);
        }

        .status-badge.success {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.15), rgba(76, 175, 80, 0.1));
            color: var(--green);
            border-color: var(--green);
        }

        .status-badge.cancelled {
            background: linear-gradient(135deg, rgba(255, 59, 48, 0.15), rgba(255, 59, 48, 0.1));
            color: var(--red);
            border-color: var(--red);
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: var(--gray-600);
        }

        .empty-state svg {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
            opacity: 0.2;
            color: var(--gray-400);
        }

        .empty-state p {
            font-size: 15px;
            font-weight: 600;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 101;
            width: 55px;
            height: 55px;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            font-size: 24px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s;
        }

        .mobile-menu-toggle:hover {
            border-color: var(--red);
            color: var(--red);
            box-shadow: var(--shadow-lg);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
                box-shadow: var(--shadow-lg);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 90px 30px 40px;
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
                padding: 90px 20px 30px;
            }

            .welcome-header h1 {
                font-size: 36px;
            }

            .stat-card {
                padding: 24px;
            }

            .last-order-card {
                padding: 28px 20px;
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
            background: rgba(0, 0, 0, 0.5);
            z-index: 99;
            backdrop-filter: blur(4px);
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 30px;
        }

        .quick-action-btn {
            padding: 16px 24px;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            color: var(--dark);
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: var(--shadow-sm);
        }

        .quick-action-btn:hover {
            border-color: var(--red);
            color: var(--red);
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .quick-action-btn span:first-child {
            font-size: 20px;
        }
    </style>
</head>
<body>
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
                        <p>Customer Premium</p>
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
                <p>Selamat datang kembali! Kelola pesanan dan belanja jersey favoritmu di sini</p>
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
                <div class="stat-card green">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-label">Mulai Belanja</div>
                    <div class="stat-value" style="font-size: 20px;">Belum Ada</div>
                    <div class="stat-detail">Pesanan pertama Anda</div>
                </div>

                <div class="stat-card status">
                    <div class="stat-icon">🚀</div>
                    <div class="stat-label">Status</div>
                    <div class="stat-value" style="font-size: 20px;">Siap Order</div>
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

                    <div class="quick-actions">
                        <a href="/orders" class="quick-action-btn">
                            <span>📦</span>
                            <span>Lihat Semua Pesanan</span>
                        </a>
                        <a href="/products" class="quick-action-btn">
                            <span>🛍️</span>
                            <span>Belanja Lagi</span>
                        </a>
                        <a href="/help" class="quick-action-btn">
                            <span>💬</span>
                            <span>Butuh Bantuan?</span>
                        </a>
                    </div>
                </div>
                @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-7-2h2v-4h4v-2h-4V7h-2v4H7v2h4z"/>
                    </svg>
                    <p>Belum ada pesanan</p>
                    <p style="margin-top: 10px; font-size: 14px; color: var(--gray-600);">Mulai belanja jersey favorit Anda sekarang!</p>
                    
                    <div class="quick-actions">
                        <a href="/products" class="quick-action-btn">
                            <span>🛍️</span>
                            <span>Mulai Belanja</span>
                        </a>
                        <a href="/favorites" class="quick-action-btn">
                            <span>❤️</span>
                            <span>Lihat Favorit</span>
                        </a>
                        <a href="/help" class="quick-action-btn">
                            <span>💬</span>
                            <span>Pusat Bantuan</span>
                        </a>
                    </div>
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
                        stat.textContent = text.replace(/\d+/, final.toString());
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
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>