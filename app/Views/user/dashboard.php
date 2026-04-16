<?php
$userName = $_SESSION['user_name'] ?? 'User';
$config = require __DIR__ . '/../../../config/app.php';
$baseUrl = $config['base_url'];
?>
<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard | Aji L3bo</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
                        "secondary-container": "#2f4e4e",
                        "tertiary-container": "#453214",
                        "on-background": "#e5e2e1",
                        "on-primary": "#412d00",
                        "inverse-surface": "#e5e2e1",
                        "surface": "#131313",
                        "on-secondary": "#153535",
                        "inverse-on-surface": "#313030",
                        "primary-fixed-dim": "#e9c176",
                        "on-tertiary-fixed-variant": "#584324",
                        "secondary-fixed-dim": "#abcdcc",
                        "secondary": "#abcdcc",
                        "background": "#131313",
                        "tertiary-fixed": "#feddb3",
                        "tertiary": "#e1c299",
                        "surface-container-highest": "#353534",
                        "on-tertiary-container": "#b69a73",
                        "on-error": "#690005",
                        "surface-tint": "#e9c176",
                        "outline-variant": "#414848",
                        "surface-container-low": "#1c1b1b",
                        "secondary-fixed": "#c7e9e8",
                        "outline": "#8b9292",
                        "on-secondary-fixed": "#002020",
                        "surface-container": "#201f1f",
                        "on-tertiary": "#402d10",
                        "surface-variant": "#353534",
                        "on-surface": "#e5e2e1",
                        "surface-dim": "#131313",
                        "error-container": "#93000a",
                        "surface-container-high": "#2a2a2a",
                        "primary": "#e9c176",
                        "on-tertiary-fixed": "#281801",
                        "on-secondary-fixed-variant": "#2d4c4c",
                        "on-secondary-container": "#9dbfbe",
                        "on-primary-container": "#bd9852",
                        "error": "#ffb4ab",
                        "inverse-primary": "#775a19",
                        "primary-container": "#473100",
                        "on-primary-fixed": "#261900",
                        "surface-bright": "#393939",
                        "primary-fixed": "#ffdea5",
                        "on-surface-variant": "#c1c8c7",
                        "on-primary-fixed-variant": "#5d4201",
                        "surface-container-lowest": "#0e0e0e",
                        "on-error-container": "#ffdad6",
                        "tertiary-fixed-dim": "#e1c299"
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
            }
        }
    </script>
    <style>
        html { font-size: 16px; }
        body { font-size: 1rem; font-family: 'Inter', sans-serif; }
        h1, h2, h3, .headline { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .glass-panel { background: rgba(32, 31, 31, 0.6); backdrop-filter: blur(16px); }
        .brass-gradient { background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%); }
    </style>
</head>

<body class="bg-background text-on-surface">
    <aside class="h-screen w-64 fixed left-0 top-0 bg-[#0e0e0e] flex flex-col py-6 shadow-[16px_0_40px_-4px_rgba(0,0,0,0.5)] z-50">
        <div class="px-8">
            <div class="text-xl font-bold text-[#e9c176] mb-8">Aji L3bo</div>
            <div class="flex items-center space-x-3 mb-10">
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-[#412d00] font-bold">
                    <?= strtoupper(substr($userName, 0, 1)) ?>
                </div>
                <div>
                    <p class="text-on-surface font-headline font-bold text-sm leading-none"><?= htmlspecialchars($userName) ?></p>
                    <p class="text-secondary text-xs mt-1">Member</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 space-y-1">
            <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center space-x-3" href="<?= $baseUrl ?>/dashboard">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-label">Dashboard</span>
            </a>
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>/games">
                <span class="material-symbols-outlined">sports_esports</span>
                <span class="font-label">Games</span>
            </a>
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>/reservation">
                <span class="material-symbols-outlined">event_available</span>
                <span class="font-label">Reservations</span>
            </a>
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>/profile">
                <span class="material-symbols-outlined">person</span>
                <span class="font-label">Profile</span>
            </a>
        </nav>
        <div class="px-4 mt-auto pt-6 space-y-1">
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>/logout">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-label">Logout</span>
            </a>
        </div>
    </aside>

    <main class="ml-64 p-10 min-h-screen">
        <header class="flex justify-between items-end mb-12">
            <div>
                <h1 class="text-5xl font-extrabold tracking-tighter text-on-surface mb-2">Welcome, <?= htmlspecialchars($userName) ?></h1>
                <p class="text-secondary font-medium italic">Your Gaming Dashboard</p>
            </div>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-surface-container p-8 rounded-xl shadow-2xl relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-outline-variant font-label text-sm uppercase tracking-widest mb-4">Your Reservations</p>
                    <h3 class="text-5xl font-headline font-extrabold text-on-surface">0</h3>
                    <div class="mt-4 flex items-center text-primary text-sm font-semibold">
                        <span>No upcoming sessions</span>
                    </div>
                </div>
                <span class="material-symbols-outlined absolute -bottom-4 -right-4 text-primary/10 text-9xl">event</span>
            </div>
            <div class="bg-surface-container-high p-8 rounded-xl shadow-2xl relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-outline-variant font-label text-sm uppercase tracking-widest mb-4">Available Games</p>
                    <h3 class="text-5xl font-headline font-extrabold text-on-surface">12</h3>
                    <div class="mt-4 flex items-center text-secondary text-sm font-semibold">
                        <span>Ready to play</span>
                    </div>
                </div>
                <span class="material-symbols-outlined absolute -bottom-4 -right-4 text-secondary/10 text-9xl">sports_esports</span>
            </div>
            <div class="bg-surface-container p-8 rounded-xl shadow-2xl relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-outline-variant font-label text-sm uppercase tracking-widest mb-4">Total Sessions</p>
                    <h3 class="text-5xl font-headline font-extrabold text-on-surface">0</h3>
                    <div class="mt-4 flex items-center text-tertiary text-sm font-semibold">
                        <span>Start your first game</span>
                    </div>
                </div>
                <span class="material-symbols-outlined absolute -bottom-4 -right-4 text-tertiary/10 text-9xl">timer</span>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="space-y-6">
                <h2 class="text-2xl font-headline font-extrabold tracking-tight">Quick Actions</h2>
                <div class="grid grid-cols-2 gap-4">
                    <a href="<?= $baseUrl ?>games" class="bg-surface-container p-6 rounded-xl hover:bg-surface-container-high transition-colors">
                        <span class="material-symbols-outlined text-primary text-3xl mb-2">sports_esports</span>
                        <p class="font-bold">Browse Games</p>
                    </a>
                    <a href="<?= $baseUrl ?>reservation" class="bg-surface-container p-6 rounded-xl hover:bg-surface-container-high transition-colors">
                        <span class="material-symbols-outlined text-primary text-3xl mb-2">event_available</span>
                        <p class="font-bold">Make Reservation</p>
                    </a>
                </div>
            </div>
            <div class="space-y-6">
                <h2 class="text-2xl font-headline font-extrabold tracking-tight">Your Profile</h2>
                <div class="bg-surface-container p-6 rounded-xl">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center text-[#412d00] text-2xl font-bold">
                            <?= strtoupper(substr($userName, 0, 1)) ?>
                        </div>
                        <div>
                            <p class="text-xl font-bold"><?= htmlspecialchars($userName) ?></p>
                            <p class="text-secondary text-sm">Member since now</p>
                        </div>
                    </div>
                    <a href="<?= $baseUrl ?>profile" class="text-primary font-bold text-sm hover:underline">Edit Profile</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>