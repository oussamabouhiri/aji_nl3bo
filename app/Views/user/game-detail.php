<?php date_default_timezone_set('Africa/Casablanca'); ?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($game['name']) ?> - Aji L3bo</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
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
        .glass-nav { background: rgba(19, 19, 19, 0.8); backdrop-filter: blur(20px); }
        .brass-gradient { background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%); }
    </style>
</head>
<body class="bg-background text-on-surface">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-nav shadow-2xl shadow-black/40">
        <div class="flex justify-between items-center px-8 py-4 max-w-full mx-auto">
            <a href="<?= BASE_URL ?>/" class="text-2xl font-black tracking-tighter text-[#e9c176] font-headline">Aji L3bo</a>
            <div class="hidden md:flex items-center space-x-8">
                <a class="font-body text-[#abcdcc] hover:text-[#e9c176] transition-colors" href="<?= BASE_URL ?>/games">Games</a>
                <a class="font-body text-[#abcdcc] hover:text-[#e9c176] transition-colors" href="<?= BASE_URL ?>/reservation">Reserve</a>
                <a class="font-body text-[#abcdcc] hover:text-[#e9c176] transition-colors" href="<?= BASE_URL ?>/my-reservations">My Reservations</a>
            </div>
            <div class="flex items-center space-x-6">
                <a href="<?= BASE_URL ?>/logout" class="text-sm text-[#c1c8c7] hover:text-[#e9c176] transition-colors">Logout</a>
            </div>
        </div>
    </nav>

    <main class="pt-28 pb-12 px-4 md:px-8 max-w-6xl mx-auto">
        <!-- Back Button -->
        <a href="<?= BASE_URL ?>/games" class="inline-flex items-center gap-2 text-[#abcdcc] hover:text-[#e9c176] transition-colors mb-8">
            <span class="material-symbols-outlined">arrow_back</span>
            Back to Games
        </a>

        <div class="grid md:grid-cols-2 gap-12">
            <!-- Game Image -->
            <div class="relative rounded-3xl overflow-hidden h-[400px] md:h-[500px]">
                <img src="<?= $game['image_url'] ?? 'https://picsum.photos/seed/' . $game['id'] . '/600/500' ?>" 
                     alt="<?= htmlspecialchars($game['name']) ?>" 
                     class="w-full h-full object-cover">
                <div class="absolute top-4 left-4">
                    <span class="bg-primary/90 text-on-primary text-xs font-black uppercase tracking-tighter px-3 py-1 rounded-full backdrop-blur-md">
                        <?= htmlspecialchars($game['category_name'] ?? 'Board Game') ?>
                    </span>
                </div>
                <div class="absolute top-4 right-4">
                    <?php $isAvailable = ($game['status'] ?? 'available') === 'available'; ?>
                    <div class="bg-black/40 backdrop-blur-md flex items-center gap-1 px-3 py-1 rounded-full">
                        <div class="w-2 h-2 rounded-full <?= $isAvailable ? 'bg-green-400' : 'bg-orange-400' ?>"></div>
                        <span class="text-xs font-bold text-white uppercase"><?= $isAvailable ? 'Available' : 'In Use' ?></span>
                    </div>
                </div>
            </div>

            <!-- Game Details -->
            <div>
                <h1 class="font-headline text-4xl md:text-5xl font-extrabold tracking-tight mb-4">
                    <?= htmlspecialchars($game['name']) ?>
                </h1>
                
                <p class="text-[#c1c8c7] text-lg mb-8">
                    <?= htmlspecialchars($game['description'] ?? 'No description available.') ?>
                </p>

                <!-- Game Stats -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-surface-container rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-primary text-2xl">groups</span>
                            <span class="text-[#c1c8c7] text-sm">Players</span>
                        </div>
                        <p class="font-headline text-2xl font-bold"><?= $game['min_players'] ?? 2 ?>-<?= $game['max_players'] ?? 4 ?></p>
                    </div>
                    <div class="bg-surface-container rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-primary text-2xl">timer</span>
                            <span class="text-[#c1c8c7] text-sm">Duration</span>
                        </div>
                        <p class="font-headline text-2xl font-bold"><?= $game['duration'] ?? 60 ?> min</p>
                    </div>
                    <div class="bg-surface-container rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-primary text-2xl">psychology</span>
                            <span class="text-[#c1c8c7] text-sm">Difficulty</span>
                        </div>
                        <p class="font-headline text-2xl font-bold"><?= ucfirst($game['difficulty'] ?? 'medium') ?></p>
                    </div>
                    <div class="bg-surface-container rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-primary text-2xl">inventory_2</span>
                            <span class="text-[#c1c8c7] text-sm">Copies</span>
                        </div>
                        <p class="font-headline text-2xl font-bold"><?= $game['spots'] ?? 1 ?> available</p>
                    </div>
                </div>

                <!-- Price & Reserve -->
                <div class="bg-surface-high rounded-2xl p-6 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#c1c8c7]">Price per session</span>
                        <span class="font-headline text-3xl font-bold text-primary">
                            <?= number_format($game['price'] ?? 0, 2) ?> MAD
                        </span>
                    </div>
                    <a href="<?= BASE_URL ?>/reservation?game_id=<?= $game['id'] ?>" 
                       class="w-full brass-gradient text-on-primary font-bold py-4 rounded-xl flex justify-center items-center gap-2 hover:shadow-[0_0_20px_rgba(233,193,118,0.3)] transition-all">
                        Reserve This Game
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
