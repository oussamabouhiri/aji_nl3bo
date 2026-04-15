<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register | The Tactile Archive</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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

        .brass-gradient {
            background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%);
        }

        .glass-panel {
            background: rgba(32, 31, 31, 0.6);
            backdrop-filter: blur(20px);
        }

        .ghost-border {
            outline: 1px solid rgba(65, 72, 72, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen relative overflow-x-hidden flex flex-col">
    <!-- TopNavBar -->
    <header class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-8 py-6 bg-transparent">
        <div class="text-2xl font-bold tracking-tighter text-[#e9c176]">The Tactile Archive</div>
        <div class="flex items-center gap-6">
            <button class="text-teal-100/70 hover:text-[#e9c176] transition-colors duration-300">
                <span class="material-symbols-outlined">help_outline</span>
            </button>
        </div>
    </header>
    <!-- SideNavBar (Suppressed for Transactional Page) -->
    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center relative px-6 py-24">
        <!-- Immersive Background Image -->
        <div class="fixed inset-0 z-0">
            <img class="w-full h-full object-cover opacity-30"
                data-alt="atmospheric interior of a luxurious board game cafe with leather seating, warm brass lighting, and floor-to-ceiling shelves of vintage games"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlwwKaoxRaYnyc1-NhaiPTmk3wXizNlwUGnYIvNpLzV4HxY5RtnyFG7iKFX7gNktNcPlo1ffxCTxJa2mbZVCF2Lu8JAs7X_JpF6Pkw4H6R4hUMbHBEgMDHnp58eZDBMqcrpxTIF1yyKt0jefM1fApddp-g7Cz7TGj6OlEW7uMKK6rIhD9hqUqmCKRHAwn1s4QaU98r6HHH5oRGNXuwysO4Uto0_yAeMqXXI_A7flvyNSZxDthB3v4GnDxE-ZMldg9R8LvhvFj_dtum">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-background/50"></div>
        </div>
        <div class="relative z-10 w-full max-w-xl">
            <!-- Registration Card -->
            <div class="glass-panel p-4 md:p-6 rounded-lg shadow-2xl shadow-black/50 relative overflow-hidden">
                <div class="mb-10 text-center md:text-left">
                    <p class="text-primary font-headline tracking-widest text-xs uppercase mb-2">Initiate Access</p>
                    <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-on-surface mb-3">The Archive awaits.
                    </h1>
                    <p class="text-secondary opacity-70 font-body">Join our curated circle of enthusiasts and curators.
                    </p>
                </div>
                <form method="POST" action="<?= BASE_URL ?>/register" class="space-y-4">
                    <?php if (isset($error)): ?>
                    <div class="bg-error-container/20 border border-error/30 rounded-xl p-4 text-error text-sm">
                        <?= htmlspecialchars($error) ?>
                    </div>
                    <?php endif; ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label
                                class="text-xs font-headline uppercase tracking-widest text-primary/80 font-bold ml-1">Full
                                Name</label>
                            <div class="relative">
                                <input
                                    class="w-full bg-surface-container-lowest border-none rounded-2xl py-3 px-4 text-on-surface placeholder:text-outline/30 focus:ring-1 focus:ring-primary/40 transition-all duration-300"
                                    placeholder="Alexander Thorne" type="text" name="name" required>
                            </div>
                        </div>
                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label
                                class="text-xs font-headline uppercase tracking-widest text-primary/80 font-bold ml-1">Phone
                                Number</label>
                            <div class="relative">
                                <input
                                    class="w-full bg-surface-container-lowest border-none rounded-2xl py-3 px-4 text-on-surface placeholder:text-outline/30 focus:ring-1 focus:ring-primary/40 transition-all duration-300"
                                    placeholder="+212 600 000 000" type="tel" name="phone">
                            </div>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="space-y-2">
                         <label class="text-xs font-headline uppercase tracking-widest text-primary/80 font-bold ml-1">Email Address</label>
                         <div class="relative">
                             <input
                                 class="w-full bg-surface-container-lowest border-none rounded-2xl py-3 px-4 text-on-surface placeholder:text-outline/30 focus:ring-1 focus:ring-primary/40 transition-all duration-300"
                                 placeholder="curator@aji-l3bo.com" type="email" name="email" required>
                         </div>
                    </div>
                    <!-- Password -->
                    <div class="space-y-2">
                        <label class="text-xs font-headline uppercase tracking-widest text-primary/80 font-bold ml-1">Password</label>
                        <div class="relative">
                            <input
                                class="w-full bg-surface-container-lowest border-none rounded-2xl py-3 px-4 text-on-surface placeholder:text-outline/30 focus:ring-1 focus:ring-primary/40 transition-all duration-300"
                                placeholder="••••••••••••" type="password" name="password" required>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-secondary/40 cursor-pointer">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-secondary text-center pt-2">
                        By registering, you agree to our Terms of Service
                    </p>
                    <!-- Register Button -->
                    <button
                        class="brass-gradient w-full py-4 rounded-full text-on-primary font-headline font-extrabold tracking-widest uppercase text-sm shadow-lg shadow-primary/20 hover:shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2"
                        type="submit">
                        Register
                    </button>
                </form>
                <!-- Footer Link -->
                <div class="mt-8 text-center">
                    <p class="text-secondary/60 text-sm">
                        Already have access?
                        <a class="text-primary font-bold hover:underline ml-1" href="<?= BASE_URL ?>/login">Sign In</a>
                    </p>
                </div>
            </div>
            <!-- Aesthetic Accent -->
            <div class="mt-12 flex justify-between items-center px-4 opacity-50">
                <div class="h-[1px] w-12 bg-outline-variant"></div>
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-primary text-sm"
                        style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="text-[10px] uppercase tracking-[0.4em] text-secondary">Aji L3bo Caf&eacute;</span>
                    <span class="material-symbols-outlined text-primary text-sm"
                        style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <div class="h-[1px] w-12 bg-outline-variant"></div>
            </div>
        </div>
    </main>
</body>

</html>