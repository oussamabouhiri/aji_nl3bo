<?php use App\Helper\Csrf; date_default_timezone_set('Africa/Casablanca'); ?>
<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= ($action === 'edit') ? 'Edit' : 'Add' ?> Game | Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
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
        .brass-gradient { background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%); }
    </style>
</head>

<body class="bg-background text-on-surface min-h-screen">
    <!-- SideNavBar -->
    <aside class="h-screen w-64 fixed left-0 top-0 bg-[#0e0e0e] shadow-[16px_0_40px_-4px_rgba(0,0,0,0.5)] flex flex-col py-8 z-50">
        <div class="px-6 mb-12">
            <h1 class="text-2xl font-black tracking-tight text-[#e9c176] font-headline">Aji L3bo</h1>
            <p class="text-xs text-secondary/60 font-medium">Admin Console</p>
        </div>
        <nav class="flex-1 space-y-1">
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3" href="<?= BASE_URL ?>/admin">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>
            <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center gap-3 shadow-lg shadow-primary/20" href="<?= BASE_URL ?>/admin/games">
                <span class="material-symbols-outlined">sports_esports</span>
                <span class="text-sm">Games</span>
            </a>
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3" href="<?= BASE_URL ?>/admin/categories">
                <span class="material-symbols-outlined">category</span>
                <span class="font-medium text-sm">Categories</span>
            </a>
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3" href="<?= BASE_URL ?>/admin/reservations">
                <span class="material-symbols-outlined">event_available</span>
                <span class="font-medium text-sm">Reservations</span>
            </a>
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3" href="<?= BASE_URL ?>/admin/sessions">
                <span class="material-symbols-outlined">timer</span>
                <span class="font-medium text-sm">Sessions</span>
            </a>
        </nav>
        <div class="px-4 mt-auto">
            <a href="<?= BASE_URL ?>/admin/reservations" class="w-full bg-primary text-on-primary font-bold py-3 rounded-full flex items-center justify-center gap-2 hover:opacity-90 transition-all shadow-lg shadow-primary/10">
                <span class="material-symbols-outlined text-lg">add</span>
                New Reservation
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 min-h-screen p-8 bg-background">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="flex items-center gap-4 mb-8">
                <a href="<?= BASE_URL ?>/admin/games" class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-secondary hover:text-primary hover:bg-surface-container-high transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <div>
                    <h1 class="text-4xl font-extrabold font-headline tracking-tight text-on-surface">
                        <?= ($action === 'edit') ? 'Edit Game' : 'Add New Game' ?>
                    </h1>
                    <p class="text-secondary mt-1"><?= ($action === 'edit') ? 'Update game details in the archive' : 'Add a new game to the collection' ?></p>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="<?= BASE_URL ?>/admin/games/<?= ($action === 'edit') ? 'update' : 'store' ?>" class="bg-surface-container rounded-2xl p-8 space-y-6">
                <?= Csrf::field() ?>
                <?php if ($action === 'edit'): ?>
                <input type="hidden" name="id" value="<?= $game['id'] ?? '' ?>">
                <?php endif; ?>

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-secondary mb-2">Game Name *</label>
                    <input type="text" name="name" value="<?= $game['name'] ?? '' ?>" required
                        class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary"
                        placeholder="e.g., Catan">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-secondary mb-2">Description *</label>
                    <textarea name="description" rows="3" required
                        class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary"
                        placeholder="Describe this game..."><?= $game['description'] ?? '' ?></textarea>
                </div>

                <!-- Category & Difficulty -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Category</label>
                        <select name="category_id"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                            <option value="">No Category</option>
                            <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= (($game['category_id'] ?? '') == $cat['id']) ? 'selected' : '' ?>>
                                <?= $cat['name'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Difficulty</label>
                        <select name="difficulty"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                            <option value="easy" <?= (($game['difficulty'] ?? 'easy') === 'easy') ? 'selected' : '' ?>>Easy</option>
                            <option value="medium" <?= (($game['difficulty'] ?? '') === 'medium') ? 'selected' : '' ?>>Medium</option>
                            <option value="hard" <?= (($game['difficulty'] ?? '') === 'hard') ? 'selected' : '' ?>>Hard</option>
                        </select>
                    </div>
                </div>

                <!-- Players & Duration -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Min Players</label>
                        <input type="number" name="min_players" value="<?= $game['min_players'] ?? 2 ?>" min="1"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Max Players</label>
                        <input type="number" name="max_players" value="<?= $game['max_players'] ?? 4 ?>" min="1"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Duration (min)</label>
                        <input type="number" name="duration" value="<?= $game['duration'] ?? 60 ?>" min="1"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Spots</label>
                        <input type="number" name="spots" value="<?= $game['spots'] ?? 4 ?>" min="1"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                    </div>
                </div>

                <!-- Price & Status -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Price (MAD)</label>
                        <input type="number" name="price" value="<?= $game['price'] ?? 0 ?>" min="0" step="0.01"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-secondary mb-2">Status</label>
                        <select name="status"
                            class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary">
                            <option value="available" <?= (($game['status'] ?? 'available') === 'available') ? 'selected' : '' ?>>Available</option>
                            <option value="unavailable" <?= (($game['status'] ?? '') === 'unavailable') ? 'selected' : '' ?>>Unavailable</option>
                        </select>
                    </div>
                </div>

                <!-- Image URL -->
                <div>
                    <label class="block text-sm font-medium text-secondary mb-2">Image URL</label>
                    <input type="url" name="image_url" value="<?= $game['image_url'] ?? '' ?>"
                        class="w-full bg-surface-high border border-outline-variant/20 rounded-xl px-4 py-3 text-on-surface focus:ring-2 focus:ring-primary/50 focus:border-primary"
                        placeholder="https://example.com/image.jpg">
                </div>

                <!-- Submit -->
                <div class="flex justify-end gap-4 pt-4">
                    <a href="<?= BASE_URL ?>/admin/games" class="px-6 py-3 rounded-full border border-outline-variant/30 text-secondary hover:bg-surface-high transition-all">
                        Cancel
                    </a>
                    <button type="submit" class="brass-gradient px-8 py-3 rounded-full text-on-primary font-bold shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
                        <?= ($action === 'edit') ? 'Save Changes' : 'Add Game' ?>
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
