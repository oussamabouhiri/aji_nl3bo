<?php 
use App\Helper\Csrf;
date_default_timezone_set('Africa/Casablanca'); 
?>
<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Aji L3bo - Admin Console</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                        "inverse-on-surface": "#313030",
                        "on-primary-fixed": "#261900",
                        "tertiary-fixed-dim": "#e1c299",
                        "on-secondary-fixed": "#002020",
                        "tertiary-fixed": "#feddb3",
                        "surface-container-lowest": "#0e0e0e",
                        "tertiary-container": "#453214",
                        "on-secondary": "#153535",
                        "on-tertiary-container": "#b69a73",
                        "outline": "#8b9292",
                        "surface-container-low": "#1c1b1b",
                        "on-background": "#e5e2e1",
                        "secondary": "#abcdcc",
                        "surface-tint": "#e9c176",
                        "surface-container-highest": "#353534",
                        "secondary-fixed": "#c7e9e8",
                        "surface-container-high": "#2a2a2a",
                        "primary-fixed-dim": "#e9c176",
                        "error-container": "#93000a",
                        "on-secondary-container": "#9dbfbe",
                        "background": "#131313",
                        "on-primary": "#412d00",
                        "outline-variant": "#414848",
                        "primary": "#e9c176",
                        "tertiary": "#e1c299",
                        "secondary-fixed-dim": "#abcdcc",
                        "surface-bright": "#393939",
                        "on-error": "#690005",
                        "on-surface": "#e5e2e1",
                        "primary-fixed": "#ffdea5",
                        "inverse-primary": "#775a19",
                        "on-tertiary": "#402d10",
                        "on-tertiary-fixed-variant": "#584324",
                        "error": "#ffb4ab",
                        "surface-dim": "#131313",
                        "surface-container": "#201f1f",
                        "inverse-surface": "#e5e2e1",
                        "on-tertiary-fixed": "#281801",
                        "primary-container": "#473100",
                        "surface": "#131313",
                        "secondary-container": "#2f4e4e",
                        "on-error-container": "#ffdad6",
                        "on-secondary-fixed-variant": "#2d4c4c",
                        "on-surface-variant": "#c1c8c7",
                        "on-primary-container": "#bd9852",
                        "surface-variant": "#353534",
                        "on-primary-fixed-variant": "#5d4201"
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glow-teal {
            box-shadow: 0 0 15px -2px rgba(171, 205, 204, 0.4);
        }
        .status-tab {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(229, 226, 225, 0.7);
        }
        .status-tab:hover {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="bg-background text-on-background font-body selection:bg-primary/30">
    <!-- SideNavBar (Authority: Shared Components JSON) -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 bg-[#0e0e0e] shadow-[16px_0_40px_-4px_rgba(0,0,0,0.5)] flex flex-col py-6 z-50">
        <div class="px-6 mb-8">
            <h1 class="text-xl font-bold text-[#e9c176] font-headline tracking-tight">Aji L3bo</h1>
            <p class="text-xs text-secondary-fixed-dim/60 font-medium">Admin Console</p>
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
            <!-- Active Sessions (ACTIVE STATE LOGIC applied here) -->
            <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center gap-3 scale-98 transition-transform shadow-lg shadow-primary/20"
                href="<?= BASE_URL ?>/admin/sessions">
                <span class="material-symbols-outlined" data-icon="timer"
                    style="font-variation-settings: 'FILL' 1;">timer</span>
                <span class="text-sm">Active Sessions</span>
            </a>
            <!-- History -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= BASE_URL ?>/admin/sessions/history">
                <span class="material-symbols-outlined" data-icon="history">history</span>
                <span class="font-medium text-sm">History</span>
            </a>
        </nav>
        <div class="px-4 mt-auto">
            <div class="space-y-1 mb-4">
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
            <div class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-surface-container/50">
                <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">person</span>
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold truncate"><?= $_SESSION['user_name'] ?? 'Admin' ?></p>
                    <p class="text-[10px] text-secondary/60 truncate">Administrator</p>
                </div>
            </div>
        </div>
    </aside>
    <!-- Main Content Canvas -->
    <main class="ml-64 min-h-screen p-8 bg-background">
        <!-- Top Bar Area -->
        <header class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-5xl font-extrabold font-headline tracking-tighter text-on-surface">Active Sessions</h2>
                <p class="text-secondary mt-2 font-medium">Real-time table management and telemetry</p>
            </div>
            <div class="flex gap-4">
                <div class="bg-surface-container px-6 py-3 rounded-xl flex items-center gap-6">
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase tracking-widest text-secondary/60 font-bold">Occupancy</span>
                        <span class="text-xl font-headline font-bold text-primary">14/20</span>
                    </div>
                    <div class="w-[1px] h-8 bg-white/5"></div>
                    <div class="flex flex-col">
                        <span
                            class="text-[10px] uppercase tracking-widest text-secondary/60 font-bold">Revenue/hr</span>
                        <span class="text-xl font-headline font-bold text-primary">$182.50</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Status Tabs -->
        <?php 
        $activeSessions = $activeSessions ?? [];
        $todayReservations = $todayReservations ?? [];
        $tables = $tables ?? [];
        
        $sessionByTable = [];
        foreach ($activeSessions as $session) {
            $sessionByTable[$session['table_id']] = $session;
        }
        
        $reservationsByTable = [];
        foreach ($todayReservations as $res) {
            $tableId = $res['table_id'];
            if (!isset($reservationsByTable[$tableId])) {
                $reservationsByTable[$tableId] = [];
            }
            $reservationsByTable[$tableId][] = $res;
        }
        
        $activeCount = 0;
        $bookedCount = 0;
        $freeCount = 0;
        foreach ($tables as $t) {
            $tid = $t['id'];
            $session = $sessionByTable[$tid] ?? null;
            $reservations = $reservationsByTable[$tid] ?? [];
            if ($session !== null) {
                $activeCount++;
            } elseif (!empty($reservations)) {
                $bookedCount++;
            } else {
                $freeCount++;
            }
        }
        ?>
        <div class="flex items-center gap-2 mb-8 overflow-x-auto pb-2">
            <button onclick="filterTables('active')" class="status-tab active flex items-center gap-2 px-6 py-3 rounded-full font-bold text-sm transition-all whitespace-nowrap" data-status="active">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">radio_button_checked</span>
                Occupied
                <span class="px-2 py-0.5 rounded-full text-xs bg-secondary/20 text-secondary"><?= $activeCount ?></span>
            </button>
            <button onclick="filterTables('booked')" class="status-tab flex items-center gap-2 px-6 py-3 rounded-full font-bold text-sm transition-all whitespace-nowrap" data-status="booked">
                <span class="material-symbols-outlined text-lg">event_busy</span>
                Booked
                <span class="px-2 py-0.5 rounded-full text-xs bg-primary/20 text-primary"><?= $bookedCount ?></span>
            </button>
            <button onclick="filterTables('free')" class="status-tab flex items-center gap-2 px-6 py-3 rounded-full font-bold text-sm transition-all whitespace-nowrap" data-status="free">
                <span class="material-symbols-outlined text-lg">weekend</span>
                Free
                <span class="px-2 py-0.5 rounded-full text-xs bg-green-500/20 text-green-400"><?= $freeCount ?></span>
            </button>
        </div>

        <!-- Session Grid -->
        <div id="tables-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">
            <?php 
            $tables = $tables ?? [];
            $activeSessions = $activeSessions ?? [];
            $todayReservations = $todayReservations ?? [];
            
            function isGameAvailableForReservation($game, $reservation, $allReservations) {
                if ($game['status'] !== 'available') {
                    return false;
                }
                $gameId = $game['id'];
                $resStart = $reservation['start_time'];
                $resEnd = $reservation['end_time'];
                
                foreach ($allReservations as $res) {
                    if ($res['game_id'] == $gameId && $res['id'] != $reservation['id']) {
                        $otherStart = $res['start_time'];
                        $otherEnd = $res['end_time'];
                        if (!($resEnd <= $otherStart || $resStart >= $otherEnd)) {
                            return false;
                        }
                    }
                }
                return true;
            }
            
            // Index active sessions by table_id (already defined above)
            
            // Group reservations by table (already defined above)
            
            foreach ($tables as $table): 
                $tableId = $table['id'];
                $tableRef = $table['reference'];
                $session = $sessionByTable[$tableId] ?? null;
                $reservations = $reservationsByTable[$tableId] ?? [];
                
                // Find the NEXT reservation for this table (active session takes priority)
                $reservation = null;
                if (!empty($reservations)) {
                    // Sort by start time
                    usort($reservations, function($a, $b) {
                        return strtotime($a['start_time']) - strtotime($b['start_time']);
                    });
                    
                    foreach ($reservations as $res) {
                        // If there's an active session for this reservation, show it
                        if ($session !== null && $res['id'] === $session['reservation_id']) {
                            $reservation = $res;
                            break;
                        }
                        
                        // Show FIRST reservation if no active session
                        if ($session === null && $reservation === null) {
                            $reservation = $res;
                            break;
                        }
                    }
                }
                
                // Determine status
                $status = 'free';
                if ($session !== null) {
                    $status = 'active';
                } elseif ($reservation !== null) {
                    $status = 'booked';
                }
            ?>
            
            <?php if ($status === 'active'): ?>
            <!-- Active Session Card - Modern Glassmorphism -->
            <div class="table-card relative group" data-status="<?= $status ?>">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-secondary/50 via-[#7dd3d2]/50 to-secondary/50 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-500"></div>
                <div class="relative bg-[#0d1a1a]/90 backdrop-blur-xl rounded-2xl p-5 border border-white/5">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-secondary/20 to-secondary/5 flex items-center justify-center">
                                <span class="text-3xl font-black font-headline text-primary"><?= str_replace('Table ', '', $tableRef) ?></span>
                            </div>
                            <div>
                                <p class="text-[10px] text-secondary/40 uppercase tracking-widest font-semibold"><?= $table['capacity'] ?? 0 ?> seats</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 bg-secondary/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-secondary/20">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                            </span>
                            <span class="text-[10px] font-bold text-secondary uppercase tracking-wider">Live</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white/[0.02] border border-white/5 mb-4">
                        <?php if (!empty($session['game_name'])): ?>
                        <img class="w-12 h-12 rounded-xl object-cover shadow-lg" src="<?= $session['game_image'] ?? '' ?>">
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-sm text-on-surface truncate"><?= $session['game_name'] ?? '' ?></h4>
                            <p class="text-xs text-secondary/60 truncate"><?= $session['customer_name'] ?? '' ?></p>
                        </div>
                        <?php else: ?>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-sm text-secondary/60">No Game Selected</h4>
                            <p class="text-xs text-secondary/60 truncate"><?= $session['customer_name'] ?? '' ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 rounded-xl bg-gradient-to-r from-secondary/10 via-secondary/5 to-transparent border border-secondary/10 mb-4">
                        <div>
                            <p class="text-[10px] text-secondary/40 uppercase tracking-wider font-semibold mb-1">Remaining</p>
                            <p class="text-2xl font-black font-mono tabular-nums text-secondary" id="timer-<?= $session['id'] ?>">--:--</p>
                        </div>
                        <div class="w-11 h-11 rounded-full bg-secondary/10 border border-secondary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-lg animate-spin" style="animation-duration: 3s;">progress_activity</span>
                        </div>
                    </div>
                    
                    <!-- Price Display -->
                    <div class="flex items-center justify-between p-3 rounded-xl bg-primary/10 border border-primary/20 mb-4">
                        <div>
                            <p class="text-[10px] text-primary/60 uppercase tracking-wider font-semibold">Total Price</p>
                            <p class="text-xl font-black text-primary"><?= number_format($session['total_price'] ?? 0, 2) ?> DH</p>
                        </div>
                        <span class="material-symbols-outlined text-primary text-xl">payments</span>
                    </div>
                    
                    <!-- Game Selector Form -->
                    <form method="POST" action="<?= BASE_URL ?>/admin/sessions/changeGame" class="mb-3">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="session_id" value="<?= $session['id'] ?? 0 ?>">
                        <label class="text-[10px] text-secondary/60 uppercase tracking-wider font-semibold mb-2 block">Change Game</label>
                        <div class="flex gap-2">
                            <div class="relative flex-1">
                                <select name="game_id" class="w-full appearance-none bg-[#1a2a2a] border border-secondary/30 rounded-xl px-4 py-3 pr-10 text-sm text-on-surface focus:ring-2 focus:ring-secondary/40 cursor-pointer hover:bg-[#1f3535] transition-all">
                                    <option value="">Choose a game...</option>
                                    <?php foreach ($availableGames as $game): ?>
                                    <?php if ($game['status'] === 'available' || $game['id'] === ($session['game_id'] ?? null)): ?>
                                    <option value="<?= $game['id'] ?>" <?= ($game['id'] === ($session['game_id'] ?? null)) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($game['name']) ?> - <?= number_format($game['price'], 2) ?> DH
                                    </option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-secondary/60 text-lg pointer-events-none">expand_more</span>
                            </div>
                            <button type="submit" class="px-5 py-3 bg-secondary/20 hover:bg-secondary/30 border border-secondary/40 text-secondary rounded-xl text-sm font-bold flex items-center gap-2 transition-all hover:scale-105 active:scale-95">
                                <span class="material-symbols-outlined text-lg">sync</span>
                                Change
                            </button>
                        </div>
                    </form>
                    
                    <!-- Session Games History -->
                    <?php if (!empty($session['session_games'])): ?>
                    <div class="mb-4">
                        <p class="text-[10px] text-secondary/40 uppercase tracking-wider font-semibold mb-2">Games Played</p>
                        <div class="flex flex-wrap gap-1">
                            <?php foreach ($session['session_games'] as $sg): ?>
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] <?= $sg['is_active'] ? 'bg-secondary/20 text-secondary' : 'bg-white/5 text-secondary/40' ?>">
                                <?= htmlspecialchars($sg['game_name'] ?? 'Unknown') ?>
                                <?php if (!$sg['is_active']): ?>
                                <span class="material-symbols-outlined text-xs">check</span>
                                <?php endif; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="<?= BASE_URL ?>/admin/sessions/end">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="id" value="<?= $session['id'] ?? 0 ?>">
                        <button type="submit" class="w-full py-3 rounded-xl bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 font-semibold text-sm flex items-center justify-center gap-2 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                            <span class="material-symbols-outlined text-lg">stop</span>
                            End Session
                        </button>
                    </form>
                </div>
            </div>
            
            <?php elseif ($status === 'booked'): ?>
            <!-- Booked Card - Has Reservation -->
            <div class="table-card relative group" data-status="<?= $status ?>">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-primary/50 via-amber-400/50 to-primary/50 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-500"></div>
                <div class="relative bg-[#1a1508]/95 backdrop-blur-xl rounded-2xl p-5 border border-primary/20">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-yellow-500/20 to-yellow-500/5 flex items-center justify-center">
                                <span class="text-3xl font-black font-headline text-primary"><?= str_replace('Table ', '', $tableRef) ?></span>
                            </div>
                            <div>
                                <p class="text-[10px] text-yellow-400/50 uppercase tracking-widest font-semibold"><?= $table['capacity'] ?? 0 ?> seats</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 bg-yellow-500/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-yellow-500/30">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-400"></span>
                            </span>
                            <span class="text-[10px] font-bold text-yellow-400 uppercase tracking-wider">Ready</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white/[0.02] border border-white/5 mb-4">
                        <?php if (!empty($reservation['game_name'])): ?>
                        <img class="w-12 h-12 rounded-xl object-cover shadow-lg ring-2 ring-yellow-500/20" src="<?= $reservation['game_image'] ?? '' ?>">
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-sm text-on-surface truncate"><?= $reservation['game_name'] ?? '' ?></h4>
                            <p class="text-xs text-yellow-400/60 truncate"><?= $reservation['customer_name'] ?? '' ?></p>
                        </div>
                        <?php else: ?>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-sm text-yellow-400/60">No Game Selected</h4>
                            <p class="text-xs text-yellow-400/60 truncate"><?= $reservation['customer_name'] ?? '' ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Game Selector for Start -->
                    <form method="POST" action="<?= BASE_URL ?>/admin/sessions/start" class="mb-4">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="reservation_id" value="<?= $reservation['id'] ?? '' ?>">
                        <div class="mb-4">
                            <label class="text-[10px] text-yellow-400/60 uppercase tracking-wider font-semibold mb-2 flex items-center gap-1 block">
                                <span class="material-symbols-outlined text-sm">sports_esports</span>
                                Select Game
                            </label>
                            <div class="relative">
                                <select name="game_id" class="w-full appearance-none bg-[#2a2010] border border-yellow-500/30 rounded-xl px-4 py-3 pr-10 text-sm text-on-surface focus:ring-2 focus:ring-yellow-500/40 cursor-pointer hover:bg-[#352515] transition-all">
                                    <option value="">Choose a game to start...</option>
                                    <?php foreach ($availableGames as $game): ?>
                                    <?php if (isGameAvailableForReservation($game, $reservation, $todayReservations)): ?>
                                    <option value="<?= $game['id'] ?>" <?= ($game['id'] === ($reservation['game_id'] ?? null)) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($game['name']) ?> - <?= number_format($game['price'], 2) ?> DH
                                    </option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-yellow-400/60 text-lg pointer-events-none">expand_more</span>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3 p-3 rounded-xl bg-yellow-500/5 border border-yellow-500/10 mb-4">
                            <div class="text-center">
                                <p class="text-[10px] text-yellow-400/50 uppercase tracking-wider font-semibold flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-xs">schedule</span>
                                    Starts
                                </p>
                                <p class="text-lg font-black text-yellow-400"><?= date('H:i', strtotime($reservation['start_time'])) ?></p>
                            </div>
                            <div class="text-center border-l border-yellow-500/10">
                                <p class="text-[10px] text-yellow-400/50 uppercase tracking-wider font-semibold flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-xs">hourglass_empty</span>
                                    Duration
                                </p>
                                <p class="text-lg font-black text-yellow-400"><?= $reservation['planned_duration'] ?? 60 ?><span class="text-xs">min</span></p>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-yellow-500 to-amber-400 hover:from-amber-400 hover:to-yellow-500 text-[#1a1200] font-bold text-sm shadow-lg shadow-yellow-500/20 flex items-center justify-center gap-2 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                            <span class="material-symbols-outlined text-lg">play_arrow</span>
                            Start Session
                        </button>
                    </form>
                </div>
            </div>
            
            <?php elseif ($status === 'free'): ?>
            <!-- Free Card - Empty -->
            <div class="table-card relative group" data-status="free">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-white/5 via-white/10 to-white/5 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
                <div class="relative bg-[#0a0a0a]/50 backdrop-blur-xl rounded-2xl p-5 border-2 border-dashed border-white/5 hover:border-white/10 transition-all duration-300 group-hover:bg-[#0f0f0f]/70">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 rounded-2xl bg-white/[0.02] border border-white/5 flex items-center justify-center">
                                <span class="text-3xl font-black font-headline text-on-surface-variant/15"><?= str_replace('Table ', '', $tableRef) ?></span>
                            </div>
                            <div>
                                <p class="text-[10px] text-on-surface-variant/25 uppercase tracking-widest font-semibold"><?= $table['capacity'] ?? 0 ?> seats</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="h-28 flex flex-col items-center justify-center mb-4">
                        <div class="w-12 h-12 rounded-xl bg-white/[0.03] flex items-center justify-center mb-3 group-hover:bg-primary/5 group-hover:scale-110 transition-all duration-300">
                            <span class="material-symbols-outlined text-2xl text-on-surface-variant/15 group-hover:text-primary/40 transition-colors">weekend</span>
                        </div>
                        <p class="text-xs text-on-surface-variant/25 font-medium">Available</p>
                    </div>
                    
                    <a href="<?= BASE_URL ?>/admin/reservations?table=<?= $tableId ?>"
                        class="block w-full py-3 rounded-xl bg-white/[0.03] hover:bg-primary/20 border border-white/5 hover:border-primary/20 text-on-surface-variant/50 hover:text-primary font-semibold text-sm flex items-center justify-center gap-2 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        <span class="material-symbols-outlined text-lg">add</span>
                        Reserve
                    </a>
                </div>
            </div>
            
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <script>
        // Update timers every second
        function updateTimers() {
            document.querySelectorAll('[id^="timer-"]').forEach(timer => {
                const sessionId = timer.id.replace('timer-', '');
                const secondsRemaining = parseInt(timer.dataset.seconds || 0);
                if (secondsRemaining > 0) {
                    const mins = Math.floor(secondsRemaining / 60);
                    const secs = secondsRemaining % 60;
                    timer.textContent = mins.toString().padStart(2, '0') + ':' + secs.toString().padStart(2, '0');
                    timer.dataset.seconds = secondsRemaining - 1;
                } else {
                    timer.textContent = '00:00';
                }
            });
        }
        
        // Initialize timers from server data
        <?php foreach ($activeSessions as $session): ?>
        document.getElementById('timer-<?= $session['id'] ?>').dataset.seconds = <?= max(0, $session['seconds_remaining']) ?>;
        <?php endforeach; ?>
        
        setInterval(updateTimers, 1000);
        updateTimers();
        
        // Table filter functionality
        function filterTables(status) {
            const tabs = document.querySelectorAll('.status-tab');
            tabs.forEach(tab => {
                tab.classList.remove('active', 'bg-secondary/20', 'text-secondary', 'bg-primary/20', 'text-primary', 'bg-green-500/20', 'text-green-400');
                if (tab.dataset.status === 'active') {
                    tab.classList.add('text-secondary');
                } else if (tab.dataset.status === 'booked') {
                    tab.classList.add('text-primary');
                } else if (tab.dataset.status === 'free') {
                    tab.classList.add('text-green-400');
                }
            });
            
            const activeTab = document.querySelector(`.status-tab[data-status="${status}"]`);
            if (activeTab) {
                activeTab.classList.remove('text-secondary', 'text-primary', 'text-green-400');
                activeTab.classList.add('active');
                if (status === 'active') {
                    activeTab.classList.add('bg-secondary/20', 'text-secondary');
                } else if (status === 'booked') {
                    activeTab.classList.add('bg-primary/20', 'text-primary');
                } else if (status === 'free') {
                    activeTab.classList.add('bg-green-500/20', 'text-green-400');
                }
            }
            
            const cards = document.querySelectorAll('.table-card');
            cards.forEach(card => {
                const cardStatus = card.dataset.status;
                if (cardStatus === status) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Initialize filter tabs styling
        document.addEventListener('DOMContentLoaded', function() {
            filterTables('free');
        });
        </script>
        <!-- Floating Quick Action for Admin -->
        <button class="fixed bottom-10 right-10 group">
            <div class="absolute -inset-1 bg-gradient-to-r from-primary/50 to-amber-400/50 rounded-full blur opacity-40 group-hover:opacity-70 transition duration-500"></div>
            <div class="relative w-14 h-14 bg-gradient-to-br from-primary to-amber-400 rounded-full flex items-center justify-center shadow-lg shadow-primary/30 hover:scale-110 active:scale-95 transition-all duration-300">
                <span class="material-symbols-outlined text-2xl text-[#1a1200] font-bold">add</span>
            </div>
        </button>
    </main>
    <!-- Footer Subtle Status Bar -->
    <footer
        class="ml-64 bg-surface-container-lowest/80 backdrop-blur-md px-8 py-3 fixed bottom-0 left-0 right-0 border-t border-white/5 flex justify-between items-center text-[10px] font-bold uppercase tracking-widest text-on-surface-variant/40">
        <div class="flex gap-8">
            <span class="flex items-center gap-2">
                <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div> System Online
            </span>
            <span class="flex items-center gap-2">
                <div class="w-1.5 h-1.5 rounded-full bg-secondary"></div> 5 Active Tables
            </span>
        </div>
        <div>
            Current Server Time: <span class="text-on-surface-variant">21:42:05 UTC</span>
        </div>
    </footer>
</body>

</html>