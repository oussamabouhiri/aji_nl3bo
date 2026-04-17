<?php date_default_timezone_set('Africa/Casablanca'); ?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aji L3bo - Board Game Cafe</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            background: '#131313',
            surface: { DEFAULT: '#1f1f1f', container: '#2a2a2a', high: '#353534', highest: '#444444' },
            primary: '#e9c176',
            secondary: '#abcdcc',
            error: '#ffb4ab',
            'on-primary': '#412d00',
            'on-surface': '#e5e2e1',
            'on-surface-variant': '#c1c8c7',
            'outline-variant': 'rgba(255,255,255,0.08)',
          },
          fontFamily: {
            headline: ['Manrope', 'sans-serif'],
            body: ['Inter', 'sans-serif'],
          }
        },
      },
    }
  </script>
  <style>
    body { background-color: #131313; color: #e5e2e1; font-family: 'Inter', sans-serif; }
    .font-headline { font-family: 'Manrope', sans-serif; }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    .hero-gradient {
      background: radial-gradient(ellipse at 50% 0%, rgba(233, 193, 118, 0.15) 0%, transparent 60%),
                  radial-gradient(ellipse at 80% 50%, rgba(171, 205, 204, 0.1) 0%, transparent 50%);
    }
    .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
  </style>
</head>
<body class="bg-background text-on-surface min-h-screen">
  <!-- Navigation -->
  <nav class="fixed top-0 w-full z-50 bg-[#131313]/80 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="<?= BASE_URL ?>/" class="text-2xl font-black tracking-tighter text-[#e9c176]">Aji L3bo</a>
      <div class="hidden md:flex items-center gap-8">
        <?php if ($isLoggedIn): ?>
          <?php if ($isAdmin): ?>
            <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/admin">Dashboard</a>
            <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/admin/games">Games</a>
            <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/admin/reservations">Reservations</a>
            <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/admin/sessions">Sessions</a>
          <?php else: ?>
            <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/games">Games</a>
            <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/reservation">Reserve</a>
            <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/my-reservations">My Reservations</a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="flex items-center gap-4">
        <?php if ($isLoggedIn): ?>
          <a href="<?= BASE_URL ?>/logout" class="text-sm text-[#c1c8c7] hover:text-[#e9c176] transition-colors">Logout</a>
        <?php else: ?>
          <a href="<?= BASE_URL ?>/login" class="text-sm text-[#c1c8c7] hover:text-[#e9c176] transition-colors">Login</a>
          <a href="<?= BASE_URL ?>/register" class="px-4 py-2 bg-[#e9c176] text-[#412d00] rounded-lg font-bold text-sm hover:opacity-90">Sign Up</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative min-h-screen flex items-center hero-gradient">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMyMDIwMjAiIGZpbGwtb3BhY2l0eT0iMC40Ij48cGF0aCBkPSJNMzYgMzRjMC0yLjIxLTEuNzktNC00LTRzLTQgMS43OS00IDQgMS43OSA0IDQgNCA0LTEuNzkgNC00eiIvPjwvZz48L2c+PC9zdmc+')] opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-6 py-32 text-center">
      <span class="inline-block px-4 py-2 bg-[#e9c176]/10 text-[#e9c176] rounded-full text-sm font-medium mb-6">Welcome to Morocco's Premier Board Game Cafe</span>
      <h1 class="text-5xl md:text-7xl font-headline font-extrabold tracking-tight mb-6">
        Play. Connect.<br><span class="text-[#e9c176]">Have Fun.</span>
      </h1>
      <p class="text-xl text-[#c1c8c7] max-w-2xl mx-auto mb-10">
        Discover hundreds of board games, reserve your favorite table, and enjoy the ultimate gaming experience with friends and family.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <?php if ($isLoggedIn): ?>
          <?php if ($isAdmin): ?>
            <a href="<?= BASE_URL ?>/admin" class="px-8 py-4 bg-[#e9c176] text-[#412d00] rounded-xl font-bold text-lg hover:opacity-90 shadow-lg shadow-[#e9c176]/20">
              Admin Dashboard
            </a>
            <a href="<?= BASE_URL ?>/admin/sessions" class="px-8 py-4 bg-surface-high text-[#e5e2e1] rounded-xl font-bold text-lg hover:bg-surface-highest transition-colors">
              Manage Sessions
            </a>
          <?php else: ?>
            <a href="<?= BASE_URL ?>/reservation" class="px-8 py-4 bg-[#e9c176] text-[#412d00] rounded-xl font-bold text-lg hover:opacity-90 shadow-lg shadow-[#e9c176]/20">
              Reserve a Table
            </a>
            <a href="<?= BASE_URL ?>/games" class="px-8 py-4 bg-surface-high text-[#e5e2e1] rounded-xl font-bold text-lg hover:bg-surface-highest transition-colors">
              Browse Games
            </a>
          <?php endif; ?>
        <?php else: ?>
          <a href="<?= BASE_URL ?>/register" class="px-8 py-4 bg-[#e9c176] text-[#412d00] rounded-xl font-bold text-lg hover:opacity-90 shadow-lg shadow-[#e9c176]/20">
            Get Started
          </a>
        <?php endif; ?>
      </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
      <span class="material-symbols-outlined text-[#e9c176]/50 text-4xl">keyboard_arrow_down</span>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-headline font-bold mb-4">Why Choose Aji L3bo?</h2>
        <p class="text-[#c1c8c7] max-w-xl mx-auto">Everything you need for the perfect gaming session</p>
      </div>
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-surface-container rounded-2xl p-6 card-hover">
          <div class="w-14 h-14 bg-[#e9c176]/10 rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined text-[#e9c176] text-3xl">extension</span>
          </div>
          <h3 class="font-headline font-bold text-lg mb-2">500+ Games</h3>
          <p class="text-[#c1c8c7] text-sm">From classic board games to the latest releases and hidden gems</p>
        </div>
        <div class="bg-surface-container rounded-2xl p-6 card-hover">
          <div class="w-14 h-14 bg-[#abcdcc]/10 rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined text-[#abcdcc] text-3xl">table_bar</span>
          </div>
          <h3 class="font-headline font-bold text-lg mb-2">Cozy Tables</h3>
          <p class="text-[#c1c8c7] text-sm">Comfortable seating with dedicated gaming tables for every group size</p>
        </div>
        <div class="bg-surface-container rounded-2xl p-6 card-hover">
          <div class="w-14 h-14 bg-[#e9c176]/10 rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined text-[#e9c176] text-3xl">schedule</span>
          </div>
          <h3 class="font-headline font-bold text-lg mb-2">Easy Booking</h3>
          <p class="text-[#c1c8c7] text-sm">Reserve your spot online in just a few clicks, anytime</p>
        </div>
        <div class="bg-surface-container rounded-2xl p-6 card-hover">
          <div class="w-14 h-14 bg-[#abcdcc]/10 rounded-xl flex items-center justify-center mb-4">
            <span class="material-symbols-outlined text-[#abcdcc] text-3xl">local_cafe</span>
          </div>
          <h3 class="font-headline font-bold text-lg mb-2">Cafe & Snacks</h3>
          <p class="text-[#c1c8c7] text-sm">Enjoy drinks and snacks while you play your favorite games</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section class="py-24 px-6 bg-surface-container/50">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-headline font-bold mb-4">How It Works</h2>
        <p class="text-[#c1c8c7] max-w-xl mx-auto">Get started in three simple steps</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="text-center">
          <div class="w-16 h-16 bg-[#e9c176] text-[#412d00] rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">1</div>
          <h3 class="font-headline font-bold text-xl mb-3">Choose a Game</h3>
          <p class="text-[#c1c8c7]">Browse our collection and pick your favorite game or let our staff recommend one</p>
        </div>
        <div class="text-center">
          <div class="w-16 h-16 bg-[#e9c176] text-[#412d00] rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">2</div>
          <h3 class="font-headline font-bold text-xl mb-3">Select Date & Table</h3>
          <p class="text-[#c1c8c7]">Pick your preferred date, time, and table that fits your group size</p>
        </div>
        <div class="text-center">
          <div class="w-16 h-16 bg-[#e9c176] text-[#412d00] rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">3</div>
          <h3 class="font-headline font-bold text-xl mb-3">Confirm & Play</h3>
          <p class="text-[#c1c8c7]">Confirm your reservation and show up ready to have fun!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-24 px-6">
    <div class="max-w-4xl mx-auto text-center bg-surface-container rounded-3xl p-12 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-[#e9c176]/5 to-[#abcdcc]/5"></div>
      <div class="relative">
        <?php if ($isAdmin): ?>
          <h2 class="text-3xl md:text-4xl font-headline font-bold mb-4">Admin Panel</h2>
          <p class="text-[#c1c8c7] max-w-xl mx-auto mb-8">
            Manage your board game cafe efficiently from the admin dashboard.
          </p>
          <a href="<?= BASE_URL ?>/admin" class="inline-block px-8 py-4 bg-[#e9c176] text-[#412d00] rounded-xl font-bold text-lg hover:opacity-90">
            Go to Dashboard
          </a>
        <?php elseif ($isLoggedIn): ?>
          <h2 class="text-3xl md:text-4xl font-headline font-bold mb-4">Ready to Play?</h2>
          <p class="text-[#c1c8c7] max-w-xl mx-auto mb-8">
            Join us and experience the best board game cafe in town.
          </p>
          <a href="<?= BASE_URL ?>/reservation" class="inline-block px-8 py-4 bg-[#e9c176] text-[#412d00] rounded-xl font-bold text-lg hover:opacity-90">
            Make a Reservation
          </a>
        <?php else: ?>
          <h2 class="text-3xl md:text-4xl font-headline font-bold mb-4">Ready to Play?</h2>
          <p class="text-[#c1c8c7] max-w-xl mx-auto mb-8">
            Join us and experience the best board game cafe in town.
          </p>
          <a href="<?= BASE_URL ?>/register" class="inline-block px-8 py-4 bg-[#e9c176] text-[#412d00] rounded-xl font-bold text-lg hover:opacity-90">
            Get Started Free
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-12 px-6 border-t border-[#ffffff]/5">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
      <div class="text-center md:text-left">
        <span class="text-xl font-black text-[#e9c176]">Aji L3bo</span>
        <p class="text-[#c1c8c7] text-sm mt-1">Your ultimate board game destination</p>
      </div>
      <div class="flex gap-6 text-sm text-[#c1c8c7]">
        <?php if ($isAdmin): ?>
          <a href="<?= BASE_URL ?>/admin" class="hover:text-[#e9c176] transition-colors">Dashboard</a>
          <a href="<?= BASE_URL ?>/admin/games" class="hover:text-[#e9c176] transition-colors">Games</a>
          <a href="<?= BASE_URL ?>/admin/reservations" class="hover:text-[#e9c176] transition-colors">Reservations</a>
        <?php elseif ($isLoggedIn): ?>
          <a href="<?= BASE_URL ?>/games" class="hover:text-[#e9c176] transition-colors">Games</a>
          <a href="<?= BASE_URL ?>/reservation" class="hover:text-[#e9c176] transition-colors">Reserve</a>
          <a href="<?= BASE_URL ?>/my-reservations" class="hover:text-[#e9c176] transition-colors">My Reservations</a>
        <?php endif; ?>
      </div>
      <p class="text-[#c1c8c7] text-sm">© <?= date('Y') ?> Aji L3bo. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
