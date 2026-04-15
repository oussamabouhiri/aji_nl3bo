<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                        "2xl": "1.5rem",
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

        .glass-panel {
            background: rgba(32, 31, 31, 0.6);
            backdrop-filter: blur(20px);
        }

        .brass-gradient {
            background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%);
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body selection:bg-primary/30">
    <!-- SideNavBar -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 border-r border-[#414848]/15 bg-[#131313] flex flex-col py-8 z-50 shadow-[16px_0_40px_-4px_rgba(0,0,0,0.1)]">
        <div class="px-6 mb-10">
            <h1 class="text-2xl font-black tracking-tight text-[#e9c176] font-manrope">The Tactile Archive</h1>
            <p class="text-secondary text-xs uppercase tracking-widest mt-1 opacity-70">Digital Curator</p>
        </div>
        <nav class="flex-1 space-y-1 px-4">
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] group"
                href="#">
                <span class="material-symbols-outlined text-xl" data-icon="dashboard">dashboard</span>
                <span class="font-medium">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] group"
                href="#">
                <span class="material-symbols-outlined text-xl" data-icon="casino">casino</span>
                <span class="font-medium">Games</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] group"
                href="#">
                <span class="material-symbols-outlined text-xl" data-icon="category">category</span>
                <span class="font-medium">Categories</span>
            </a>
            <!-- Active State: Reservations -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 text-[#e9c176] font-bold border-r-2 border-[#e9c176] bg-gradient-to-r from-[#e9c176]/10 to-transparent"
                href="#">
                <span class="material-symbols-outlined text-xl" data-icon="event_available">event_available</span>
                <span class="font-medium">Reservations</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] group"
                href="#">
                <span class="material-symbols-outlined text-xl" data-icon="timer">timer</span>
                <span class="font-medium">Active Sessions</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] group"
                href="#">
                <span class="material-symbols-outlined text-xl" data-icon="history">history</span>
                <span class="font-medium">History</span>
            </a>
        </nav>
        <div class="px-4 mt-auto">
            <button
                class="w-full brass-gradient text-[#412d00] font-bold py-3 px-4 rounded-full flex items-center justify-center gap-2 shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
                <span class="material-symbols-outlined" data-icon="add">add</span>
                <span>New Reservation</span>
            </button>
        </div>
    </aside>
    <!-- TopNavBar -->
    <header
        class="fixed top-0 right-0 left-64 h-20 border-b border-[#414848]/15 bg-[#131313]/60 backdrop-blur-xl flex justify-between items-center px-12 z-40">
        <div
            class="flex items-center bg-surface-container rounded-full px-4 py-2 w-96 border border-outline-variant/10">
            <span class="material-symbols-outlined text-secondary mr-2" data-icon="search">search</span>
            <input
                class="bg-transparent border-none focus:ring-0 text-sm w-full text-on-surface placeholder:text-outline"
                placeholder="Search reservations..." type="text">
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-4 border-r border-outline-variant/20 pr-6">
                <button class="text-[#abcdcc] hover:bg-[#353534]/40 p-2 rounded-full transition-colors relative">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    <span
                        class="absolute top-2 right-2 w-2 h-2 bg-primary rounded-full shadow-[0_0_8px_#e9c176]"></span>
                </button>
                <button class="text-[#abcdcc] hover:bg-[#353534]/40 p-2 rounded-full transition-colors">
                    <span class="material-symbols-outlined" data-icon="settings">settings</span>
                </button>
                <button class="text-[#abcdcc] hover:bg-[#353534]/40 p-2 rounded-full transition-colors">
                    <span class="material-symbols-outlined" data-icon="help">help</span>
                </button>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-sm font-bold text-on-surface leading-none">Admin User</p>
                    <p class="text-[10px] text-secondary uppercase tracking-tighter mt-1">Digital Curator</p>
                </div>
                <img alt="Admin User" class="w-10 h-10 rounded-full border border-primary/30 object-cover"
                    data-alt="Close-up portrait of a professional man with glasses in a moody dimly lit studio setting"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAuKNJEf3j_KALpy-i_oWvlgRai_qLivxEWpt363RNIV2VaFY3HYnmnNMMdMSplY5z0LUpTiN1tOatvjjca4go2dl8Sak3kjLkfy9qiH9hYu3m1SxhO2o88ykk7UlzLCgQAT2FBoBDM-1LlXplG0U3vYih1U1AOIheiY8KfcCnBMRE7SH0w3jKx-8hAE2pxl8qV_nHc6Dz63TzaKLGutmgxkYkza9Dm9KaAHr162O7ztC7c8lyl_SQiRLpF9-emQ_x3z-Da6qahm_E8">
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="ml-64 pt-20 p-12 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <!-- Page Header Section -->
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-5xl font-extrabold font-headline text-on-surface tracking-tight mb-2">Reservations
                    </h2>
                    <p class="text-secondary font-medium">Manage and monitor guest bookings across all Archive wings.
                    </p>
                </div>
                <div class="flex items-center bg-surface-container rounded-full p-1 border border-outline-variant/15">
                    <button
                        class="px-6 py-2 rounded-full text-sm font-bold bg-primary text-on-primary shadow-lg shadow-primary/10 transition-all">Table
                        View</button>
                    <button
                        class="px-6 py-2 rounded-full text-sm font-bold text-secondary hover:text-on-surface transition-all">Calendar
                        Overview</button>
                </div>
            </div>
            <!-- Bento Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="col-span-1 bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <p class="text-secondary text-xs uppercase font-bold tracking-widest mb-1">Today's Paxs</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-headline font-extrabold text-primary">42</span>
                        <span class="text-xs text-green-400 font-medium">+12% vs yest.</span>
                    </div>
                </div>
                <div class="col-span-1 bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <p class="text-secondary text-xs uppercase font-bold tracking-widest mb-1">Confirmed</p>
                    <span class="text-4xl font-headline font-extrabold text-on-surface">18</span>
                </div>
                <div class="col-span-1 bg-surface-container rounded-2xl p-6 border border-outline-variant/5">
                    <p class="text-secondary text-xs uppercase font-bold tracking-widest mb-1">Pending</p>
                    <span class="text-4xl font-headline font-extrabold text-on-surface">06</span>
                </div>
                <div
                    class="col-span-1 bg-surface-container-highest rounded-2xl p-6 border border-primary/20 relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 brass-gradient opacity-10 rounded-full -mr-16 -mt-16 blur-2xl group-hover:opacity-20 transition-opacity">
                    </div>
                    <p class="text-primary text-xs uppercase font-bold tracking-widest mb-1">Upcoming Peak</p>
                    <span class="text-2xl font-headline font-extrabold text-on-surface">19:30 - 21:00</span>
                    <p class="text-xs text-secondary mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]" data-icon="trending_up">trending_up</span>
                        Fully Booked
                    </p>
                </div>
            </div>
            <!-- Table Section -->
            <div class="bg-surface-container rounded-2xl border border-outline-variant/10 overflow-hidden shadow-2xl">
                <div
                    class="p-6 border-b border-outline-variant/10 flex justify-between items-center bg-surface-container-low">
                    <div class="flex gap-4 items-center">
                        <div
                            class="flex items-center gap-2 px-4 py-2 bg-surface-dim rounded-lg border border-outline-variant/20">
                            <span class="material-symbols-outlined text-primary text-sm"
                                data-icon="filter_list">filter_list</span>
                            <span class="text-xs font-bold text-on-surface uppercase tracking-wider">Filter</span>
                        </div>
                        <div
                            class="flex items-center gap-2 px-4 py-2 bg-surface-dim rounded-lg border border-outline-variant/20">
                            <span class="material-symbols-outlined text-primary text-sm"
                                data-icon="calendar_today">calendar_today</span>
                            <span class="text-xs font-bold text-on-surface uppercase tracking-wider">Nov 14, 2023</span>
                        </div>
                    </div>
                    <button
                        class="text-secondary hover:text-primary transition-colors flex items-center gap-2 text-sm font-bold">
                        <span class="material-symbols-outlined text-lg" data-icon="download">download</span> Export CSV
                    </button>
                </div>
                <table class="w-full text-left border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-surface-container-low">
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10">
                                Customer Name</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10">
                                Pax</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10">
                                Date / Time</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10">
                                Status</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/5">
                        <?php foreach ($reservations as $res): ?>
                        <tr class="hover:bg-surface-container-highest/30 transition-colors group <?= ($res['status'] ?? '') === 'cancelled' ? 'opacity-60' : '' ?>">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full <?= in_array($res['status'] ?? '', ['confirmed', 'in_lobby']) ? 'brass-gradient' : 'bg-surface-container-highest' ?> flex items-center justify-center text-[10px] font-black <?= in_array($res['status'] ?? '', ['confirmed', 'in_lobby']) ? 'text-on-primary' : 'text-on-surface border border-outline-variant/20' ?>">
                                        <?= strtoupper(substr($res['customer_name'] ?? 'CU', 0, 2)) ?></div>
                                    <div>
                                        <p class="font-bold text-on-surface"><?= $res['customer_name'] ?? 'Customer Name' ?></p>
                                        <p class="text-xs text-secondary"><?= $res['phone'] ?? '+1 (555) 000-0000' ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="bg-surface-dim px-3 py-1 rounded-full text-sm font-medium border border-outline-variant/10"><?= $res['pax'] ?? 2 ?></span>
                            </td>
                            <td class="px-8 py-5">
                                <div>
                                    <p class="text-sm font-bold <?= ($res['status'] ?? '') === 'in_lobby' ? 'text-primary italic' : '' ?>"><?= ($res['status'] ?? '') === 'in_lobby' ? 'In Lobby' : 'Today' ?></p>
                                    <p class="text-xs text-secondary"><?= date('H:i', strtotime($res['reservation_time'] ?? '19:00:00')) ?> PM</p>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-2">
                                    <?php 
                                    $status = $res['status'] ?? 'pending';
                                    $statusColors = [
                                        'confirmed' => 'bg-green-400',
                                        'in_lobby' => 'bg-green-400',
                                        'pending' => 'bg-yellow-400',
                                        'cancelled' => 'bg-error'
                                    ];
                                    $statusTextColors = [
                                        'confirmed' => 'text-green-400/90',
                                        'in_lobby' => 'text-green-400/90',
                                        'pending' => 'text-yellow-400/90',
                                        'cancelled' => 'text-error'
                                    ];
                                    ?>
                                    <div class="w-2 h-2 rounded-full <?= $statusColors[$status] ?? 'bg-yellow-400' ?> shadow-[0_0_8px_rgba(74,222,128,0.5)] <?= $status === 'in_lobby' ? 'animate-pulse' : '' ?>">
                                    </div>
                                    <span class="text-xs font-bold uppercase tracking-wider <?= $statusTextColors[$status] ?? 'text-yellow-400/90' ?>"><?= ucfirst($status) ?></span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-3">
                                    <?php if (in_array($status, ['confirmed', 'in_lobby'])): ?>
                                    <a href="<?= BASE_URL ?>/admin/reservations/edit/<?= $res['id'] ?? 0 ?>" class="text-xs font-black uppercase tracking-widest text-primary hover:underline">Details</a>
                                    <button class="brass-gradient px-4 py-2 rounded-full text-xs font-black text-on-primary uppercase tracking-widest shadow-lg shadow-primary/10">Start Session</button>
                                    <?php elseif ($status === 'pending'): ?>
                                    <form method="POST" action="<?= BASE_URL ?>/admin/reservations/confirm/<?= $res['id'] ?? 0 ?>" class="inline">
                                        <button type="submit" class="px-4 py-2 rounded-full text-xs font-black bg-surface-dim border border-green-500/30 text-green-400 uppercase tracking-widest hover:bg-green-500/10 transition-colors">Confirm</button>
                                    </form>
                                    <button type="button" onclick="document.getElementById('cancelModal-<?= $res['id'] ?? 0 ?>').showModal()" class="px-4 py-2 rounded-full text-xs font-black bg-surface-dim border border-error/30 text-error uppercase tracking-widest hover:bg-error/10 transition-colors">Cancel</button>
                                    <dialog id="cancelModal-<?= $res['id'] ?? 0 ?>" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50">
                                        <h3 class="text-xl font-bold text-primary mb-4">Cancel Reservation</h3>
                                        <p class="text-secondary mb-6">Are you sure you want to cancel this reservation for <?= $res['customer_name'] ?? 'this customer' ?>?</p>
                                        <div class="flex justify-end gap-4">
                                            <button onclick="document.getElementById('cancelModal-<?= $res['id'] ?? 0 ?>').close()" class="px-4 py-2 rounded-full text-secondary hover:bg-surface-container">Keep</button>
                                            <form method="POST" action="<?= BASE_URL ?>/admin/reservations/cancel/<?= $res['id'] ?? 0 ?>" class="inline">
                                                <button type="submit" class="px-4 py-2 bg-error text-on-error rounded-full hover:opacity-90">Cancel Reservation</button>
                                            </form>
                                        </div>
                                    </dialog>
                                    <?php elseif ($status === 'cancelled'): ?>
                                    <form method="POST" action="<?= BASE_URL ?>/admin/reservations/restore/<?= $res['id'] ?? 0 ?>" class="inline">
                                        <button type="submit" class="text-xs font-black uppercase tracking-widest text-secondary hover:text-on-surface">Restore</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div
                    class="p-6 bg-surface-container-low border-t border-outline-variant/10 flex justify-between items-center">
                    <p class="text-xs text-secondary font-medium">Showing 1-<?= count($reservations ?? [1,2,3]) ?> of <?= $totalReservations ?? 42 ?> reservations</p>
                    <div class="flex gap-2">
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant/20 hover:bg-surface-container-highest transition-colors text-secondary">
                            <span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
                        </button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary/10 border border-primary/30 text-primary font-bold">1</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant/20 hover:bg-surface-container-highest transition-colors text-secondary">2</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant/20 hover:bg-surface-container-highest transition-colors text-secondary">3</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant/20 hover:bg-surface-container-highest transition-colors text-secondary">
                            <span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>