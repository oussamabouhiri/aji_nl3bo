<?php
$baseUrl = \App\Helper\Utility::baseUrl();
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
                href="<?= $baseUrl ?>admin/dashboard">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>
            <!-- Games -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= $baseUrl ?>admin/games">
                <span class="material-symbols-outlined" data-icon="sports_esports">sports_esports</span>
                <span class="font-medium text-sm">Games</span>
            </a>
            <!-- Categories -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= $baseUrl ?>categories">
                <span class="material-symbols-outlined" data-icon="category">category</span>
                <span class="font-medium text-sm">Categories</span>
            </a>
            <!-- Reservations -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= $baseUrl ?>admin/reservations">
                <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
                <span class="font-medium text-sm">Reservations</span>
            </a>
            <!-- Active Sessions (ACTIVE STATE LOGIC applied here) -->
            <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center gap-3 scale-98 transition-transform shadow-lg shadow-primary/20"
                href="<?= $baseUrl ?>admin/sessions">
                <span class="material-symbols-outlined" data-icon="timer"
                    style="font-variation-settings: 'FILL' 1;">timer</span>
                <span class="text-sm">Active Sessions</span>
            </a>
            <!-- History -->
            <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all flex items-center gap-3 group"
                href="<?= $baseUrl ?>admin/session-history">
                <span class="material-symbols-outlined" data-icon="history">history</span>
                <span class="font-medium text-sm">History</span>
            </a>
        </nav>
        <div class="px-4 mt-auto space-y-4">
            <div class="pt-4 space-y-1">
                <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-2 rounded-full transition-all flex items-center gap-3 text-sm"
                    href="<?= $baseUrl ?>logout">
                    <span class="material-symbols-outlined text-xl" data-icon="logout">logout</span>
                    Logout
                </a>
            </div>
            <div class="flex items-center gap-3 px-4 pt-4 border-t border-white/5">
                <img class="w-8 h-8 rounded-full object-cover"
                    data-alt="close-up portrait of professional male cafe administrator with modern haircut and stylish glasses in moody studio lighting"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTvmTeyYqUSz1UCRdpwY0jkAMjUuAz8aeu1EN4r21LyklK3epXS9xWqWgK4Url0aahNx1IFAT-kvktMH_i-K9tkMXT-7wDA5r-nBUdoEt_SZnElnKNoRheaBoI02EcPz4FsM32_Puk3ZOvPpzUe74vAR95akxLnJUtKhiTNXR5s-npUHwDKGXo8qUluQ5Nx5r82-Jpfnnr0khk-0HYmOSeOnRVFSP12UhHy8G1UF88em7kA45X6hvkr13D6UXJRr1SstKlu5TGBQYE">
                <div class="overflow-hidden">
                    <p class="text-xs font-bold truncate">Admin Console</p>
                    <p class="text-[10px] text-secondary opacity-70 truncate">Logged in as Yassir</p>
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
<!-- Session Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">
            <?php 
            $tables = $tables ?? [];
            $maxTables = 6;
            $allTables = array_merge($tables, range(count($tables) + 1, $maxTables));
            foreach ($allTables as $index => $table): 
                $tableNum = is_array($table) ? ($table['table_number'] ?? $index + 1) : ($index + 1);
                $session = is_array($table) ? ($table['session'] ?? null) : null;
                $isActive = $session !== null;
            ?>
            <?php if ($isActive): ?>
            <div class="bg-surface-container rounded-xl p-6 glow-teal border-t-2 border-secondary/20 relative group transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-secondary tracking-widest uppercase mb-1">Table</span>
                        <span class="text-5xl font-black font-headline text-primary"><?= $tableNum ?></span>
                    </div>
                    <div class="flex items-center gap-2 bg-secondary/10 px-3 py-1.5 rounded-full">
                        <div class="w-2 h-2 rounded-full bg-secondary animate-pulse shadow-[0_0_8px_rgba(171,205,204,1)]"></div>
                        <span class="text-[10px] font-bold text-secondary uppercase">Active</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 mb-8">
                    <img class="w-16 h-16 rounded-xl object-cover ring-2 ring-primary/20"
                        src="<?= $session['game_image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDNmFKxsAnPdaN50AjJftuVdjICX0Z3r3EAKwHjjQqSmroZziOyYa8x0BV8d_yeY2zAkt9jLRLH-KhHN8j-EqqtmXh8VUZ0K1CAWLXoF5jNbXMcwUR_pXF2JajYWllhemgrlJoW-o6jpqHgw_fPsNSN-uqQSO_s0n6ROFMGoU9OQnYshAMkdquM-X0kmHDrXS9hGV8heOhuiyPmaiawoDKUA5zzIvaIHU33-EleatIrYvTydqQfZDN4LLlNdjUbvEWGOuaTHg_qzVkF' ?>">
                    <div>
                        <h4 class="font-headline font-bold text-lg leading-tight"><?= $session['game_name'] ?? 'Game Name' ?></h4>
                        <div class="flex items-center gap-2 text-secondary/70 text-sm mt-1">
                            <span class="material-symbols-outlined text-base">groups</span>
                            <span><?= $session['player_count'] ?? 1 ?> Players</span>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-container-low rounded-xl p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-secondary/50 font-bold uppercase">Time Elapsed</span>
                            <span class="text-2xl font-headline font-bold tabular-nums"><?= $session['elapsed'] ?? '00:00:00' ?></span>
                        </div>
                        <div class="w-10 h-10 rounded-full border-2 border-secondary/20 border-t-secondary flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-sm">update</span>
                        </div>
                    </div>
                </div>
                <form method="POST" action="<?= BASE_URL ?>/admin/sessions/end/<?= $session['id'] ?? 0 ?>">
                    <button type="submit" class="w-full bg-error-container/20 hover:bg-error-container text-error font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-xl">stop_circle</span>
                        End Session
                    </button>
                </form>
            </div>
            <?php else: ?>
            <div class="bg-surface-container-low/50 border-2 border-dashed border-white/5 rounded-xl p-6 relative group hover:bg-surface-container transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-on-surface-variant/40 tracking-widest uppercase mb-1">Table</span>
                        <span class="text-5xl font-black font-headline text-on-surface-variant/20"><?= $tableNum ?></span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 px-3 py-1.5 rounded-full">
                        <div class="w-2 h-2 rounded-full bg-on-surface-variant/20"></div>
                        <span class="text-[10px] font-bold text-on-surface-variant/40 uppercase">Empty</span>
                    </div>
                </div>
                <div class="h-40 flex flex-col items-center justify-center text-center px-4 mb-6">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant/20 mb-2">desktop_access_disabled</span>
                    <p class="text-sm text-on-surface-variant/40 font-medium">No active session at this table.</p>
                </div>
                <a href="<?= BASE_URL ?>/admin/sessions/start/<?= $tableNum ?>"
                    class="w-full bg-surface-container-highest hover:bg-primary hover:text-on-primary text-on-surface-variant font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl">play_circle</span>
                    Start Session
                </a>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
                    <div class="flex items-center gap-2 bg-secondary/10 px-3 py-1.5 rounded-full">
                        <div
                            class="w-2 h-2 rounded-full bg-secondary animate-pulse shadow-[0_0_8px_rgba(171,205,204,1)]">
                        </div>
                        <span class="text-[10px] font-bold text-secondary uppercase">Active</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 mb-8">
                    <div class="relative">
                        <img class="w-16 h-16 rounded-xl object-cover ring-2 ring-primary/20"
                            data-alt="modern aesthetic box art for a futuristic competitive video game with neon blue and pink lighting effects"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNmFKxsAnPdaN50AjJftuVdjICX0Z3r3EAKwHjjQqSmroZziOyYa8x0BV8d_yeY2zAkt9jLRLH-KhHN8j-EqqtmXh8VUZ0K1CAWLXoF5jNbXMcwUR_pXF2JajYWllhemgrlJoW-o6jpqHgw_fPsNSN-uqQSO_s0n6ROFMGoU9OQnYshAMkdquM-X0kmHDrXS9hGV8heOhuiyPmaiawoDKUA5zzIvaIHU33-EleatIrYvTydqQfZDN4LLlNdjUbvEWGOuaTHg_qzVkF">
                    </div>
                    <div>
                        <h4 class="font-headline font-bold text-lg leading-tight">Valorant Champions</h4>
                        <div class="flex items-center gap-2 text-secondary/70 text-sm mt-1">
                            <span class="material-symbols-outlined text-base" data-icon="groups">groups</span>
                            <span>5 Players</span>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-container-low rounded-xl p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-secondary/50 font-bold uppercase">Time Elapsed</span>
                            <span class="text-2xl font-headline font-bold tabular-nums">01:42:15</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full border-2 border-secondary/20 border-t-secondary flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-sm"
                                data-icon="update">update</span>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full bg-error-container/20 hover:bg-error-container text-error font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 group-hover:shadow-lg group-hover:shadow-error/10">
                    <span class="material-symbols-outlined text-xl" data-icon="stop_circle">stop_circle</span>
                    End Session
                </button>
            </div>
            <!-- Active Table 02 -->
            <div
                class="bg-surface-container rounded-xl p-6 glow-teal border-t-2 border-secondary/20 relative group transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-secondary tracking-widest uppercase mb-1">Table</span>
                        <span class="text-5xl font-black font-headline text-primary">02</span>
                    </div>
                    <div class="flex items-center gap-2 bg-secondary/10 px-3 py-1.5 rounded-full">
                        <div
                            class="w-2 h-2 rounded-full bg-secondary animate-pulse shadow-[0_0_8px_rgba(171,205,204,1)]">
                        </div>
                        <span class="text-[10px] font-bold text-secondary uppercase">Active</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 mb-8">
                    <img class="w-16 h-16 rounded-xl object-cover ring-2 ring-primary/20"
                        data-alt="colorful artwork for a high-fantasy roleplaying game featuring mythical landscapes and vibrant magical elements"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCERtl4SvAezdhMO6DbmPuYNGEZQOfwGr7L-5njv8tG6ExAaywGd_jeOXZE-8-B13cSoZGFrD1VukFQiyc-y1sVyCTRKNHOr7lPhSUsJG_YLS8An6vKeOi-8szHENOhPL9fDi6Jb6RoTysA_klw8Mzy17GUc1YBaM-hF5wXty5haQLM-R90PeXxHkXrrVVcsCylL0_KFgLyAofhckKpRtKM2jfGDzt9UxmZqB-AXEkLJyKSE4PfvRs3Lx0YheSrjVv_b6i-RFYaTTD8">
                    <div>
                        <h4 class="font-headline font-bold text-lg leading-tight">Elden Ring DLC</h4>
                        <div class="flex items-center gap-2 text-secondary/70 text-sm mt-1">
                            <span class="material-symbols-outlined text-base" data-icon="person">person</span>
                            <span>1 Player</span>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-container-low rounded-xl p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-secondary/50 font-bold uppercase">Time Elapsed</span>
                            <span class="text-2xl font-headline font-bold tabular-nums">03:10:42</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full border-2 border-secondary/20 border-t-secondary flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-sm"
                                data-icon="update">update</span>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full bg-error-container/20 hover:bg-error-container text-error font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl" data-icon="stop_circle">stop_circle</span>
                    End Session
                </button>
            </div>
            <!-- Empty Table 03 -->
            <div
                class="bg-surface-container-low/50 border-2 border-dashed border-white/5 rounded-xl p-6 relative group hover:bg-surface-container transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span
                            class="text-xs font-bold text-on-surface-variant/40 tracking-widest uppercase mb-1">Table</span>
                        <span class="text-5xl font-black font-headline text-on-surface-variant/20">03</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 px-3 py-1.5 rounded-full">
                        <div class="w-2 h-2 rounded-full bg-on-surface-variant/20"></div>
                        <span class="text-[10px] font-bold text-on-surface-variant/40 uppercase">Empty</span>
                    </div>
                </div>
                <div class="h-40 flex flex-col items-center justify-center text-center px-4 mb-6">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant/20 mb-2"
                        data-icon="desktop_access_disabled">desktop_access_disabled</span>
                    <p class="text-sm text-on-surface-variant/40 font-medium">No active session at this table.</p>
                </div>
                <button
                    class="w-full bg-surface-container-highest hover:bg-primary hover:text-on-primary text-on-surface-variant font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl" data-icon="play_circle">play_circle</span>
                    Start Session
                </button>
            </div>
            <!-- Active Table 04 -->
            <div
                class="bg-surface-container rounded-xl p-6 glow-teal border-t-2 border-secondary/20 relative group transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-secondary tracking-widest uppercase mb-1">Table</span>
                        <span class="text-5xl font-black font-headline text-primary">04</span>
                    </div>
                    <div class="flex items-center gap-2 bg-secondary/10 px-3 py-1.5 rounded-full">
                        <div
                            class="w-2 h-2 rounded-full bg-secondary animate-pulse shadow-[0_0_8px_rgba(171,205,204,1)]">
                        </div>
                        <span class="text-[10px] font-bold text-secondary uppercase">Active</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 mb-8">
                    <img class="w-16 h-16 rounded-xl object-cover ring-2 ring-primary/20"
                        data-alt="close-up of a retro gaming console controller with warm nostalgic lighting and soft background bokeh"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGFQFLCEbu-Etc91xFSHjHjXB0dpgVCTdOlWQlSAM8k51RYembpnFe9OPnVGUEvTN-tKWw4dVLfbQ9LtRPcRxgpq1iPSDkkdKe_XQRx-RCKhW1ngc_dzzVg0oeY_hNgvYO65fvl0nkBkcgifJ7N4Q2bffox-bdp5dFkUhuYMoqbkOaNgy7Intw4TzstfL1C03OsEKTfsopzTAD5xKr-dl8Cd8shH2WB0Bkv4hm2scdGV-isWIbkNcMvjgWnBAvXaCEmpyP40TceDqy">
                    <div>
                        <h4 class="font-headline font-bold text-lg leading-tight">FC 24 Tournament</h4>
                        <div class="flex items-center gap-2 text-secondary/70 text-sm mt-1">
                            <span class="material-symbols-outlined text-base" data-icon="groups">groups</span>
                            <span>2 Players</span>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-container-low rounded-xl p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-secondary/50 font-bold uppercase">Time Elapsed</span>
                            <span class="text-2xl font-headline font-bold tabular-nums">00:22:09</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full border-2 border-secondary/20 border-t-secondary flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-sm"
                                data-icon="update">update</span>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full bg-error-container/20 hover:bg-error-container text-error font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl" data-icon="stop_circle">stop_circle</span>
                    End Session
                </button>
            </div>
            <!-- Active Table 05 -->
            <div
                class="bg-surface-container rounded-xl p-6 glow-teal border-t-2 border-secondary/20 relative group transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-secondary tracking-widest uppercase mb-1">Table</span>
                        <span class="text-5xl font-black font-headline text-primary">05</span>
                    </div>
                    <div class="flex items-center gap-2 bg-secondary/10 px-3 py-1.5 rounded-full">
                        <div
                            class="w-2 h-2 rounded-full bg-secondary animate-pulse shadow-[0_0_8px_rgba(171,205,204,1)]">
                        </div>
                        <span class="text-[10px] font-bold text-secondary uppercase">Active</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 mb-8">
                    <img class="w-16 h-16 rounded-xl object-cover ring-2 ring-primary/20"
                        data-alt="dramatic close-up of high-performance gaming hardware with glowing internal RGB components in deep purple and cyan"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAoAhln3gX0lmgKsd0s3bK3oIsXvKJ7xqHRmlUkZFbfuSOZxVDvAqTG8rE-gh4ZabcezA4gRHAMNwX0x5NFEjFslMTNEA4OJwQUHnnqnDx2Up5QHSEgUDcpgXxaZbqo6UBX3Vze0raAf_usCwjizxR1IpTOIgyRO1hm1p9X_2N2nuWZTlJ_z8m7qHp-6Sdvj3nP7SEWdwIxIbLKDO26I6YF9EC_4g-5FGG-MRoM8zH-9hlj8VjRMdnYTVBZst4yKzR2u7qZkB4NG6ve">
                    <div>
                        <h4 class="font-headline font-bold text-lg leading-tight">League of Legends</h4>
                        <div class="flex items-center gap-2 text-secondary/70 text-sm mt-1">
                            <span class="material-symbols-outlined text-base" data-icon="groups">groups</span>
                            <span>10 Players</span>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-container-low rounded-xl p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-secondary/50 font-bold uppercase">Time Elapsed</span>
                            <span class="text-2xl font-headline font-bold tabular-nums">00:55:30</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full border-2 border-secondary/20 border-t-secondary flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary text-sm"
                                data-icon="update">update</span>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full bg-error-container/20 hover:bg-error-container text-error font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl" data-icon="stop_circle">stop_circle</span>
                    End Session
                </button>
            </div>
            <!-- Empty Table 06 -->
            <div
                class="bg-surface-container-low/50 border-2 border-dashed border-white/5 rounded-xl p-6 relative group hover:bg-surface-container transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex flex-col">
                        <span
                            class="text-xs font-bold text-on-surface-variant/40 tracking-widest uppercase mb-1">Table</span>
                        <span class="text-5xl font-black font-headline text-on-surface-variant/20">06</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 px-3 py-1.5 rounded-full">
                        <div class="w-2 h-2 rounded-full bg-on-surface-variant/20"></div>
                        <span class="text-[10px] font-bold text-on-surface-variant/40 uppercase">Empty</span>
                    </div>
                </div>
                <div class="h-40 flex flex-col items-center justify-center text-center px-4 mb-6">
                    <span class="material-symbols-outlined text-4xl text-on-surface-variant/20 mb-2"
                        data-icon="desktop_access_disabled">desktop_access_disabled</span>
                    <p class="text-sm text-on-surface-variant/40 font-medium">No active session at this table.</p>
                </div>
                <button
                    class="w-full bg-surface-container-highest hover:bg-primary hover:text-on-primary text-on-surface-variant font-bold py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl" data-icon="play_circle">play_circle</span>
                    Start Session
                </button>
            </div>
        </div>
        <!-- Floating Quick Action for Admin -->
        <button
            class="fixed bottom-10 right-10 bg-primary text-on-primary w-16 h-16 rounded-full flex items-center justify-center shadow-[0_20px_50px_rgba(233,193,118,0.3)] hover:scale-110 active:scale-95 transition-all z-50">
            <span class="material-symbols-outlined text-3xl font-bold" data-icon="add_task">add_task</span>
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