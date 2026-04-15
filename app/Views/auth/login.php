<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sign In | The Tactile Archive</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <style>
        html {
            font-size: 16px;
        }

        body {
            font-size: 1rem;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }

        .brass-gradient {
            background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%);
        }

        .glass-panel {
            background: rgba(32, 31, 31, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .text-glow:hover {
            text-shadow: 0 0 15px rgba(233, 193, 118, 0.4);
        }
    </style>
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
</head>

<body
    class="bg-surface text-on-surface font-body selection:bg-primary/30 selection:text-primary min-h-screen relative overflow-x-hidden">
    <!-- Hero Background Immersive Overlay -->
    <div class="fixed inset-0 z-0">
        <div class="absolute inset-0 bg-surface/40 z-10 backdrop-blur-sm"></div>
        <img alt="Luxury Board Game Background" class="w-full h-full object-cover grayscale opacity-40"
            data-alt="Blurred atmospheric shot of a luxury board game cafe with wooden tables, soft brass lighting, and premium game pieces in shallow focus"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAY14X5G68ccSloOlC0U8TpsBKggiEmxgDgzEIc4Qc1c0k94MzLal2WOJ5YNFZ3iX1_xI7gWKBEI77arU_lRgKWlBtacprbhngpMr0uofL-GuKj10oCbZYHyJ07ne-hfsZAy7pfbfUcbTrH356RepIlIgyxagxaout5aubsh9fU0D3S4TUE1kJj4D-eGim9ofZY-QRPfoOUtQy9Y5b6gqh8DEyMKu6qHlrtE5gCZw_rNNt9HZ8J0D51o2H487ora1mDGVgLmN4ZxTen">
    </div>
    <!-- Navigation suppressed per Destination Rule (Transactional Page) -->
    <main class="relative z-20 flex min-h-screen items-center justify-center p-6 sm:p-12">
        <div class="w-full max-w-[1200px] grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Branding/Editorial Column -->
            <div class="hidden lg:flex flex-col space-y-8 pr-12">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-[1px] bg-primary"></div>
                    <span class="text-primary font-headline tracking-[0.3em] uppercase text-xs font-bold">Aji L3bo Café</span>
                </div>
                <h1 class="font-headline text-7xl font-extrabold tracking-tighter leading-none text-on-surface">
                    The <br> <span class="text-primary italic">Tactile</span> <br> Archive
                </h1>
                <p class="text-secondary max-w-md text-lg font-light leading-relaxed">
                    Welcome back to the curated board gaming experience. Your collection, your strategy, and your legacy await within the archive.
                </p>
            </div>
            <!-- Login Form Column -->
            <div class="flex justify-center lg:justify-end">
                <div
                    class="glass-panel w-full max-w-md p-8 md:p-12 rounded-[2rem] shadow-2xl shadow-black/80 border border-outline-variant/10 relative overflow-hidden">
                    <!-- Subtle Glow Decorative Element -->
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-primary/10 rounded-full blur-[80px]"></div>
                    <div class="mb-10 text-center lg:text-left">
                        <h2 class="font-headline text-3xl font-bold text-on-surface mb-2">Sign In</h2>
                        <p class="text-outline text-sm">Enter your credentials to access your table.</p>
                    </div>
                    <form class="space-y-6">
                        <!-- Email Field -->
                        <div class="space-y-2 group">
                            <label
                                class="text-xs font-headline uppercase tracking-widest text-primary/80 font-bold ml-1">Email
                                Address
                            </label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline/50 group-focus-within:text-primary transition-colors">mail</span>
                                <input
                                    class="w-full bg-surface-container-lowest border-none rounded-2xl py-4 pl-12 pr-4 text-on-surface placeholder:text-outline/30 focus:ring-1 focus:ring-primary/40 transition-all duration-300"
                                    placeholder="curator@archive.com" type="email">
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="space-y-2 group">
                            <div class="flex justify-between items-center ml-1">
                                <label
                                    class="text-xs font-headline uppercase tracking-widest text-primary/80 font-bold">Password</label>
                                <a class="text-[10px] uppercase tracking-widest text-outline hover:text-primary transition-colors font-bold"
                                    href="#">Forgot Password?</a>
                            </div>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline/50 group-focus-within:text-primary transition-colors">lock</span>
                                <input
                                    class="w-full bg-surface-container-lowest border-none rounded-2xl py-4 pl-12 pr-4 text-on-surface placeholder:text-outline/30 focus:ring-1 focus:ring-primary/40 transition-all duration-300"
                                    placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" type="password">
                            </div>
                        </div>
                        <!-- Sign In Button -->
                        <div class="pt-4">
                            <button
                                class="brass-gradient w-full py-4 rounded-full text-on-primary font-headline font-extrabold tracking-widest uppercase text-sm shadow-lg shadow-primary/20 hover:shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2">
                                Sign In
                                <span class="material-symbols-outlined"
                                    style="font-variation-settings: 'wght' 700;">arrow_right_alt</span>
                            </button>
                        </div>
                    </form>
                    <div class="mt-10 text-center">
                        <p class="text-outline text-sm">
                            New to the Archive?
                            <a class="text-primary font-bold ml-1 hover:underline underline-offset-4 text-glow transition-all"
                                href="#">Create an Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="fixed bottom-4 w-full text-center">
        <p class="text-[10px] text-outline/40 uppercase tracking-[0.4em] font-bold">&copy; 2024 The Tactile Archive &bull; Est. Aji L3bo</p>
    </div>
</body>

</html>