<?php
$baseUrl = \App\Helper\Utility::baseUrl();
?><!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>The Tactile Archive | Games Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(32, 31, 31, 0.6);
            backdrop-filter: blur(20px);
        }

        .brass-gradient {
            background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: none;
        }

        select option {
            background-color: #201f1f;
            color: #e5e2e1;
            padding: 12px;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #131313;
        }

        ::-webkit-scrollbar-thumb {
            background: #414848;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body selection:bg-primary/30">
    <!-- SideNavBar Anchor -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 border-r border-[#414848]/15 bg-[#131313] flex flex-col py-8 z-50 shadow-[16px_0_40px_-4px_rgba(0,0,0,0.1)]">
        <div class="px-8 mb-12">
            <h1 class="text-2xl font-black tracking-tight text-[#e9c176] font-headline">The Tactile Archive</h1>
            <p class="text-[10px] uppercase tracking-[0.2em] text-secondary/50 mt-1">Digital Curator</p>
        </div>
        <nav class="flex-1 space-y-2 px-4">
            <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] transition-all duration-300 ease-out rounded-xl group"
                href="<?= $baseUrl ?>admin/dashboard">
                <span class="material-symbols-outlined text-xl">dashboard</span>
                <span class="font-medium">Dashboard</span>
            </a>
            <!-- Active State: Games -->
            <a class="flex items-center gap-3 px-4 py-3 text-[#e9c176] font-bold border-r-2 border-[#e9c176] bg-gradient-to-r from-[#e9c176]/10 to-transparent transition-all duration-300 ease-out rounded-l-xl"
                href="<?= $baseUrl ?>admin/games">
                <span class="material-symbols-outlined text-xl">casino</span>
                <span class="font-medium">Games</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] transition-all duration-300 ease-out rounded-xl group"
                href="<?= $baseUrl ?>categories">
                <span class="material-symbols-outlined text-xl">category</span>
                <span class="font-medium">Categories</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] transition-all duration-300 ease-out rounded-xl group"
                href="<?= $baseUrl ?>admin/reservations">
                <span class="material-symbols-outlined text-xl">event_available</span>
                <span class="font-medium">Reservations</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] transition-all duration-300 ease-out rounded-xl group"
                href="<?= $baseUrl ?>admin/sessions">
                <span class="material-symbols-outlined text-xl">timer</span>
                <span class="font-medium">Active Sessions</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] transition-all duration-300 ease-out rounded-xl group"
                href="<?= $baseUrl ?>admin/session-history">
                <span class="material-symbols-outlined text-xl">history</span>
                <span class="font-medium">History</span>
            </a>
        </nav>
        <div class="px-6 mt-auto">
            <a href="<?= $baseUrl ?>logout" class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] hover:bg-[#353534]/50 hover:text-[#e9c176] transition-all duration-300 ease-out rounded-xl group">
                <span class="material-symbols-outlined text-xl">logout</span>
                <span class="font-medium">Logout</span>
            </a>
        </div>
    </aside>
    <!-- TopNavBar Anchor -->
    <header
        class="fixed top-0 right-0 left-64 h-20 bg-[#131313]/60 backdrop-blur-xl border-b border-[#414848]/15 flex justify-between items-center px-12 z-40">
        <div class="relative w-96">
            <form method="GET" action="" class="flex items-center">
                <button type="submit" class="text-secondary/40 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2">search</span>
                </button>
                <input name="search"
                    class="w-full bg-surface-container-low border-none rounded-full py-2.5 pl-12 pr-4 text-sm focus:ring-1 focus:ring-primary/30 placeholder:text-secondary/30"
                    placeholder="Search the archive..." type="text" value="<?php echo $_GET['search'] ?? ''; ?>" />
            </form>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-4 border-r border-outline-variant/30 pr-6">
                <button class="text-secondary/60 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <button class="text-secondary/60 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">settings</span>
                </button>
                <button class="text-secondary/60 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">help</span>
                </button>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-on-surface">Admin User</p>
                    <p class="text-[10px] text-secondary/50">Curator Level IV</p>
                </div>
                <img alt="Admin User" class="w-10 h-10 rounded-full border border-primary/20 object-cover"
                    data-alt="Professional studio portrait of a museum curator in a dark suit against a moody grey background, high-end photography style"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDriwD4HUWabcW2Wzg8IvO0AJIQswjuthlxsxE5H5mJ2JO8iUy7vSnuwU_vyVKRDT3L44fC0_v8cKiHVsYQ1L23Y5S-w0Mi4ikEcLpqipQTIarHS2skwBaguPThdhqUfyMUWm6-fsBBRacRb_XlFpfZPEmtR1WsCPIgjwLTw7Bjqc6iFjTaTuUiapkRAIx4dhlu43juTBbwrzgn-r8OvCuZ1qwpixnJ_ZG8KQcPvrTWcHja6CrtKmzsandr0GSsEZ7SseQjfNa9wIRh" />
            </div>
        </div>
    </header>
    <!-- Main Content Canvas -->
    <main class="ml-64 pt-32 px-12 pb-20 min-h-screen">
        <!-- Hero Section / Header -->
        <div class="flex justify-between items-end mb-12">
            <div class="max-w-2xl">
                <h2 class="text-6xl font-extrabold font-headline tracking-tighter text-on-surface mb-4">
                    Games <span class="text-primary italic">Library</span>
                </h2>
                <p class="text-secondary/60 text-lg leading-relaxed">
                    Manage the tactile collection. curate entries, adjust complexity ratings, and monitor availability
                    within the digital archive.
                </p>
            </div>
            <a href="<?= BASE_URL ?>/admin/games/create"
                class="brass-gradient text-on-primary px-8 py-4 rounded-full font-bold flex items-center gap-2 shadow-2xl shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                <span class="material-symbols-outlined">library_add</span>
                Add New Game
            </a>
        </div>
        <!-- Filter Bar -->
        <form method="GET" action=""
            class="flex items-center gap-4 mb-8 bg-surface-container-low/40 p-2 rounded-2xl border border-outline-variant/10">
            <button class="bg-surface-container-highest text-primary px-6 py-2.5 rounded-xl text-sm font-medium">All
                Games</button>
            <select name="category"
                class="bg-surface-container text-on-surface px-4 py-2.5 rounded-xl text-sm border border-outline-variant/30 focus:border-primary focus:ring-1 focus:ring-primary/30 cursor-pointer outline-none transition-all">
                <option value="">All Categories</option>
                <?php foreach ($categories ?? [] as $cat): ?>
                    <option value="<?= $cat['id'] ?? '' ?>" <?= ($_GET['category'] ?? '') == ($cat['id'] ?? '') ? 'selected' : '' ?>><?= $cat['name'] ?? '' ?></option>
                <?php endforeach; ?>
            </select>
            <select name="difficulty"
                class="bg-surface-container text-on-surface px-4 py-2.5 rounded-xl text-sm border border-outline-variant/30 focus:border-primary focus:ring-1 focus:ring-primary/30 cursor-pointer outline-none transition-all">
                <option value="">All Difficulties</option>
                <option value="easy" <?= ($_GET['difficulty'] ?? '') == 'easy' ? 'selected' : '' ?>>Easy</option>
                <option value="medium" <?= ($_GET['difficulty'] ?? '') == 'medium' ? 'selected' : '' ?>>Medium</option>
                <option value="hard" <?= ($_GET['difficulty'] ?? '') == 'hard' ? 'selected' : '' ?>>Hard</option>
            </select>
            <div class="flex-1"></div>
            <button type="submit"
                class="flex items-center gap-2 text-secondary/60 px-4 py-2 hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-sm">filter_list</span>
                <span class="text-xs uppercase tracking-widest font-bold">Apply Filters</span>
            </button>
        </form>
        <!-- Games List -->
        <div class="grid grid-cols-1 gap-4">
            <?php foreach ($games ?? [] as $game): ?>
            <div
                class="group relative flex items-center bg-surface-container hover:bg-surface-container-high transition-all duration-500 rounded-2xl p-4 border border-outline-variant/5 shadow-xl">
                <div class="w-24 h-24 rounded-xl overflow-hidden mr-8 shadow-inner bg-surface-container-lowest">
                    <img alt="<?= $game['name'] ?? 'Game' ?>"
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity"
                        src="<?= $game['image_url'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCJU-8pIYbfJT9fTRNKdXgbdvXpp0xFZQSHKR__3LhkfI4zN4-t9Nys2u4tNgN3sewsK2E8LxtaK6OguafngqbJBOd8a9Nq2iRVZedKsf66_vp9fhshP16dDsYeeg4OUTyZ1VENf7nstXjC_9lcqGArkqbluGwV4sqAiRwIKSeMjoXXpkKtqcx5aCVWmc9LZHcahnHmFXZSOqmTKHuyX57nI2UBN9ZweM2ywnytzqw-vdYA1Tqhot7p7NzNQf9z1c4oS-DLYYj768_P' ?>" />
                </div>
                <div class="flex-1 grid grid-cols-5 items-center gap-8">
                    <div class="col-span-1">
                        <h4
                            class="text-lg font-bold font-headline text-on-surface group-hover:text-primary transition-colors">
                            <?= $game['name'] ?? 'Game Name' ?></h4>
                        <span
                            class="inline-block mt-1 px-3 py-0.5 rounded-full bg-primary/10 text-primary text-[10px] font-bold tracking-widest uppercase"><?= $game['category_name'] ?? 'Category' ?></span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-secondary/40 uppercase tracking-widest">Players</span>
                        <div class="flex items-center gap-2 text-on-surface-variant font-medium">
                            <span class="material-symbols-outlined text-lg text-secondary">groups</span>
                            <?= $game['min_players'] ?? 1 ?> - <?= $game['max_players'] ?? 4 ?>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-secondary/40 uppercase tracking-widest">Duration</span>
                        <div class="flex items-center gap-2 text-on-surface-variant font-medium">
                            <span class="material-symbols-outlined text-lg text-secondary">schedule</span>
                            <?= $game['duration_minutes'] ?? 60 ?> min
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-secondary/40 uppercase tracking-widest">Difficulty</span>
                        <div class="flex items-center gap-1">
                            <?php 
                            $difficulty = $game['difficulty'] ?? 'easy';
                            $levels = ['easy' => 1, 'medium' => 2, 'hard' => 3];
                            $filled = $levels[$difficulty] ?? 1;
                            for ($i = 1; $i <= 4; $i++): 
                            ?>
                            <div class="h-1.5 w-8 rounded-full <?= $i <= $filled ? 'bg-primary' : 'bg-outline-variant/30' ?>"></div>
                            <?php endfor; ?>
                            <span class="ml-2 text-xs text-on-surface-variant"><?= ucfirst($difficulty) ?></span>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 pr-4">
                        <a href="<?= BASE_URL ?>/admin/games/edit/<?= $game['id'] ?? 0 ?>"
                            class="w-10 h-10 rounded-full flex items-center justify-center bg-surface-container-highest text-secondary hover:text-primary hover:bg-primary/10 transition-all">
                            <span class="material-symbols-outlined">edit_square</span>
                        </a>
                        <button type="button" onclick="document.getElementById('deleteModal-<?= $game['id'] ?? 0 ?>').showModal()"
                            class="w-10 h-10 rounded-full flex items-center justify-center bg-surface-container-highest text-secondary hover:text-error hover:bg-error/10 transition-all">
                            <span class="material-symbols-outlined">delete_sweep</span>
                        </button>
                        <dialog id="deleteModal-<?= $game['id'] ?? 0 ?>" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50">
                            <h3 class="text-xl font-bold text-primary mb-4">Delete Game</h3>
                            <p class="text-secondary mb-6">Are you sure you want to delete "<?= $game['name'] ?? 'this game' ?>"?</p>
                            <div class="flex justify-end gap-4">
                                <button onclick="document.getElementById('deleteModal-<?= $game['id'] ?? 0 ?>').close()" class="px-4 py-2 rounded-full text-secondary hover:bg-surface-container">Cancel</button>
                                <form method="POST" action="<?= BASE_URL ?>/admin/games/delete/<?= $game['id'] ?? 0 ?>" class="inline">
                                    <button type="submit" class="px-4 py-2 bg-error text-on-error rounded-full hover:opacity-90">Delete</button>
                                </form>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Footer / Pagination -->
        <div class="mt-12 flex items-center justify-between">
            <p class="text-secondary/40 text-sm italic">Showing <?= count($games ?? [1,2,3,4]) ?> of <?= $totalGames ?? 124 ?> curated experiences</p>
            <div class="flex items-center gap-4">
                <button
                    class="w-12 h-12 rounded-full border border-outline-variant/20 flex items-center justify-center text-secondary hover:text-primary hover:border-primary/50 transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <div class="flex gap-2">
                    <button class="w-10 h-10 rounded-lg bg-primary/10 text-primary font-bold">1</button>
                    <button
                        class="w-10 h-10 rounded-lg hover:bg-surface-container transition-colors text-secondary/60">2</button>
                    <button
                        class="w-10 h-10 rounded-lg hover:bg-surface-container transition-colors text-secondary/60">3</button>
                    <span class="px-2 text-secondary/30 self-end mb-2">...</span>
                    <button
                        class="w-10 h-10 rounded-lg hover:bg-surface-container transition-colors text-secondary/60">32</button>
                </div>
                <button
                    class="w-12 h-12 rounded-full border border-outline-variant/20 flex items-center justify-center text-secondary hover:text-primary hover:border-primary/50 transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </main>
    <!-- Contextual "New" FAB Suppression applied (FAB only on Home/Dashboard, not management screens) -->
</body>

</html>