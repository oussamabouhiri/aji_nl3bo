<?php 

// echo json_encode($reservations);

// die();

?>


<?php date_default_timezone_set('Africa/Casablanca'); ?>
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
            <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center gap-3 shadow-lg shadow-primary/20"
                href="<?= BASE_URL ?>/admin/reservations">
                <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
                <span class="text-sm">Reservations</span>
            </a>
            <!-- Active Sessions -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= BASE_URL ?>/admin/sessions">
                <span class="material-symbols-outlined" data-icon="timer">timer</span>
                <span class="font-medium text-sm">Active Sessions</span>
            </a>
            <!-- History -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= BASE_URL ?>/admin/sessions/history">
                <span class="material-symbols-outlined" data-icon="history">history</span>
                <span class="font-medium text-sm">History</span>
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
                                Time</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10">
                                Table</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10">
                                Pax</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10">
                                Status</th>
                            <th
                                class="px-8 py-4 text-[10px] uppercase tracking-[0.2em] font-black text-secondary border-b border-outline-variant/10 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $listReservations = $reservations ?? [];
                        
                        foreach ($listReservations as $res): 
                            $status = $res['status'] ?? 'pending';
                            $statusColors = [
                                'confirmed' => ['bg' => 'bg-green-400', 'text' => 'text-green-400'],
                                'pending' => ['bg' => 'bg-yellow-400', 'text' => 'text-yellow-400'],
                                'cancelled' => ['bg' => 'bg-error', 'text' => 'text-error'],
                                'completed' => ['bg' => 'bg-secondary', 'text' => 'text-secondary']
                            ];
                            $style = $statusColors[$status] ?? $statusColors['pending'];
                        ?>
                        <tr class="hover:bg-surface-container-highest/30 transition-colors group <?= $status === 'cancelled' ? 'opacity-60' : '' ?>">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full <?= $status === 'confirmed' ? 'brass-gradient' : 'bg-surface-container-highest' ?> flex items-center justify-center text-xs font-black <?= $status === 'confirmed' ? 'text-on-primary' : 'text-on-surface border border-outline-variant/20' ?>">
                                        <?= strtoupper(substr($res['customer_name'] ?? 'CU', 0, 2)) ?>
                                    </div>
                                    <div>
                                        <p class="font-bold text-on-surface"><?= $res['customer_name'] ?></p>
                                        <p class="text-xs text-secondary"><?= $res['phone'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <p class="font-bold text-on-surface"><?= date('H:i', strtotime($res['start_time'])) ?></p>
                            </td>
                            <td class="p-6">
                                <span class="bg-surface-dim px-3 py-1 rounded-full text-xs font-bold border border-outline-variant/10">#<?= $res['table_id'] ?? 1 ?></span>
                            </td>
                            <td class="p-6">
                                <span class="bg-surface-dim px-3 py-1 rounded-full text-xs font-bold border border-outline-variant/10"><?= $res['spots'] ?></span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-2 h-2 rounded-full <?= $style['bg'] ?>"></div>
                                    <span class="text-xs font-bold uppercase <?= $style['text'] ?>"><?= ucfirst($status) ?></span>
                                </div>
                            </td>
                            <td class="p-6 text-right">
                                <div class="flex justify-end gap-1">
                                    <?php if ($status === 'confirmed'): ?>
                                    <a href="<?= BASE_URL ?>/admin/reservations/view/<?= $res['id'] ?>" class="w-8 h-8 rounded-full flex items-center justify-center text-secondary hover:text-primary hover:bg-primary/10 transition-colors" title="View Details">
                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                    </a>
                                    <form method="POST" action="<?= BASE_URL ?>/admin/reservations/start-session/<?= $res['id'] ?>" class="inline">
                                        <button type="submit" class="w-8 h-8 rounded-full flex items-center justify-center bg-green-500/20 text-green-400 hover:bg-green-500/30 transition-colors" title="Start Session">
                                            <span class="material-symbols-outlined text-sm">play_arrow</span>
                                        </button>
                                    </form>
                                    <?php elseif ($status === 'pending'): ?>
                                    <a href="<?= BASE_URL ?>/admin/reservations/view/<?= $res['id'] ?>" class="w-8 h-8 rounded-full flex items-center justify-center text-secondary hover:text-primary hover:bg-primary/10 transition-colors" title="View Details">
                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                    </a>
                                    <form method="POST" action="<?= BASE_URL ?>/admin/reservations/confirm/<?= $res['id'] ?>" class="inline">
                                        <button type="submit" class="w-8 h-8 rounded-full flex items-center justify-center text-secondary hover:text-green-400 hover:bg-green-500/10 transition-colors" title="Confirm">
                                            <span class="material-symbols-outlined text-sm">check</span>
                                        </button>
                                    </form>
                                    <button type="button" onclick="document.getElementById('cancelModal-<?= $res['id'] ?>').showModal()" class="w-8 h-8 rounded-full flex items-center justify-center text-secondary hover:text-error hover:bg-error/10 transition-colors" title="Cancel">
                                        <span class="material-symbols-outlined text-sm">close</span>
                                    </button>
                                    <dialog id="cancelModal-<?= $res['id'] ?>" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50">
                                        <h3 class="text-xl font-bold text-primary mb-4">Cancel Reservation</h3>
                                        <p class="text-secondary mb-6">Cancel reservation for <strong><?= $res['customer_name'] ?></strong>?</p>
                                        <div class="flex justify-end gap-4">
                                            <button onclick="document.getElementById('cancelModal-<?= $res['id'] ?>').close()" class="px-4 py-2 rounded-full text-secondary hover:bg-surface-container">Keep</button>
                                            <form method="POST" action="<?= BASE_URL ?>/admin/reservations/cancel/<?= $res['id'] ?>" class="inline">
                                                <button type="submit" class="px-4 py-2 bg-error text-on-error rounded-full hover:opacity-90">Cancel Reservation</button>
                                            </form>
                                        </div>
                                    </dialog>
                                    <?php elseif ($status === 'cancelled'): ?>
                                    <a href="<?= BASE_URL ?>/admin/reservations/view/<?= $res['id'] ?>" class="w-8 h-8 rounded-full flex items-center justify-center text-secondary hover:text-primary hover:bg-primary/10 transition-colors" title="View Details">
                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                    </a>
                                    <form method="POST" action="<?= BASE_URL ?>/admin/reservations/restore/<?= $res['id'] ?>" class="inline">
                                        <button type="submit" class="w-8 h-8 rounded-full flex items-center justify-center text-secondary hover:text-primary hover:bg-primary/10 transition-colors" title="Restore">
                                            <span class="material-symbols-outlined text-sm">restore</span>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="p-6 bg-surface-container-low border-t border-outline-variant/10 flex justify-between items-center">
                    <p class="text-sm text-secondary">Showing <?= count($listReservations) ?> of <?= $totalReservations ?? 0 ?> reservations</p>
                    <?php if (isset($totalPages) && $totalPages > 1): ?>
                    <div class="flex gap-2">
                        <?php if ($currentPage > 1): ?>
                        <a href="?page=<?= $currentPage - 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant/20 hover:bg-surface-container-highest transition-colors text-secondary">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="w-10 h-10 flex items-center justify-center rounded-lg <?= $i === $currentPage ? 'bg-primary/10 border border-primary/30 text-primary font-bold' : 'border border-outline-variant/20 hover:bg-surface-container-highest transition-colors text-secondary' ?>">
                            <?= $i ?>
                        </a>
                        <?php endfor; ?>
                        <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=<?= $currentPage + 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant/20 hover:bg-surface-container-highest transition-colors text-secondary">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>