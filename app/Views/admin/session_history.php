<?php date_default_timezone_set('Africa/Casablanca'); ?>
<html>

<head>
  <meta charset="utf-8">
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet">
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "surface-bright": "#393939",
            "surface-dim": "#131313",
            "background": "#131313",
            "secondary": "#abcdcc",
            "on-error": "#690005",
            "outline": "#8b9292",
            "on-surface": "#e5e2e1",
            "surface-container-lowest": "#0e0e0e",
            "primary": "#e9c176",
            "secondary-fixed-dim": "#abcdcc",
            "surface-container-highest": "#353534",
            "inverse-primary": "#775a19",
            "surface-container-high": "#2a2a2a",
            "surface": "#131313",
            "secondary-fixed": "#c7e9e8",
            "on-secondary-fixed-variant": "#2d4c4c",
            "on-secondary-container": "#9dbfbe",
            "on-secondary-fixed": "#002020",
            "on-error-container": "#ffdad6",
            "inverse-surface": "#e5e2e1",
            "tertiary-fixed-dim": "#e1c299",
            "surface-variant": "#353534",
            "primary-container": "#473100",
            "primary-fixed-dim": "#e9c176",
            "outline-variant": "#414848",
            "error-container": "#93000a",
            "error": "#ffb4ab",
            "on-surface-variant": "#c1c8c7",
            "tertiary-fixed": "#feddb3",
            "on-tertiary-fixed-variant": "#584324",
            "surface-tint": "#e9c176",
            "on-primary-fixed-variant": "#5d4201",
            "secondary-container": "#2f4e4e",
            "on-tertiary-fixed": "#281801",
            "inverse-on-surface": "#313030",
            "tertiary": "#e1c299",
            "on-secondary": "#153535",
            "tertiary-container": "#453214",
            "primary-fixed": "#ffdea5",
            "on-primary-container": "#bd9852",
            "surface-container": "#201f1f",
            "on-primary-fixed": "#261900",
            "surface-container-low": "#1c1b1b",
            "on-primary": "#412d00",
            "on-tertiary": "#402d10",
            "on-background": "#e5e2e1",
            "on-tertiary-container": "#b69a73"
          },
          "borderRadius": {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          "fontFamily": {
            "headline": ["Manrope"],
            "body": ["Inter"],
            "label": ["Inter"]
          }
        },
      },
    }
  </script>
  <style>
    html {
      font-size: 16px;
    }

    body {
      font-size: 1rem;
    }

    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #131313;
      color: #e5e2e1;
    }

    .font-manrope {
      font-family: 'Manrope', sans-serif;
    }

    .glass-card {
      background: rgba(32, 31, 31, 0.6);
      backdrop-filter: blur(20px);
    }

    .brass-gradient {
      background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%);
    }

    .ghost-border {
      border: 1px solid rgba(65, 72, 72, 0.15);
    }
  </style>
</head>

