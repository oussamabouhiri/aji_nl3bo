<?php
$pageTitle = 'My Reservations - Aji L3bo';
$reservations = $reservations ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        background: '#131313',
                        surface: { DEFAULT: '#1f1f1f', container: '#2a2a2a', dim: '#353534' },
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
                }
            }
        }
    </script>
</head>
<body class="bg-background text-on-surface font-body min-h-screen">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 h-20 bg-background/80 backdrop-blur-xl border-b border-white/5 flex items-center justify-between px-12 z-50">
        <div class="flex items-center gap-12">
            <a href="<?= BASE_URL ?>/" class="text-2xl font-black text-primary font-headline">Aji L3bo</a>
            <div class="flex items-center gap-8">
                <a href="<?= BASE_URL ?>/games" class="text-secondary hover:text-primary transition-colors font-medium">Games</a>
                <a href="<?= BASE_URL ?>/reservation" class="text-secondary hover:text-primary transition-colors font-medium">Reserve</a>
                <a href="<?= BASE_URL ?>/my-reservations" class="text-primary border-b-2 border-primary pb-1 font-medium">My Reservations</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?= BASE_URL ?>/profile" class="text-secondary hover:text-primary transition-colors font-medium">Profile</a>
                <a href="<?= BASE_URL ?>/logout" class="bg-primary text-on-primary px-4 py-2 rounded-full font-bold hover:opacity-90 transition-opacity">Logout</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>/login" class="text-secondary hover:text-primary transition-colors font-medium">Login</a>
                <a href="<?= BASE_URL ?>/register" class="bg-primary text-on-primary px-4 py-2 rounded-full font-bold hover:opacity-90 transition-opacity">Sign Up</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-32 px-12 pb-20 max-w-6xl mx-auto">
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold font-headline text-on-surface mb-2">My Reservations</h1>
            <p class="text-secondary">View and manage your game reservations</p>
        </div>

        <?php if (empty($reservations)): ?>
        <div class="bg-surface-container rounded-2xl p-12 text-center border border-outline-variant/10">
            <div class="w-20 h-20 mx-auto mb-6 bg-primary/10 rounded-full flex items-center justify-center">
                <span class="material-symbols-outlined text-4xl text-primary">event_busy</span>
            </div>
            <h2 class="text-2xl font-bold text-on-surface mb-2">No Reservations Yet</h2>
            <p class="text-secondary mb-6">You haven't made any reservations yet.</p>
            <a href="<?= BASE_URL ?>/reservation" class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-full font-bold hover:opacity-90 transition-opacity">
                <span class="material-symbols-outlined">add</span>
                Make a Reservation
            </a>
        </div>
        <?php else: ?>
        <div class="space-y-4">
            <?php foreach ($reservations as $res): ?>
            <?php
                $status = $res['status'] ?? 'pending';
                $statusColors = [
                    'pending' => ['bg' => 'bg-yellow-500/20', 'text' => 'text-yellow-400', 'border' => 'border-yellow-500/30', 'label' => 'Pending'],
                    'confirmed' => ['bg' => 'bg-green-500/20', 'text' => 'text-green-400', 'border' => 'border-green-500/30', 'label' => 'Confirmed'],
                    'in_progress' => ['bg' => 'bg-blue-500/20', 'text' => 'text-blue-400', 'border' => 'border-blue-500/30', 'label' => 'In Progress'],
                    'completed' => ['bg' => 'bg-secondary/20', 'text' => 'text-secondary', 'border' => 'border-secondary/30', 'label' => 'Completed'],
                    'cancelled' => ['bg' => 'bg-error/20', 'text' => 'text-error', 'border' => 'border-error/30', 'label' => 'Cancelled'],
                ];
                $style = $statusColors[$status] ?? $statusColors['pending'];
            ?>
            <div class="bg-surface-container rounded-2xl p-6 border <?= $style['border'] ?>">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-sm text-secondary uppercase tracking-widest mb-1">Reservation #<?= $res['id'] ?></p>
                        <p class="text-2xl font-bold font-headline text-on-surface"><?= date('M d, Y', strtotime($res['date'])) ?></p>
                    </div>
                    <div class="<?= $style['bg'] ?> <?= $style['text'] ?> px-4 py-2 rounded-full font-bold text-sm">
                        <?= $style['label'] ?>
                    </div>
                </div>
                
                <div class="grid grid-cols-3 gap-6 mb-4">
                    <div class="bg-surface p-4 rounded-xl">
                        <p class="text-xs text-secondary uppercase tracking-wider mb-1">Table</p>
                        <p class="font-bold text-on-surface"><?= $res['table_reference'] ?? 'Table #' . $res['table_id'] ?></p>
                    </div>
                    <div class="bg-surface p-4 rounded-xl">
                        <p class="text-xs text-secondary uppercase tracking-wider mb-1">Time</p>
                        <p class="font-bold text-on-surface"><?= date('H:i', strtotime($res['start_time'])) ?> - <?= date('H:i', strtotime($res['end_time'])) ?></p>
                    </div>
                    <div class="bg-surface p-4 rounded-xl">
                        <p class="text-xs text-secondary uppercase tracking-wider mb-1">Guests</p>
                        <p class="font-bold text-on-surface"><?= $res['spots'] ?? 0 ?> people</p>
                    </div>
                </div>

                <?php if ($status === 'pending' || $status === 'confirmed'): ?>
                <div class="flex justify-end">
                    <form method="POST" action="<?= BASE_URL ?>/reservation/cancel" class="inline">
                        <input type="hidden" name="id" value="<?= $res['id'] ?>">
                        <button type="submit" class="text-error hover:text-error/80 text-sm font-medium transition-colors">
                            Cancel Reservation
                        </button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/5 py-8 px-12 text-center">
        <p class="text-secondary text-sm">&copy; 2026 Aji L3bo. All rights reserved.</p>
    </footer>
</body>
</html>
