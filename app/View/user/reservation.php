<!DOCTYPE html>
<html class="dark" lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Aji L3bo - Reserve Your Table</title>
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

    body {
      font-family: 'Inter', sans-serif;
      background-color: #131313;
      color: #e5e2e1;
    }

    .font-headline {
      font-family: 'Manrope', sans-serif;
    }

    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
    }

    .glass-panel {
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
    }

    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>

<body class="bg-background text-on-surface">
  <!-- TopNavBar -->
  <nav
    class="fixed top-0 w-full z-50 bg-[#131313]/80 backdrop-blur-xl flex justify-between items-center px-8 py-4 max-w-full mx-auto shadow-2xl shadow-black/40">
    <div class="flex items-center gap-8">
      <span class="text-2xl font-black tracking-tighter text-[#e9c176]">Aji L3bo</span>
      <div class="hidden md:flex items-center gap-6">
        <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="#">Games</a>
        <a class="text-[#e9c176] border-b-2 border-[#e9c176] pb-1 font-body text-sm" href="#">My Reservations</a>
        <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors font-body text-sm" href="#">Profile</a>
      </div>
    </div>
    <div class="flex items-center gap-6">
      <div class="flex items-center gap-4 text-[#abcdcc]">
        <button class="hover:opacity-80 transition-all duration-300">
          <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
        </button>
      </div>
      <div
        class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center overflow-hidden border-2 border-[#e9c176]/20">
        <img alt="User profile" class="w-full h-full object-cover"
          data-alt="close-up portrait of a professional man in high-end studio lighting with a neutral gray background"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXwXKvwXtGL8h4i6RbVBjRKjPdOl4P78mp6_HdTVWuvxluBqlUs-3-0ncvyQ4FOr99OPXvwezDBUoRyVufddjFl6Aw-5aImvjLMG8IO_obiShv5Ae4b95oXWU5TdAQXrKtdhJ5pN82qX9lK_oXnS9-o9Qqf3ZDl09VK_NzTCuw8eHTeyPrfiQkw1TBDpgma7gWGjvCa9CJB7p0OQWW7d75XzkVlSpquGq5C76S2xMshPJKXVeNEgGTfCX_1Zn3eJ5vxYAhQmYDmAvL">
      </div>
    </div>
  </nav>
  <main class="pt-32 pb-20 px-8 max-w-7xl mx-auto">
    <header class="mb-12">
      <h1 class="text-6xl font-headline font-extrabold tracking-tighter text-on-surface mb-4">Book Your Table.</h1>
      <p class="text-secondary max-w-2xl font-body">Secure your spot at our premium lounge. Select your preferred date,
        time, and session details to enjoy the ultimate gaming experience.</p>
    </header>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      <!-- Left: Selection Area -->
      <div class="lg:col-span-8 space-y-8">
        <!-- Calendar & Time Slot Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <!-- Calendar UI -->
          <section class="bg-surface-container rounded-xl p-6 shadow-2xl shadow-black/20">
            <div class="flex items-center justify-between mb-6">
              <h2 class="font-headline text-xl font-bold text-primary">October 2023</h2>
              <div class="flex gap-2">
                <button class="p-2 hover:bg-surface-container-highest rounded-full text-secondary transition-all">
                  <span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
                </button>
                <button class="p-2 hover:bg-surface-container-highest rounded-full text-secondary transition-all">
                  <span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
                </button>
              </div>
            </div>
            <div class="grid grid-cols-7 gap-2 mb-2">
              <span class="text-center text-[10px] uppercase tracking-widest text-secondary/50 font-bold">Mo</span>
              <span class="text-center text-[10px] uppercase tracking-widest text-secondary/50 font-bold">Tu</span>
              <span class="text-center text-[10px] uppercase tracking-widest text-secondary/50 font-bold">We</span>
              <span class="text-center text-[10px] uppercase tracking-widest text-secondary/50 font-bold">Th</span>
              <span class="text-center text-[10px] uppercase tracking-widest text-secondary/50 font-bold">Fr</span>
              <span class="text-center text-[10px] uppercase tracking-widest text-secondary/50 font-bold">Sa</span>
              <span class="text-center text-[10px] uppercase tracking-widest text-secondary/50 font-bold">Su</span>
            </div>
            <div class="grid grid-cols-7 gap-2">
              <!-- Empty states for alignment -->
              <span></span><span></span><span></span><span></span>
              <!-- Calendar Days -->
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-secondary/30 hover:bg-surface-container-highest transition-all">1</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-secondary/30 hover:bg-surface-container-highest transition-all">2</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-secondary/30 hover:bg-surface-container-highest transition-all">3</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg bg-surface-container-highest text-on-surface">4</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg bg-gradient-to-br from-primary to-on-primary-container text-on-primary font-bold shadow-lg shadow-primary/20">5</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-on-surface hover:bg-surface-container-highest transition-all">6</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-on-surface hover:bg-surface-container-highest transition-all">7</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-on-surface hover:bg-surface-container-highest transition-all">8</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-on-surface hover:bg-surface-container-highest transition-all">9</button>
              <button
                class="w-full aspect-square flex items-center justify-center rounded-lg text-on-surface hover:bg-surface-container-highest transition-all">10</button>
              <!-- ... abbreviated for space ... -->
            </div>
          </section>
          <!-- Time Slot Picker -->
          <section class="bg-surface-container rounded-xl p-6 shadow-2xl shadow-black/20">
            <div class="flex items-center justify-between mb-6">
              <h2 class="font-headline text-xl font-bold text-primary">Available Slots</h2>
              <span class="text-[10px] text-secondary/50 font-bold uppercase tracking-widest">October 05, 2023</span>
            </div>
            <div class="grid grid-cols-2 gap-3">
              <button
                class="flex flex-col items-center justify-center py-4 bg-surface-container-highest border border-primary/20 rounded-xl hover:border-primary/50 transition-all">
                <span class="text-on-surface font-bold">14:00</span>
                <div class="flex items-center gap-1.5 mt-1">
                  <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.6)]"></div>
                  <span class="text-[10px] text-secondary font-medium">Available</span>
                </div>
              </button>
              <button
                class="flex flex-col items-center justify-center py-4 bg-surface-container-highest border border-primary rounded-xl ring-2 ring-primary/20 transition-all">
                <span class="text-primary font-bold">15:00</span>
                <div class="flex items-center gap-1.5 mt-1">
                  <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.6)]"></div>
                  <span class="text-[10px] text-secondary font-medium">Available</span>
                </div>
              </button>
              <button
                class="flex flex-col items-center justify-center py-4 bg-surface-container-low opacity-50 cursor-not-allowed rounded-xl transition-all">
                <span class="text-secondary/50 font-bold">16:00</span>
                <div class="flex items-center gap-1.5 mt-1">
                  <div class="w-2 h-2 rounded-full bg-error shadow-[0_0_8px_rgba(255,180,171,0.6)]"></div>
                  <span class="text-[10px] text-secondary/50 font-medium">Occupied</span>
                </div>
              </button>
              <button
                class="flex flex-col items-center justify-center py-4 bg-surface-container-highest border border-primary/20 rounded-xl hover:border-primary/50 transition-all">
                <span class="text-on-surface font-bold">17:00</span>
                <div class="flex items-center gap-1.5 mt-1">
                  <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.6)]"></div>
                  <span class="text-[10px] text-secondary font-medium">Available</span>
                </div>
              </button>
              <button
                class="flex flex-col items-center justify-center py-4 bg-surface-container-highest border border-primary/20 rounded-xl hover:border-primary/50 transition-all">
                <span class="text-on-surface font-bold">18:00</span>
                <div class="flex items-center gap-1.5 mt-1">
                  <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.6)]"></div>
                  <span class="text-[10px] text-secondary font-medium">Available</span>
                </div>
              </button>
              <button
                class="flex flex-col items-center justify-center py-4 bg-surface-container-highest border border-primary/20 rounded-xl hover:border-primary/50 transition-all">
                <span class="text-on-surface font-bold">19:00</span>
                <div class="flex items-center gap-1.5 mt-1">
                  <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.6)]"></div>
                  <span class="text-[10px] text-secondary font-medium">Available</span>
                </div>
              </button>
            </div>
          </section>
        </div>
        <!-- Booking Form -->
        <section class="bg-surface-container rounded-xl p-8 shadow-2xl shadow-black/20">
          <h2 class="font-headline text-2xl font-bold text-primary mb-8">Personal Details</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-2">
              <label class="text-sm font-label text-secondary block">Full Name</label>
              <input
                class="w-full bg-surface-container-highest border-none rounded-xl py-4 px-6 text-on-surface focus:ring-2 focus:ring-primary/50 placeholder:text-secondary/30 transition-all"
                placeholder="e.g. Adam Smith" type="text">
            </div>
            <div class="space-y-2">
              <label class="text-sm font-label text-secondary block">Phone Number</label>
              <input
                class="w-full bg-surface-container-highest border-none rounded-xl py-4 px-6 text-on-surface focus:ring-2 focus:ring-primary/50 placeholder:text-secondary/30 transition-all"
                placeholder="+212 600 000 000" type="tel">
            </div>
            <div class="space-y-2 md:col-span-2">
              <label class="text-sm font-label text-secondary block">Number of People</label>
              <div class="flex items-center gap-4">
                <button
                  class="w-14 h-14 rounded-xl bg-surface-container-highest flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all shadow-lg shadow-black/20">
                  <span class="material-symbols-outlined" data-icon="remove">remove</span>
                </button>
                <div class="flex-1 bg-surface-container-highest rounded-xl h-14 flex items-center justify-center">
                  <span class="text-xl font-bold text-on-surface">4</span>
                </div>
                <button
                  class="w-14 h-14 rounded-xl bg-surface-container-highest flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all shadow-lg shadow-black/20">
                  <span class="material-symbols-outlined" data-icon="add">add</span>
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Right: Summary Card -->
      <aside class="lg:col-span-4 sticky top-32">
        <div class="bg-surface-container-highest rounded-2xl overflow-hidden shadow-2xl shadow-black/40">
          <div class="relative h-48">
            <img alt="Selected Game" class="w-full h-full object-cover"
              data-alt="vibrant neon-lit gaming station with modern pc peripherals and a sleek chair in a moody room with blue and purple highlights"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuACIUNPxCMFJNkic1lboNWOQoDyU-lN7plWYtklRnN398RgJH1tNN3F3O_v1eh7v3CPIM5G8c3uRvf_qOfjS1ohU_wAKPtwH9JVl0eYOC0tVIR2MtRS0StsC1rT2g2LK7nB6xqYjCtbZ4nu0aVhI9ZmapVehq0_c5oA-Lkc_vf-5RutHDEc9Cz1Jw5FocrxE9AVa5CFCzTNpRj8zXf54pIrD8DV3jI25ZvSl-jQ4GBMEXDcmKEYz6qBsSVwdIF6tt6TjqfBUW0LepOp">
            <div
              class="absolute inset-0 bg-gradient-to-t from-surface-container-highest via-transparent to-transparent">
            </div>
            <div class="absolute bottom-4 left-6">
              <span
                class="inline-block px-3 py-1 bg-primary/20 text-primary text-[10px] font-bold tracking-widest uppercase rounded-full backdrop-blur-md border border-primary/20 mb-2">Featured
                Game</span>
              <h3 class="text-2xl font-headline font-bold text-on-surface">Catan: Starfarers</h3>
            </div>
          </div>
          <div class="p-8 space-y-6">
            <div class="space-y-4">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 text-secondary">
                  <span class="material-symbols-outlined text-sm" data-icon="calendar_today">calendar_today</span>
                  <span class="text-sm font-label">Date</span>
                </div>
                <span class="text-on-surface font-bold">Oct 05, 2023</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 text-secondary">
                  <span class="material-symbols-outlined text-sm" data-icon="schedule">schedule</span>
                  <span class="text-sm font-label">Time</span>
                </div>
                <span class="text-on-surface font-bold">15:00 - 17:00</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 text-secondary">
                  <span class="material-symbols-outlined text-sm" data-icon="group">group</span>
                  <span class="text-sm font-label">Guests</span>
                </div>
                <span class="text-on-surface font-bold">4 Players</span>
              </div>
            </div>
            <div class="pt-6 border-t border-outline-variant/15">
              <div class="flex items-center justify-between mb-8">
                <span class="text-secondary font-label">Total Estimate</span>
                <span class="text-3xl font-headline font-extrabold text-primary">120 MAD</span>
              </div>
              <button
                class="w-full py-5 bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] font-headline font-black text-lg rounded-full shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all duration-300">
                Confirm Reservation
              </button>
              <p class="text-center text-[10px] text-secondary/40 mt-4 leading-relaxed">
                By confirming, you agree to our terms of service. No-shows will be charged a 50% cancellation fee.
              </p>
            </div>
          </div>
        </div>
        <!-- Assistance Card -->
        <div class="mt-6 p-6 rounded-2xl bg-secondary-container/10 border border-secondary/10 flex items-center gap-4">
          <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-secondary">
            <span class="material-symbols-outlined" data-icon="support_agent">support_agent</span>
          </div>
          <div>
            <h4 class="font-bold text-on-surface text-sm">Need help?</h4>
            <p class="text-xs text-secondary">Contact our lounge concierge.</p>
          </div>
          <button class="ml-auto text-primary text-sm font-bold">Call</button>
        </div>
      </aside>
    </div>
  </main>
  <!-- Success Toast (Visual Reference Only) -->
  <div
    class="fixed bottom-8 right-8 hidden flex items-center gap-4 bg-surface-container-highest p-4 rounded-2xl shadow-2xl border border-primary/20">
    <div class="w-10 h-10 rounded-full bg-emerald-400/20 flex items-center justify-center text-emerald-400">
      <span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
    </div>
    <div>
      <p class="text-on-surface font-bold text-sm">Reservation Saved!</p>
      <p class="text-secondary text-xs">We'll see you on Oct 5th.</p>
    </div>
  </div>
</body>

</html>