<body class="dark overflow-x-hidden">
  <div class="flex min-h-screen">
    <!-- SideNavBar -->
    <aside
      class="h-screen w-64 fixed left-0 top-0 border-r border-[#414848]/15 bg-[#131313] dark:bg-[#131313] shadow-[16px_0_40px_-4px_rgba(0,0,0,0.1)] flex flex-col py-8 z-50">
      <div class="px-6 mb-10">
        <h1 class="text-2xl font-black tracking-tight text-[#e9c176] font-manrope">The Tactile Archive</h1>
        <p class="text-[10px] uppercase tracking-widest text-secondary mt-1 opacity-70">Digital Curator</p>
      </div>
      <nav class="flex-1 space-y-1">
        <!-- Dashboard -->
        <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
          href="<?= BASE_URL ?>/admin">
          <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
          <span class="font-medium text-sm">Dashboard</span>
        </a>
        <!-- Games -->
        <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
          href="<?= BASE_URL ?>/admin/games">
          <span class="material-symbols-outlined" data-icon="sports_esports">sports_esports</span>
          <span class="font-medium text-sm">Games</span>
        </a>
        <!-- Categories -->
        <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
          href="<?= BASE_URL ?>/admin/categories">
          <span class="material-symbols-outlined" data-icon="category">category</span>
          <span class="font-medium text-sm">Categories</span>
        </a>
        <!-- Reservations -->
        <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
          href="<?= BASE_URL ?>/admin/reservations">
          <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
          <span class="font-medium text-sm">Reservations</span>
        </a>
        <!-- Active Sessions -->
        <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
          href="<?= BASE_URL ?>/admin/sessions">
          <span class="material-symbols-outlined" data-icon="timer">timer</span>
          <span class="font-medium text-sm">Active Sessions</span>
        </a>
        <!-- History -->
        <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center gap-3 shadow-lg shadow-primary/20"
          href="<?= BASE_URL ?>/admin/sessions/history">
          <span class="material-symbols-outlined" data-icon="history">history</span>
          <span class="text-sm">History</span>
        </a>
      </nav>
      <div class="px-4 mt-auto space-y-4">
        <a href="<?= BASE_URL ?>/admin/reservations"
          class="w-full bg-primary text-on-primary font-bold py-3 rounded-full flex items-center justify-center gap-2 hover:opacity-90 transition-all shadow-lg shadow-primary/10">
          <span class="material-symbols-outlined text-lg" data-icon="add">add</span>
          New Reservation
        </a>
        <div class="pt-4 space-y-1">
          <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-2 rounded-full transition-all flex items-center gap-3 text-sm"
            href="<?= BASE_URL ?>/admin/settings">
            <span class="material-symbols-outlined text-xl" data-icon="settings">settings</span>
            Settings
          </a>
          <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-2 rounded-full transition-all flex items-center gap-3 text-sm"
            href="<?= BASE_URL ?>/logout">
            <span class="material-symbols-outlined text-xl" data-icon="logout">logout</span>
            Logout
          </a>
        </div>
      </div>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 ml-64 min-h-screen bg-background">
      <!-- TopNavBar -->
      <header
        class="fixed top-0 right-0 left-64 h-20 bg-[#131313]/60 backdrop-blur-xl border-b border-[#414848]/15 flex justify-between items-center px-12 z-40">
        <div class="flex items-center bg-surface-container rounded-full px-6 py-2 w-96 ghost-border">
          <span class="material-symbols-outlined text-secondary mr-3 text-xl">search</span>
          <input class="bg-transparent border-none focus:ring-0 text-sm w-full placeholder:text-outline/50"
            placeholder="Search archive logs..." type="text">
        </div>
        <div class="flex items-center gap-6">
          <div class="flex gap-4">
            <button class="text-secondary hover:text-primary transition-colors">
              <span class="material-symbols-outlined">notifications</span>
            </button>
            <button class="text-secondary hover:text-primary transition-colors">
              <span class="material-symbols-outlined">settings</span>
            </button>
            <button class="text-secondary hover:text-primary transition-colors">
              <span class="material-symbols-outlined">help</span>
            </button>
          </div>
          <div class="h-6 w-px bg-outline-variant/30"></div>
          <button
            class="px-6 py-2 border border-primary/40 text-primary rounded-full text-sm font-medium hover:bg-primary/5 transition-all">
            Check-In
          </button>
        </div>
      </header>
      <!-- Content Canvas -->
      <section class="pt-32 px-12 pb-20">
        <!-- Hero Header -->
        <div class="mb-12">
          <h2 class="text-[3.5rem] font-extrabold font-manrope leading-tight tracking-tight text-on-surface">Session
            History</h2>
          <p class="text-secondary max-w-2xl mt-2 text-lg">A meticulous chronicle of past maneuvers and strategic
            encounters within the archive.</p>
        </div>
        <!-- Filters & Stats Bento -->
        <div class="grid grid-cols-12 gap-6 mb-12">
          <!-- Filters Card -->
          <div class="col-span-8 surface-container rounded-[2rem] p-8 ghost-border">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-xl font-manrope font-bold">Filter Archives</h3>
              <button class="text-sm text-primary flex items-center gap-1 hover:underline">
                <span class="material-symbols-outlined text-sm">filter_list_off</span>
                Clear all
              </button>
            </div>
            <div class="grid grid-cols-3 gap-8">
              <div class="space-y-2">
                <label class="text-[10px] uppercase tracking-widest text-secondary font-semibold">Table Range</label>
                <select
                  class="w-full bg-surface-container-high border-none rounded-xl py-3 px-4 text-sm focus:ring-1 focus:ring-primary/30">
                  <option>All Tables</option>
                  <option>VIP Lounges (1-4)</option>
                  <option>The Main Floor (5-12)</option>
                  <option>Classic Corner (13-20)</option>
                </select>
              </div>
              <div class="space-y-2">
                <label class="text-[10px] uppercase tracking-widest text-secondary font-semibold">Time Period</label>
                <div class="flex items-center bg-surface-container-high rounded-xl py-3 px-4">
                  <span class="material-symbols-outlined text-secondary text-sm mr-2">calendar_today</span>
                  <input class="bg-transparent border-none focus:ring-0 text-sm w-full p-0" type="text"
                    value="Oct 24 - Oct 31">
                </div>
              </div>
              <div class="space-y-2">
                <label class="text-[10px] uppercase tracking-widest text-secondary font-semibold">Sort Order</label>
                <select
                  class="w-full bg-surface-container-high border-none rounded-xl py-3 px-4 text-sm focus:ring-1 focus:ring-primary/30">
                  <option>Recent First</option>
                  <option>Longest Duration</option>
                  <option>Table Number</option>
                </select>
              </div>
            </div>
          </div>
          <!-- Quick Stats -->
          <div class="col-span-4 glass-card rounded-[2rem] p-8 ghost-border relative overflow-hidden group">
            <div
              class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl group-hover:bg-primary/10 transition-colors">
            </div>
            <h3 class="text-sm font-manrope font-bold text-secondary uppercase tracking-widest mb-6">Archive Summary
            </h3>
            <div class="space-y-6">
              <div class="flex justify-between items-end">
                <div>
                  <p class="text-3xl font-black font-manrope text-primary">1,284</p>
                  <p class="text-xs text-secondary mt-1">Sessions this month</p>
                </div>
                <span class="material-symbols-outlined text-primary/30 text-5xl">inventory_2</span>
              </div>
              <div class="h-px bg-outline-variant/15 w-full"></div>
              <div class="flex justify-between items-end">
                <div>
                  <p class="text-3xl font-black font-manrope text-on-surface">42h 15m</p>
                  <p class="text-xs text-secondary mt-1">Avg. table utilization</p>
                </div>
                <span class="material-symbols-outlined text-secondary/30 text-5xl">analytics</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Archive Table -->
        <div class="surface-container rounded-[2.5rem] overflow-hidden ghost-border">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-surface-container-high/50 border-b border-outline-variant/10">
                <th class="px-8 py-6 text-[10px] uppercase tracking-[0.2em] text-secondary font-bold">Table</th>
                <th class="px-8 py-6 text-[10px] uppercase tracking-[0.2em] text-secondary font-bold">Game Played</th>
                <th class="px-8 py-6 text-[10px] uppercase tracking-[0.2em] text-secondary font-bold">Curator/Customer
                </th>
                <th class="px-8 py-6 text-[10px] uppercase tracking-[0.2em] text-secondary font-bold">Timeline</th>
                <th class="px-8 py-6 text-[10px] uppercase tracking-[0.2em] text-secondary font-bold">Duration</th>
                <th class="px-8 py-6 text-[10px] uppercase tracking-[0.2em] text-secondary font-bold text-right">Price</th>
                <th class="px-8 py-6 text-[10px] uppercase tracking-[0.2em] text-secondary font-bold text-right">Status
                </th>
              </tr>
            </thead>
