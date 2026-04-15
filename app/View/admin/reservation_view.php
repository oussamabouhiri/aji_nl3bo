<?php date_default_timezone_set('Africa/Casablanca'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details - Aji L3bo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: '#1a1a1a',
                        surface: { DEFAULT: '#242424', container: '#2d2d2d', dim: '#3d3d3d', bright: '#4a4a4a', highest: '#5a5a5a', lowest: '#1f1f1f' },
                        primary: '#e9c176',
                        secondary: '#abcdcc',
                        error: '#ffb4ab',
                        'on-primary': '#412d00',
                        'on-surface': '#ffffff',
                        'on-surface-variant': '#b0b0b0',
                        'outline-variant': 'rgba(255,255,255,0.08)',
                    },
                    fontFamily: {
                        headline: ['Playfair Display', 'serif'],
                        manrope: ['Manrope', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .brass-gradient { background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%); }
        .glow-teal { box-shadow: inset 0 2px 0 rgba(171,205,204,0.3); }
        .glow-orb { box-shadow: 0 0 12px rgba(74,222,128,0.5); }
    </style>
</head>
<body class="bg-background min-h-screen">
    <main class="ml-64 min-h-screen p-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="<?= BASE_URL ?>/admin/reservations" class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-secondary hover:text-primary hover:bg-surface-container-high transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <span class="text-secondary/40">Reservations</span>
            </div>
            <h1 class="text-4xl font-extrabold font-headline text-on-surface">Reservation #<?= $reservation['id'] ?? '0' ?></h1>
            <p class="text-secondary mt-2">View and manage this reservation</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Customer Card -->
                <div class="bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <h2 class="text-lg font-bold text-primary mb-4">Customer Information</h2>
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full brass-gradient flex items-center justify-center text-xl font-black text-on-primary">
                            <?= strtoupper(substr($reservation['customer_name'] ?? 'CU', 0, 2)) ?>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-on-surface"><?= $reservation['customer_name'] ?? 'Customer' ?></p>
                            <p class="text-secondary"><?= $reservation['phone'] ?? $reservation['email'] ?? 'No contact' ?></p>
                        </div>
                    </div>
                </div>

                <!-- Reservation Details -->
                <div class="bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <h2 class="text-lg font-bold text-primary mb-4">Reservation Details</h2>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-surface-dim rounded-xl p-4">
                            <p class="text-[10px] text-secondary uppercase tracking-widest mb-2">Date</p>
                            <p class="text-xl font-bold text-on-surface"><?= date('M d, Y', strtotime($reservation['date'] ?? 'today')) ?></p>
                        </div>
                        <div class="bg-surface-dim rounded-xl p-4">
                            <p class="text-[10px] text-secondary uppercase tracking-widest mb-2">Time</p>
                            <p class="text-xl font-bold text-on-surface"><?= date('H:i', strtotime($reservation['start_time'] ?? '00:00')) ?> - <?= date('H:i', strtotime($reservation['end_time'] ?? '00:00')) ?></p>
                        </div>
                        <div class="bg-surface-dim rounded-xl p-4">
                            <p class="text-[10px] text-secondary uppercase tracking-widest mb-2">Table</p>
                            <p class="text-xl font-bold text-on-surface"><?= $reservation['table_reference'] ?? '#' . $reservation['table_id'] ?? 'N/A' ?></p>
                        </div>
                        <div class="bg-surface-dim rounded-xl p-4">
                            <p class="text-[10px] text-secondary uppercase tracking-widest mb-2">Guests (Pax)</p>
                            <p class="text-xl font-bold text-on-surface"><?= $reservation['spots'] ?? 0 ?> people</p>
                        </div>
                    </div>
                </div>

                <!-- Status Card -->
                <div class="bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <h2 class="text-lg font-bold text-primary mb-4">Status</h2>
                    <div class="flex items-center gap-4">
                        <?php
                        $status = $reservation['status'] ?? 'pending';
                        $statusColors = [
                            'confirmed' => ['bg' => 'bg-green-400', 'text' => 'text-green-400', 'label' => 'Confirmed'],
                            'pending' => ['bg' => 'bg-yellow-400', 'text' => 'text-yellow-400', 'label' => 'Pending'],
                            'cancelled' => ['bg' => 'bg-error', 'text' => 'text-error', 'label' => 'Cancelled'],
                            'completed' => ['bg' => 'bg-secondary', 'text' => 'text-secondary', 'label' => 'Completed']
                        ];
                        $style = $statusColors[$status] ?? $statusColors['pending'];
                        ?>
                        <div class="w-4 h-4 rounded-full <?= $style['bg'] ?>"></div>
                        <span class="text-xl font-bold uppercase <?= $style['text'] ?>"><?= $style['label'] ?></span>
                    </div>
                </div>
            </div>

            <!-- Actions Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <h2 class="text-lg font-bold text-primary mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <?php if ($status === 'pending'): ?>
                        <form method="POST" action="<?= BASE_URL ?>/admin/reservations/confirm">
                            <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                            <button type="submit" class="w-full bg-green-500/20 hover:bg-green-500/30 text-green-400 font-bold py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">check_circle</span>
                                Confirm Reservation
                            </button>
                        </form>
                        <button type="button" onclick="document.getElementById('cancelModal').showModal()" class="w-full bg-error/20 hover:bg-error/30 text-error font-bold py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined">cancel</span>
                            Cancel Reservation
                        </button>
                        <?php elseif ($status === 'confirmed'): ?>
                        <form method="POST" action="<?= BASE_URL ?>/admin/reservations/start-session/<?= $reservation['id'] ?>">
                            <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                            <button type="submit" class="w-full brass-gradient text-on-primary font-bold py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">play_arrow</span>
                                Start Session
                            </button>
                        </form>
                        <button type="button" onclick="document.getElementById('cancelModal').showModal()" class="w-full bg-error/20 hover:bg-error/30 text-error font-bold py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined">cancel</span>
                            Cancel Reservation
                        </button>
                        <?php elseif ($status === 'cancelled'): ?>
                        <form method="POST" action="<?= BASE_URL ?>/admin/reservations/restore">
                            <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                            <button type="submit" class="w-full bg-primary/20 hover:bg-primary/30 text-primary font-bold py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">restore</span>
                                Restore Reservation
                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Table Info -->
                <div class="bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <h2 class="text-lg font-bold text-primary mb-4">Table Information</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-secondary">Table</span>
                            <span class="font-bold text-on-surface"><?= $reservation['table_reference'] ?? '#' . $reservation['table_id'] ?? 'N/A' ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-secondary">Capacity</span>
                            <span class="font-bold text-on-surface"><?= $reservation['table_capacity'] ?? 'N/A' ?> seats</span>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="bg-surface-container rounded-2xl p-6 border border-error/20">
                    <h2 class="text-lg font-bold text-error mb-4">Danger Zone</h2>
                    <button type="button" onclick="document.getElementById('deleteModal').showModal()" class="w-full bg-error/20 hover:bg-error/30 text-error font-bold py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">delete</span>
                        Delete Reservation
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Cancel Modal -->
    <dialog id="cancelModal" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50 w-full max-w-md">
        <h3 class="text-xl font-bold text-primary mb-4">Cancel Reservation</h3>
        <p class="text-secondary mb-6">Are you sure you want to cancel this reservation for <strong><?= $reservation['customer_name'] ?? 'this customer' ?></strong>?</p>
        <div class="flex justify-end gap-4">
            <button onclick="document.getElementById('cancelModal').close()" class="px-6 py-2 rounded-full text-secondary hover:bg-surface-container">Keep</button>
            <form method="POST" action="<?= BASE_URL ?>/admin/reservations/cancel" class="inline">
                <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                <button type="submit" class="px-6 py-2 bg-error text-on-error rounded-full hover:opacity-90">Cancel Reservation</button>
            </form>
        </div>
    </dialog>

    <!-- Delete Modal -->
    <dialog id="deleteModal" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50 w-full max-w-md">
        <h3 class="text-xl font-bold text-error mb-4">Delete Reservation</h3>
        <p class="text-secondary mb-6">This action cannot be undone. Are you sure you want to delete this reservation?</p>
        <div class="flex justify-end gap-4">
            <button onclick="document.getElementById('deleteModal').close()" class="px-6 py-2 rounded-full text-secondary hover:bg-surface-container">Keep</button>
            <form method="POST" action="<?= BASE_URL ?>/admin/reservations/delete" class="inline">
                <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                <button type="submit" class="px-6 py-2 bg-error text-on-error rounded-full hover:opacity-90">Delete</button>
            </form>
        </div>
    </dialog>
</body>
</html>
