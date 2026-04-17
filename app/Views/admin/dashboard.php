<!DOCTYPE html>
<html class="dark" lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Aji L3bo - Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
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
    .glass-panel { backdrop-filter: blur(16px); background: rgba(32, 31, 31, 0.6); }
    .brass-gradient { background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%); }
  </style>
</head>

<body class="bg-background text-on-surface">
  <!-- SideNavBar -->
  <aside class="h-screen w-64 fixed left-0 top-0 bg-[#0e0e0e] flex flex-col py-6 shadow-[16px_0_40px_-4px_rgba(0,0,0,0.5)] z-50">
    <div class="px-8 mb-8">
      <a href="<?= BASE_URL ?>/" class="text-xl font-bold text-[#e9c176]">Aji L3bo</a>
    </div>
    <div class="px-6 mb-6">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
          <span class="material-symbols-outlined text-primary">person</span>
        </div>
        <div>
          <p class="text-on-surface font-headline font-bold text-sm leading-none"><?= $_SESSION['user_name'] ?? 'Admin' ?></p>
          <p class="text-secondary text-xs mt-1">Administrator</p>
        </div>
      </div>
    </div>
    <nav class="flex-1 space-y-1 px-2">
      <!-- Dashboard -->
      <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full px-4 py-3 font-bold flex items-center gap-3 shadow-lg shadow-primary/20"
        href="<?= BASE_URL ?>/admin">
        <span class="material-symbols-outlined">dashboard</span>
        <span class="text-sm">Dashboard</span>
      </a>
      <!-- Games -->
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 px-4 py-3 rounded-full transition-all flex items-center gap-3"
        href="<?= BASE_URL ?>/admin/games">
        <span class="material-symbols-outlined">sports_esports</span>
        <span class="text-sm">Games</span>
      </a>
      <!-- Categories -->
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 px-4 py-3 rounded-full transition-all flex items-center gap-3"
        href="<?= BASE_URL ?>/admin/categories">
        <span class="material-symbols-outlined">category</span>
        <span class="text-sm">Categories</span>
      </a>
      <!-- Reservations -->
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 px-4 py-3 rounded-full transition-all flex items-center gap-3"
        href="<?= BASE_URL ?>/admin/reservations">
        <span class="material-symbols-outlined">event_available</span>
        <span class="text-sm">Reservations</span>
      </a>
      <!-- Active Sessions -->
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 px-4 py-3 rounded-full transition-all flex items-center gap-3"
        href="<?= BASE_URL ?>/admin/sessions">
        <span class="material-symbols-outlined">timer</span>
        <span class="text-sm">Active Sessions</span>
      </a>
      <!-- History -->
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 px-4 py-3 rounded-full transition-all flex items-center gap-3"
        href="<?= BASE_URL ?>/admin/sessions/history">
        <span class="material-symbols-outlined">history</span>
        <span class="text-sm">History</span>
      </a>
    </nav>
    <div class="px-4 mt-auto">
      <div class="space-y-1 mb-4">
        <a class="text-[#abcdcc] hover:bg-[#353534]/50 px-4 py-2 rounded-full transition-all flex items-center gap-3 text-sm"
          href="<?= BASE_URL ?>/admin/settings">
          <span class="material-symbols-outlined">settings</span>
          Settings
        </a>
        <a class="text-[#abcdcc] hover:bg-[#353534]/50 px-4 py-2 rounded-full transition-all flex items-center gap-3 text-sm"
          href="<?= BASE_URL ?>/logout">
          <span class="material-symbols-outlined">logout</span>
          Logout
        </a>
      </div>
    </div>
  </aside>

  <!-- Main Content Area -->
  <main class="ml-64 p-10 min-h-screen">
    <!-- Header -->
    <header class="flex justify-between items-end mb-12">
      <div>
        <h1 class="text-5xl font-extrabold tracking-tighter text-on-surface mb-2">Welcome, <?= $_SESSION['user_name'] ?? 'Admin' ?></h1>
        <p class="text-secondary font-medium italic">Admin Dashboard</p>
      </div>
      <div class="flex items-center space-x-4">
        <div class="text-right">
          <p class="text-xs uppercase tracking-widest text-outline">Current Time</p>
          <p id="currentTime" class="text-xl font-headline font-bold text-primary"><?= date('H:i') ?></p>
        </div>
      </div>
    </header>

    <!-- Stats Bento Grid -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
      <div class="bg-surface-container p-6 rounded-xl shadow-2xl relative overflow-hidden group">
        <div class="relative z-10">
          <p class="text-outline-variant text-xs uppercase tracking-widest mb-2">Reservations Today</p>
          <h3 class="text-4xl font-headline font-extrabold text-on-surface"><?= $stats['totalReservationsToday'] ?></h3>
        </div>
        <span class="material-symbols-outlined absolute -bottom-2 -right-2 text-primary/10 text-8xl">calendar_today</span>
      </div>
      <div class="bg-surface-container-high p-6 rounded-xl shadow-2xl relative overflow-hidden group">
        <div class="relative z-10">
          <p class="text-outline-variant text-xs uppercase tracking-widest mb-2">Active Sessions</p>
          <h3 class="text-4xl font-headline font-extrabold text-on-surface"><?= $stats['activeSessions'] ?></h3>
          <div class="mt-2 flex items-center text-primary text-xs font-semibold">
            <div class="w-2 h-2 rounded-full bg-primary mr-2 animate-pulse shadow-[0_0_8px_#e9c176]"></div>
            <span>Live Now</span>
          </div>
        </div>
        <span class="material-symbols-outlined absolute -bottom-2 -right-2 text-primary/10 text-8xl">play_circle</span>
      </div>
      <div class="bg-surface-container p-6 rounded-xl shadow-2xl relative overflow-hidden group">
        <div class="relative z-10">
          <p class="text-outline-variant text-xs uppercase tracking-widest mb-2">Available Tables</p>
          <h3 class="text-4xl font-headline font-extrabold text-on-surface"><?= $stats['availableTables'] ?> / <?= $stats['totalTables'] ?></h3>
        </div>
        <span class="material-symbols-outlined absolute -bottom-2 -right-2 text-primary/10 text-8xl">table_restaurant</span>
      </div>
      <div class="bg-surface-container p-6 rounded-xl shadow-2xl relative overflow-hidden group">
        <div class="relative z-10">
          <p class="text-outline-variant text-xs uppercase tracking-widest mb-2">Revenue Today</p>
          <h3 class="text-4xl font-headline font-extrabold text-primary"><?= number_format($stats['revenueToday'], 2) ?> DH</h3>
        </div>
        <span class="material-symbols-outlined absolute -bottom-2 -right-2 text-primary/10 text-8xl">payments</span>
      </div>
    </section>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      <!-- Reservations Table Section -->
      <div class="lg:col-span-2 space-y-6">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-headline font-extrabold tracking-tight">Today's Reservations</h2>
          <a href="<?= BASE_URL ?>/admin/reservations" class="text-primary font-bold text-sm hover:underline">View All</a>
        </div>
        <div class="bg-surface-container rounded-xl overflow-hidden shadow-2xl">
          <?php if (empty($upcomingReservations)): ?>
          <div class="p-8 text-center text-secondary">
            <span class="material-symbols-outlined text-4xl mb-2">event_busy</span>
            <p>No reservations for today</p>
          </div>
          <?php else: ?>
          <table class="w-full text-left">
            <thead>
              <tr class="bg-surface-container-high/30">
                <th class="px-6 py-4 text-xs uppercase tracking-widest text-outline">Customer</th>
                <th class="px-6 py-4 text-xs uppercase tracking-widest text-outline">Time</th>
                <th class="px-6 py-4 text-xs uppercase tracking-widest text-outline text-center">Table</th>
                <th class="px-6 py-4 text-xs uppercase tracking-widest text-outline">Game</th>
                <th class="px-6 py-4 text-xs uppercase tracking-widest text-outline text-right">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/10">
              <?php foreach ($upcomingReservations as $reservation): ?>
              <?php 
              $initials = '';
              $nameParts = explode(' ', $reservation['customer_name'] ?? 'Guest');
              foreach ($nameParts as $part) {
                $initials .= strtoupper(substr($part, 0, 1));
              }
              $initials = substr($initials, 0, 2);
              ?>
              <tr class="hover:bg-white/5 transition-colors group">
                <td class="px-6 py-5">
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs">
                      <?= $initials ?: 'G' ?>
                    </div>
                    <span class="font-medium"><?= htmlspecialchars($reservation['customer_name'] ?? 'Guest') ?></span>
                  </div>
                </td>
                <td class="px-6 py-5 text-on-surface-variant">
                  <?= date('H:i', strtotime($reservation['start_time'])) ?>
                </td>
                <td class="px-6 py-5 text-center font-headline font-bold text-primary">
                  <?= htmlspecialchars($reservation['table_reference'] ?? 'TBD') ?>
                </td>
                <td class="px-6 py-5 text-sm text-secondary">
                  <?= htmlspecialchars($reservation['game_name'] ?? 'No game') ?>
                </td>
                <td class="px-6 py-5 text-right">
                  <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <?php if ($reservation['reservation_status'] === 'confirmed'): ?>
                    <a href="<?= BASE_URL ?>/admin/reservations/start-session/<?= $reservation['id'] ?>" 
                       class="px-3 py-1 bg-primary/20 hover:bg-primary/40 rounded-full text-primary text-xs font-bold">
                      Start
                    </a>
                    <?php endif; ?>
                    <a href="<?= BASE_URL ?>/admin/reservations/view/<?= $reservation['id'] ?>" 
                       class="p-2 hover:bg-white/10 rounded-lg text-secondary">
                      <span class="material-symbols-outlined text-sm">visibility</span>
                    </a>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent History Section -->
      <div class="space-y-6">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-headline font-extrabold tracking-tight">Recent Sessions</h2>
          <a href="<?= BASE_URL ?>/admin/sessions/history" class="text-primary font-bold text-sm hover:underline">View All</a>
        </div>
        <div class="space-y-4">
          <?php if (empty($recentSessions)): ?>
          <div class="bg-surface-container p-6 rounded-xl text-center text-secondary">
            <span class="material-symbols-outlined text-4xl mb-2">history</span>
            <p>No completed sessions yet</p>
          </div>
          <?php else: ?>
          <?php foreach ($recentSessions as $session): ?>
          <?php 
          $duration = '';
          if (!empty($session['started_at']) && !empty($session['ended_at'])) {
            $start = new DateTime($session['started_at']);
            $end = new DateTime($session['ended_at']);
            $diff = $start->diff($end);
            $duration = $diff->h . 'h ' . $diff->i . 'm';
          }
          ?>
          <div class="bg-surface-container-low p-5 rounded-xl flex items-center justify-between group hover:translate-x-2 transition-transform duration-300">
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-lg bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">sports_esports</span>
              </div>
              <div>
                <p class="font-bold text-on-surface"><?= htmlspecialchars($session['game_name'] ?? 'Session') ?></p>
                <p class="text-xs text-secondary">
                  <?= htmlspecialchars($session['table_reference'] ?? 'Table') ?>
                  <?php if ($duration): ?>
                   &bull; <?= $duration ?>
                  <?php endif; ?>
                </p>
              </div>
            </div>
            <div class="text-right">
              <p class="font-headline font-bold text-primary"><?= number_format($session['total_price'] ?? 0, 2) ?> DH</p>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>

  <script>
    function updateTime() {
      const now = new Date();
      const time = now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
      document.getElementById('currentTime').textContent = time;
    }
    setInterval(updateTime, 1000);
  </script>
</body>

</html>
