<?php use App\Helper\Csrf; date_default_timezone_set('Africa/Casablanca'); ?>


<!DOCTYPE html>
<html class="dark" lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Aji L3bo - Reserve Your Table</title>
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
    .glass-panel { backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
  </style>
</head>

<body class="bg-background text-on-surface min-h-screen">
  <!-- TopNavBar -->
  <nav class="fixed top-0 w-full z-50 bg-[#131313]/80 backdrop-blur-xl flex justify-between items-center px-8 py-4 max-w-full mx-auto shadow-2xl shadow-black/40">
    <div class="flex items-center gap-8">
      <a href="<?= BASE_URL ?>/" class="text-2xl font-black tracking-tighter text-[#e9c176]">Aji L3bo</a>
      <div class="hidden md:flex items-center gap-6">
        <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/games">Games</a>
        <a class="text-[#e9c176] border-b-2 border-[#e9c176] pb-1 font-body text-sm" href="<?= BASE_URL ?>/reservation">Reserve</a>
        <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="<?= BASE_URL ?>/my-reservations">My Reservations</a>
      </div>
    </div>
    <div class="flex items-center gap-6">
      <div class="w-10 h-10 rounded-full bg-surface-highest flex items-center justify-center overflow-hidden border-2 border-[#e9c176]/20">
        <img alt="User profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXwXKvwXtGL8h4i6RbVBjRKjPdOl4P78mp6_HdTVWuvxluBqlUs-3-0ncvyQ4FOr99OPXvwezDBUoRyVufddjFl6Aw-5aImvjLMG8IO_obiShv5Ae4b95oXWU5TdAQXrKtdhJ5pN82qX9lK_oXnS9-o9Qqf3ZDl09VK_NzTCuw8eHTeyPrfiQkw1TBDpgma7gWGjvCa9CJB7p0OQWW7d75XzkVlSpquGq5C76S2xMshPJKXVeNEgGTfCX_1Zn3eJ5vxYAhQmYDmAvL">
      </div>
    </div>
  </nav>

  <main class="pt-28 pb-20 px-4 md:px-8 max-w-6xl mx-auto">
    <header class="mb-10 text-center">
      <h1 class="text-4xl md:text-5xl font-headline font-extrabold tracking-tight text-on-surface mb-3">Book Your Table</h1>
      <p class="text-secondary max-w-xl mx-auto">Reserve your gaming session. Select a game, table, date, and time to get started.</p>
    </header>

    <form method="POST" action="<?= BASE_URL ?>/reservation/create" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <?= Csrf::field() ?>
      <!-- Left: Form -->
      <div class="lg:col-span-2 space-y-6">
        <!-- Game Selection -->
        <div class="bg-surface-container rounded-2xl p-6">
          <div class="flex items-center justify-between mb-4">
            <h2 class="font-headline text-xl font-bold text-primary">Select Game</h2>
            <span class="text-sm text-secondary"><?= $pagination['totalGames'] ?? 0 ?> games</span>
          </div>
          
          <!-- Search - Inside the section -->
          <form method="GET" class="mb-4 pb-4 border-b border-outline-variant/20">
            <div class="flex gap-2">
              <input type="text" name="search" placeholder="Search games..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" 
                class="flex-1 bg-surface-high border-none rounded-xl py-2 px-4 text-on-surface focus:ring-2 focus:ring-primary/50">
              <button type="submit" class="px-4 py-2 bg-primary text-on-primary rounded-xl font-bold hover:opacity-90">Search</button>
              <?php if (isset($_GET['search']) || isset($_GET['category'])): ?>
              <a href="<?= BASE_URL ?>/reservation" class="px-4 py-2 bg-surface-high text-secondary rounded-xl hover:bg-surface-highest">Clear</a>
              <?php endif; ?>
            </div>
          </form>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <?php if (($pagination['currentPage'] ?? 1) === 1): ?>
            <!-- No game selected option - only on first page -->
            <label class="game-option cursor-pointer h-full">
              <input type="radio" name="game_id" value="" class="hidden peer" checked>
              <div class="p-4 rounded-xl border-2 border-outline-variant/10 peer-checked:border-secondary peer-checked:bg-secondary/5 transition-all h-full flex flex-col justify-center">
                <div class="flex items-center gap-4 justify-center">
                  <div class="w-16 h-16 rounded-lg bg-surface-high flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl text-secondary">help_outline</span>
                  </div>
                  <div>
                    <h3 class="font-bold text-on-surface">No Game Selected</h3>
                    <p class="text-xs text-secondary">Choose game at the cafe</p>
                  </div>
                </div>
              </div>
            </label>
            <?php endif; ?>
            
            <?php foreach ($games ?? [] as $game): ?>
            <label class="game-option cursor-pointer">
              <input type="radio" name="game_id" value="<?= $game['id'] ?>" class="hidden peer">
              <div class="p-4 rounded-xl border-2 border-outline-variant/10 peer-checked:border-primary peer-checked:bg-primary/5 transition-all">
                <div class="flex items-center gap-4">
                  <img src="<?= $game['image_url'] ?? 'https://picsum.photos/seed/' . $game['id'] . '/100/100' ?>" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                  <div class="flex-1">
                    <h3 class="font-bold text-on-surface"><?= $game['name'] ?></h3>
                    <p class="text-xs text-secondary"><?= $game['category_name'] ?? 'Board Game' ?></p>
                    <div class="flex items-center gap-3 mt-2 text-xs text-secondary">
                      <span><?= $game['min_players'] ?? 2 ?>-<?= $game['max_players'] ?? 4 ?> players</span>
                      <span><?= $game['duration'] ?? 60 ?> min</span>
                    </div>
                  </div>
                </div>
                <div class="mt-3 pt-3 border-t border-outline-variant/10">
                  <span class="text-lg font-bold text-primary"><?= number_format($game['price'] ?? 0, 2) ?> MAD</span>
                </div>
              </div>
            </label>
            <?php endforeach; ?>
          </div>
          
          <?php if (($pagination['totalPages'] ?? 0) > 1): ?>
          <!-- Pagination -->
          <div class="flex items-center justify-center gap-2 mt-6">
            <?php if (($pagination['currentPage'] ?? 1) > 1): ?>
            <a href="?page=<?= ($pagination['currentPage'] ?? 1) - 1 ?><?= isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?><?= isset($_GET['category']) ? '&category=' . $_GET['category'] : '' ?>" 
               class="px-4 py-2 bg-surface-high rounded-xl hover:bg-surface-highest transition-colors">
              <span class="material-symbols-outlined">chevron_left</span>
            </a>
            <?php endif; ?>
            
            <?php 
            $start = max(1, ($pagination['currentPage'] ?? 1) - 2);
            $end = min($pagination['totalPages'] ?? 1, $start + 4);
            if ($end - $start < 4) $start = max(1, $end - 4);
            for ($i = $start; $i <= $end; $i++): 
            ?>
              <a href="?page=<?= $i ?><?= isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?><?= isset($_GET['category']) ? '&category=' . $_GET['category'] : '' ?>" 
                 class="px-4 py-2 rounded-xl <?= $i == ($pagination['currentPage'] ?? 1) ? 'bg-primary text-on-primary' : 'bg-surface-high hover:bg-surface-highest' ?> transition-colors">
                <?= $i ?>
              </a>
            <?php endfor; ?>
            
            <?php if (($pagination['currentPage'] ?? 1) < ($pagination['totalPages'] ?? 1)): ?>
            <a href="?page=<?= ($pagination['currentPage'] ?? 1) + 1 ?><?= isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?><?= isset($_GET['category']) ? '&category=' . $_GET['category'] : '' ?>" 
               class="px-4 py-2 bg-surface-high rounded-xl hover:bg-surface-highest transition-colors">
              <span class="material-symbols-outlined">chevron_right</span>
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>

        <!-- Table Selection -->
        <div class="bg-surface-container rounded-2xl p-6">
          <h2 class="font-headline text-xl font-bold text-primary mb-4">Select Table</h2>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php foreach ($tables ?? [] as $table): ?>
            <label class="table-option cursor-pointer">
              <input type="radio" name="table_id" value="<?= $table['id'] ?>" class="hidden peer" required>
              <div class="p-4 rounded-xl border-2 border-outline-variant/10 peer-checked:border-primary peer-checked:bg-primary/5 transition-all text-center">
                <div class="w-16 h-16 mx-auto mb-2 rounded-xl bg-surface-high flex items-center justify-center">
                  <span class="text-2xl font-black text-primary"><?= str_replace('Table ', '', $table['reference']) ?></span>
                </div>
                <p class="font-bold text-on-surface"><?= $table['reference'] ?></p>
                <p class="text-xs text-secondary"><?= $table['capacity'] ?> seats</p>
              </div>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Date & Time -->
        <div class="bg-surface-container rounded-2xl p-6">
          <h2 class="font-headline text-xl font-bold text-primary mb-4">Date & Time</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
              <label class="block text-sm text-secondary mb-2">Date</label>
              <input type="date" name="date" required min="<?= date('Y-m-d') ?>"
                class="w-full bg-surface-high border-none rounded-xl py-3 px-4 text-on-surface focus:ring-2 focus:ring-primary/50">
            </div>
            <div>
              <label class="block text-sm text-secondary mb-2">Start Time</label>
              <select name="start_time" required class="w-full bg-surface-high border-none rounded-xl py-3 px-4 text-on-surface focus:ring-2 focus:ring-primary/50">
                <?php for ($h = 10; $h <= 22; $h++): ?>
                  <?php for ($m = 0; $m < 60; $m += 30): ?>
                    <option value="<?= sprintf('%02d:%02d:00', $h, $m) ?>"><?= sprintf('%02d:%02d', $h, $m) ?></option>
                  <?php endfor; ?>
                <?php endfor; ?>
              </select>
            </div>
            <div>
              <label class="block text-sm text-secondary mb-2">Duration (hours)</label>
              <select name="duration" id="duration" class="w-full bg-surface-high border-none rounded-xl py-3 px-4 text-on-surface focus:ring-2 focus:ring-primary/50">
                <option value="1">1 hour</option>
                <option value="2" selected>2 hours</option>
                <option value="3">3 hours</option>
                <option value="4">4 hours</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Guest Details -->
        <div class="bg-surface-container rounded-2xl p-6">
          <h2 class="font-headline text-xl font-bold text-primary mb-4">Guest Details</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm text-secondary mb-2">Number of Guests</label>
              <div class="flex items-center gap-4">
                <button type="button" onclick="changeSpots(-1)" class="w-12 h-12 rounded-xl bg-surface-high flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all">
                  <span class="material-symbols-outlined">remove</span>
                </button>
                <input type="number" name="spots" id="spots" value="2" min="1" max="8" required
                  class="w-full bg-surface-high border-none rounded-xl py-3 px-4 text-center text-xl font-bold text-on-surface focus:ring-2 focus:ring-primary/50">
                <button type="button" onclick="changeSpots(1)" class="w-12 h-12 rounded-xl bg-surface-high flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all">
                  <span class="material-symbols-outlined">add</span>
                </button>
              </div>
            </div>
            <div class="flex items-end">
              <p class="text-sm text-secondary">Select the number of players for your session</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Summary -->
      <div class="lg:col-span-1">
        <div class="sticky top-28 bg-surface-container-highest rounded-2xl overflow-hidden shadow-xl">
          <div class="p-6 border-b border-outline-variant/10">
            <h2 class="font-headline text-xl font-bold text-primary">Booking Summary</h2>
          </div>
          <div class="p-6 space-y-4">
            <div class="flex items-center justify-between">
              <span class="text-secondary">Game</span>
              <span class="font-bold text-on-surface" id="summary-game">Select a game</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-secondary">Table</span>
              <span class="font-bold text-on-surface" id="summary-table">Select a table</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-secondary">Date</span>
              <span class="font-bold text-on-surface" id="summary-date">-</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-secondary">Time</span>
              <span class="font-bold text-on-surface" id="summary-time">-</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-secondary">Duration</span>
              <span class="font-bold text-on-surface" id="summary-duration">2 hours</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-secondary">Guests</span>
              <span class="font-bold text-on-surface" id="summary-spots">2</span>
            </div>
          </div>
          <div class="p-6 border-t border-outline-variant/10">
            <div class="flex items-center justify-between mb-6">
              <span class="text-lg font-bold text-on-surface">Total</span>
              <span class="text-2xl font-black text-primary" id="summary-total">0 MAD</span>
            </div>
            <button type="submit" class="w-full py-4 rounded-full bg-gradient-to-r from-primary to-amber-400 text-on-primary font-bold text-lg shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
              Confirm Reservation
            </button>
            <p class="text-center text-xs text-secondary/50 mt-4">
              By confirming, you agree to our terms. Cancellations must be made 24h in advance.
            </p>
          </div>
        </div>
      </div>
    </form>
  </main>

  <script>
    const games = <?= json_encode($games ?? []) ?>;
    const tables = <?= json_encode($tables ?? []) ?>;

    function changeSpots(delta) {
      const input = document.getElementById('spots');
      let val = parseInt(input.value) + delta;
      if (val < 1) val = 1;
      if (val > 8) val = 8;
      input.value = val;
      updateSummary();
    }

    function updateSummary() {
      // Game
      const selectedGame = document.querySelector('input[name="game_id"]:checked');
      const gameEl = document.getElementById('summary-game');
      const totalEl = document.getElementById('summary-total');
      if (selectedGame) {
        const game = games.find(g => g.id == selectedGame.value);
        if (game) {
          gameEl.textContent = game.name;
        }
      }

      // Table
      const selectedTable = document.querySelector('input[name="table_id"]:checked');
      const tableEl = document.getElementById('summary-table');
      if (selectedTable) {
        const table = tables.find(t => t.id == selectedTable.value);
        if (table) {
          tableEl.textContent = table.reference;
        }
      }

      // Date
      const dateEl = document.getElementById('summary-date');
      const dateInput = document.querySelector('input[name="date"]');
      if (dateInput && dateInput.value) {
        const d = new Date(dateInput.value);
        dateEl.textContent = d.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
      }

      // Time
      const timeEl = document.getElementById('summary-time');
      const timeInput = document.querySelector('select[name="start_time"]');
      const durationInput = document.getElementById('duration');
      if (timeInput && timeInput.value) {
        const [h, m] = timeInput.value.split(':');
        const start = new Date();
        start.setHours(parseInt(h), parseInt(m), 0);
        const duration = parseInt(durationInput.value) || 2;
        const end = new Date(start.getTime() + duration * 60 * 60 * 1000);
        timeEl.textContent = `${start.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })} - ${end.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}`;
      }

      // Duration
      document.getElementById('summary-duration').textContent = (parseInt(durationInput.value) || 2) + ' hours';

      // Spots
      document.getElementById('summary-spots').textContent = document.getElementById('spots').value;

      // Total (price is just the game price, no relation with duration)
      if (selectedGame) {
        const game = games.find(g => g.id == selectedGame.value);
        const total = parseFloat(game?.price) || 0;
        totalEl.textContent = total.toFixed(2) + ' MAD';
      } else {
        totalEl.textContent = '0 MAD';
      }
    }

    // Listen for changes
    document.querySelectorAll('input[name="game_id"], input[name="table_id"], input[name="date"], select[name="start_time"], #duration, #spots').forEach(el => {
      el.addEventListener('change', updateSummary);
    });

    // Initial update
    updateSummary();
  </script>
</body>

</html>
