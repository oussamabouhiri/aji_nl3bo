<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;family=Inter:wght@300..700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
            display: inline-block;
            vertical-align: middle;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        .font-manrope {
            font-family: 'Manrope', sans-serif;
        }

        .glass-panel {
            background: rgba(32, 31, 31, 0.6);
            backdrop-filter: blur(20px);
        }

        .brass-gradient {
            background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%);
        }

        .ghost-border {
            border: 1px solid rgba(65, 72, 72, 0.15);
        }
    </style>
</head>

<body class="bg-background text-on-surface selection:bg-primary/30 min-h-screen">
    <!-- SideNavBar -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 border-r border-[#414848]/15 bg-[#131313] dark:bg-[#131313] shadow-[16px_0_40px_-4px_rgba(0,0,0,0.1)] flex flex-col py-8 z-50">
        <div class="px-6 mb-12">
            <h1 class="text-2xl font-black tracking-tight text-[#e9c176] font-manrope">The Tactile Archive</h1>
            <p class="text-secondary text-xs tracking-widest mt-1 opacity-70 uppercase">Digital Curator</p>
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
            <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center gap-3 shadow-lg shadow-primary/20"
                href="<?= BASE_URL ?>/admin/categories">
                <span class="material-symbols-outlined" data-icon="category">category</span>
                <span class="text-sm">Categories</span>
            </a>
            <!-- Reservations -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= BASE_URL ?>/admin/reservations">
                <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
                <span class="font-medium text-sm">Reservations</span>
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
        class="fixed top-0 right-0 left-64 h-20 bg-[#131313]/60 backdrop-blur-xl border-b border-[#414848]/15 flex justify-between items-center px-12 z-40">
        <form method="GET" action="" class="flex items-center bg-surface-container-high/50 rounded-full px-2 py-2 w-96 ghost-border">
            <button type="submit" class="text-secondary hover:text-primary transition-colors ml-1">
                <span class="material-symbols-outlined" data-icon="search">search</span>
            </button>
            <input
                name="search"
                class="bg-transparent border-none text-sm focus:ring-0 text-on-surface w-full placeholder:text-outline"
                placeholder="Search categories..." type="text" value="<?php echo $_GET['search'] ?? ''; ?>">
        </form>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-4 border-r border-outline-variant/30 pr-6">
                <button class="text-secondary hover:text-primary transition-colors">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                </button>
                <button class="text-secondary hover:text-primary transition-colors">
                    <span class="material-symbols-outlined" data-icon="settings">settings</span>
                </button>
                <button class="text-secondary hover:text-primary transition-colors">
                    <span class="material-symbols-outlined" data-icon="help">help</span>
                </button>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-sm font-bold text-on-surface">Admin User</p>
                    <p class="text-[10px] text-secondary uppercase tracking-widest">System Manager</p>
                </div>
                <img alt="Admin Profile" class="w-10 h-10 rounded-full border-2 border-primary/20"
                    data-alt="portrait of a professional man in a dark turtleneck sweater against a dark minimalist studio background"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwRZ_LyAhHhJYpqZ_HSy8bi-UmPV0tfwdQZIEoktOZVcn2NBGCpEirobAUGkynDmCHCFYyW23lSA-n8fv-PANssNq2CLUAVwNnhNdk9vunuiF_QKX_mXQK8YE-x_eG2WekdGSpfHjke71k6DSqlMiRy0pgLZcby-3IdD6MmhxJpcaK0YxLTt3Qh2T8OU-3BssJjiT7TNTMcqZ57q3N01gG5WdjCsnNFpuPxrPXfT6X1UH3FzDAnR0vzkbZuem9UqhDue2wndqXOc6-">
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="ml-64 pt-32 px-12 pb-20">
        <div class="max-w-6xl mx-auto">
            <!-- Hero Header -->
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="text-6xl font-black font-manrope tracking-tight text-on-surface leading-none mb-4">
                        Archive <span class="text-primary">Categories</span>
                    </h2>
                    <p class="text-secondary text-lg font-light max-w-md">Organize the collection through curated
                        gameplay archetypes and atmospheric signatures.</p>
                </div>
                <button
                    type="button" onclick="document.getElementById('createCategoryModal').showModal()"
                    class="brass-gradient text-[#412d00] font-bold px-8 py-4 rounded-full flex items-center justify-center gap-2 hover:scale-[1.02] transition-transform shadow-[0_10px_30px_rgba(233,193,118,0.15)]">
                    <span class="material-symbols-outlined" data-icon="add_circle">add_circle</span>
                    Add Category
                </button>
                <dialog id="createCategoryModal" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50 w-full max-w-md">
                    <h3 class="text-xl font-bold text-primary mb-6">Create New Category</h3>
                    <form method="POST" action="<?= BASE_URL ?>/admin/categories/create" class="space-y-4">
                        <!--  //Csrf::field()  -->
                        <div>
                            <label class="block text-sm font-medium text-secondary mb-2">Category Name</label>
                            <input type="text" name="name" required
                                class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface"
                                placeholder="e.g., Strategy">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-secondary mb-2">Description</label>
                            <textarea name="description" rows="3" required
                                class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface"
                                placeholder="Describe this category..."></textarea>
                        </div>
                        <div class="flex justify-end gap-3 pt-2">
                            <button type="button" onclick="document.getElementById('createCategoryModal').close()"
                                class="px-6 py-2 rounded-full text-secondary hover:bg-surface-container">Cancel</button>
                            <button type="submit"
                                class="brass-gradient text-[#412d00] px-6 py-2 rounded-full font-bold">Create Category</button>
                        </div>
                    </form>
                </dialog>
            </div>
            <!-- Bento Category Grid (List View alternative for premium feel) -->
            <div class="space-y-6">
                <?php
                use App\Helper\Csrf;
                $category_styles = [
                    'Strategy' => ['icon' => 'tactic', 'color' => 'primary'],
                    'Atmosphere' => ['icon' => 'auto_awesome', 'color' => 'secondary'],
                    'Family' => ['icon' => 'diversity_3', 'color' => 'tertiary'],
                    'Expert' => ['icon' => 'model_training', 'color' => 'error'],
                ];
                $colors = ['primary', 'secondary', 'tertiary', 'error'];
                $icons = ['category', 'sports_esports', 'extension', 'casino', 'grid_view'];
                -
                $colorIndex = 0;
                $iconIndex = 0;
                foreach ($categories as $category): 
                    $style = $category_styles[$category['name']] ?? ['icon' => $icons[$iconIndex++ % count($icons)], 'color' => $colors[$colorIndex++ % count($colors)]];
                ?>
                <div class="group relative overflow-hidden bg-surface-container rounded-xl p-8 flex items-center justify-between transition-all duration-500 hover:bg-surface-container-highest ghost-border">
                    <div class="flex items-center gap-8">
                        <div class="w-16 h-16 rounded-2xl bg-<?= $style['color'] ?>/10 flex items-center justify-center text-<?= $style['color'] ?> group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl"><?= $style['icon'] ?></span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold font-manrope text-on-surface"><?= $category['name'] ?? 'Category Name' ?></h3>
                            <p class="text-secondary text-sm"><?= $category['description'] ?? 'Category description goes here.' ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-16">
                        <div class="text-center">
                            <p class="text-3xl font-black font-manrope text-primary"><?= $category['count'] ?? 0 ?></p>
                            <p class="text-[10px] text-secondary uppercase tracking-widest">Games Available</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="document.getElementById('editModal-<?= $category['id'] ?? 0 ?>').showModal()" class="w-10 h-10 rounded-full flex items-center justify-center text-secondary hover:bg-surface-bright transition-colors border border-outline-variant/15">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            <button type="button" onclick="document.getElementById('deleteModal-<?= $category['id'] ?? 0 ?>').showModal()" class="w-10 h-10 rounded-full flex items-center justify-center text-error/60 hover:text-error hover:bg-error-container/20 transition-colors border border-outline-variant/15">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                            <dialog id="editModal-<?= $category['id'] ?? 0 ?>" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50 w-full max-w-md">
                                <h3 class="text-xl font-bold text-primary mb-6">Edit Category</h3>
                                <form method="POST" action="<?= BASE_URL ?>/admin/categories/update/<?= $category['id'] ?? 0 ?>" class="space-y-4">
                                    <?= Csrf::field() ?>
                                    <div>
                                        <label class="block text-sm font-medium text-secondary mb-2">Category Name</label>
                                        <input type="text" name="name" value="<?= $category['name'] ?? '' ?>" required
                                            class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-secondary mb-2">Description</label>
                                        <textarea name="description" rows="3" required
                                            class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface"><?= $category['description'] ?? '' ?></textarea>
                                    </div>
                                    <div class="flex justify-end gap-3 pt-2">
                                        <button type="button" onclick="document.getElementById('editModal-<?= $category['id'] ?? 0 ?>').close()"
                                            class="px-6 py-2 rounded-full text-secondary hover:bg-surface-container">Cancel</button>
                                        <button type="submit"
                                            class="brass-gradient text-[#412d00] px-6 py-2 rounded-full font-bold">Save Changes</button>
                                    </div>
                                </form>
                            </dialog>
                            <dialog id="deleteModal-<?= $category['id'] ?? 0 ?>" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50">
                                <h3 class="text-xl font-bold text-primary mb-4">Delete Category</h3>
                                <p class="text-secondary mb-6">Are you sure you want to delete this category?</p>
                                <div class="flex justify-end gap-4">
                                    <button onclick="document.getElementById('deleteModal-<?= $category['id'] ?? 0 ?>').close()" class="px-4 py-2 rounded-full text-secondary hover:bg-surface-container">Cancel</button>
                                    <form method="POST" action="<?= BASE_URL ?>/admin/categories/delete/<?= $category['id'] ?? 0 ?>" class="inline">
                                        <?= Csrf::field() ?>
                                        <button type="submit" class="px-4 py-2 bg-error text-on-error rounded-full hover:opacity-90">Delete</button>
                                    </form>
                                </div>
                            </dialog>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php if (empty($categories)): ?>
            <!-- Empty State / Add Suggestion Card -->
            <div onclick="document.getElementById('createCategoryModal').showModal()"
                class="mt-12 border-2 border-dashed border-outline-variant/20 rounded-3xl p-12 flex flex-col items-center justify-center text-center group cursor-pointer hover:border-primary/30 transition-colors">
                <div
                    class="w-20 h-20 rounded-full bg-surface-container-highest flex items-center justify-center mb-6 text-outline group-hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-4xl" data-icon="library_add">library_add</span>
                </div>
                <h4 class="text-xl font-bold font-manrope mb-2">Expand the Collection</h4>
                <p class="text-secondary max-w-xs text-sm">Ready to introduce a new genre? Define the boundaries of play
                    by creating a new archival category.</p>
            </div>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>