<tbody class="divide-y divide-outline-variant/5">
              <?php foreach ($history as $session): ?>
              <tr class="hover:bg-white/[0.02] transition-colors group">
                <td class="px-8 py-6">
                  <span class="text-lg font-black font-manrope text-primary">#<?= $session['table_number'] ?? '0' ?></span>
                </td>
                <td class="px-8 py-6">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-surface-container-highest flex items-center justify-center border border-outline-variant/10">
                      <span class="material-symbols-outlined text-secondary text-xl">sports_esports</span>
                    </div>
                    <div>
                      <p class="font-bold text-sm"><?= $session['game_name'] ?? 'Game Name' ?></p>
                      <p class="text-[10px] text-secondary/60"><?= $session['category'] ?? 'Category' ?> &bull; <?= $session['min_players'] ?? 1 ?>-<?= $session['max_players'] ?? 4 ?> Players</p>
                    </div>
                  </div>
                </td>
                <td class="px-8 py-6">
                  <p class="text-sm font-medium"><?= $session['customer_name'] ?? 'Customer Name' ?></p>
                  <p class="text-[10px] text-secondary/60"><?= $session['user_type'] ?? 'Guest Access' ?></p>
                </td>
                <td class="px-8 py-6">
                  <p class="text-sm font-medium"><?= date('H:i', strtotime($session['start_time'] ?? '00:00:00')) ?> &mdash; <?= date('H:i', strtotime($session['end_time'] ?? '00:00:00')) ?></p>
                  <p class="text-[10px] text-secondary/60"><?= date('M d', strtotime($session['session_date'] ?? 'today')) ?></p>
                </td>
                <td class="px-8 py-6">
                  <span class="text-sm font-semibold bg-surface-container-highest/50 px-3 py-1 rounded-full border border-outline-variant/10"><?= $session['duration_formatted'] ?? '0h 0m' ?></span>
                </td>
                <td class="px-8 py-6 text-right">
                  <span class="text-sm font-bold text-primary"><?= number_format($session['total_price'] ?? 0, 2) ?> DH</span>
                </td>
                <td class="px-8 py-6 text-right">
                  <div class="flex items-center justify-end gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-secondary"><?= ucfirst($session['status'] ?? 'completed') ?></span>
                    <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.6)]"></div>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- Pagination -->
          <div
            class="px-12 py-8 bg-surface-container-high/30 border-t border-outline-variant/10 flex items-center justify-between">
            <p class="text-xs text-secondary">Showing <span class="text-on-surface font-semibold">1-4</span> of <span
                class="text-on-surface font-semibold">856</span> sessions</p>
            <div class="flex gap-2">
              <button
                class="w-10 h-10 rounded-full border border-outline-variant/20 flex items-center justify-center text-secondary hover:bg-surface-container-highest transition-colors">
                <span class="material-symbols-outlined">chevron_left</span>
              </button>
              <button class="w-10 h-10 rounded-full bg-primary text-on-primary font-bold text-xs">1</button>
              <button
                class="w-10 h-10 rounded-full border border-outline-variant/20 flex items-center justify-center text-on-surface font-bold text-xs hover:bg-surface-container-highest transition-colors">2</button>
              <button
                class="w-10 h-10 rounded-full border border-outline-variant/20 flex items-center justify-center text-on-surface font-bold text-xs hover:bg-surface-container-highest transition-colors">3</button>
              <button
                class="w-10 h-10 rounded-full border border-outline-variant/20 flex items-center justify-center text-secondary hover:bg-surface-container-highest transition-colors">
                <span class="material-symbols-outlined">chevron_right</span>
              </button>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>

</html>