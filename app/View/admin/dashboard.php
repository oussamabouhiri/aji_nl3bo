<?php
$baseUrl = \App\Helper\Utility::baseUrl();
?>
<!DOCTYPE html>
<html class="dark" lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Aji L3bo Caf&eacute; - Admin Console</title>
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
    html { font-size: 16px; }
    body { font-size: 1rem; font-family: 'Inter', sans-serif; }
    h1, h2, h3, .headline { font-family: 'Manrope', sans-serif; }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    .glass-panel { background: rgba(32, 31, 31, 0.6); backdrop-filter: blur(16px); }
    .brass-gradient { background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%); }
  </style>
</head>

<body class="bg-background text-on-surface">
  <!-- SideNavBar -->
  <aside class="h-screen w-64 fixed left-0 top-0 bg-[#0e0e0e] flex flex-col py-6 shadow-[16px_0_40px_-4px_rgba(0,0,0,0.5)] z-50 overflow-y-auto">
    <div class="px-8">
      <div class="text-xl font-bold text-[#e9c176] mb-8">Aji L3bo</div>
      <div class="flex items-center space-x-3 mb-10">
        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-[#412d00] font-bold">A</div>
        <div>
          <p class="text-on-surface font-headline font-bold text-sm leading-none">Admin Console</p>
          <p class="text-secondary text-xs mt-1">Super User</p>
        </div>
      </div>
    </div>
    <nav class="flex-1 space-y-1 px-2">
      <a class="bg-gradient-to-r from-[#e9c176] to-[#bd9852] text-[#412d00] rounded-full mx-2 px-4 py-3 font-bold flex items-center space-x-3" href="<?= $baseUrl ?>admin/dashboard">
        <span class="material-symbols-outlined">dashboard</span>
        <span class="font-label">Dashboard</span>
      </a>
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>admin/games">
        <span class="material-symbols-outlined">sports_esports</span>
        <span class="font-label">Games</span>
      </a>
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>categories">
        <span class="material-symbols-outlined">category</span>
        <span class="font-label">Categories</span>
      </a>
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>admin/reservations">
        <span class="material-symbols-outlined">event_available</span>
        <span class="font-label">Reservations</span>
      </a>
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>admin/sessions">
        <span class="material-symbols-outlined">timer</span>
        <span class="font-label">Active Sessions</span>
      </a>
      <a class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3" href="<?= $baseUrl ?>admin/session-history">
        <span class="material-symbols-outlined">history</span>
        <span class="font-label">History</span>
      </a>
    </nav>
    <div class="px-4 mt-auto pt-6 space-y-1">
      <a href="<?= $baseUrl ?>logout" class="text-[#abcdcc] hover:bg-[#353534]/50 mx-2 px-4 py-3 rounded-full transition-all hover:text-white flex items-center space-x-3">
        <span class="material-symbols-outlined">logout</span>
        <span class="font-label">Logout</span>
      </a>
    </div>
  </aside>
  <!-- Main Content Area -->
  <main class="ml-64 p-10 min-h-screen">
    <!-- Header -->
    <header class="flex justify-between items-end mb-12">
      <div>
        <h1 class="text-5xl font-extrabold tracking-tighter text-on-surface mb-2">Welcome, Admin</h1>
        <p class="text-secondary font-medium italic">The Digital Curator / Dashboard</p>
      </div>
      <div class="flex items-center space-x-4">
        <div class="text-right">
          <p class="text-xs uppercase tracking-widest text-outline">Current Time</p>
          <p class="text-xl font-headline font-bold text-primary"><?= date('H:i') ?> PM</p>
        </div>
      </div>
    </header>
    <!-- Stats Bento Grid -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
      <div class="bg-surface-container p-8 rounded-xl shadow-2xl relative overflow-hidden group">
        <div class="relative z-10">
          <p class="text-outline-variant font-label text-sm uppercase tracking-widest mb-4">Total Reservations Today</p>
          <h3 class="text-5xl font-headline font-extrabold text-on-surface">24</h3>
          <div class="mt-4 flex items-center text-primary text-sm font-semibold">
            <span class="material-symbols-outlined mr-1">trending_up</span>
            <span>12% from yesterday</span>
          </div>
        </div>
        <span
          class="material-symbols-outlined absolute -bottom-4 -right-4 text-primary/10 text-9xl transition-transform group-hover:scale-110 duration-500"
          data-icon="calendar_today" style="font-variation-settings: 'FILL' 1;">calendar_today</span>
      </div>
      <div class="bg-surface-container-high p-8 rounded-xl shadow-2xl relative overflow-hidden group">
        <div class="relative z-10">
          <p class="text-outline-variant font-label text-sm uppercase tracking-widest mb-4">Active Sessions</p>
          <h3 class="text-5xl font-headline font-extrabold text-on-surface">12</h3>
          <div class="mt-4 flex items-center text-primary text-sm font-semibold">
            <div class="w-2 h-2 rounded-full bg-primary mr-2 animate-pulse shadow-[0_0_8px_#e9c176]"></div>
            <span>Live Now</span>
          </div>
        </div>
        <span
          class="material-symbols-outlined absolute -bottom-4 -right-4 text-primary/10 text-9xl transition-transform group-hover:scale-110 duration-500"
          data-icon="play_circle" style="font-variation-settings: 'FILL' 1;">play_circle</span>
      </div>
      <div class="bg-surface-container p-8 rounded-xl shadow-2xl relative overflow-hidden group">
        <div class="relative z-10">
          <p class="text-outline-variant font-label text-sm uppercase tracking-widest mb-4">Available Tables</p>
          <h3 class="text-5xl font-headline font-extrabold text-on-surface">06</h3>
          <div class="mt-4 flex items-center text-primary text-sm font-semibold">
            <span>Station 1-5, 8</span>
          </div>
        </div>
        <span
          class="material-symbols-outlined absolute -bottom-4 -right-4 text-primary/10 text-9xl transition-transform group-hover:scale-110 duration-500"
          data-icon="table_restaurant" style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
      </div>
    </section>
    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      <!-- Reservations Table Section -->
      <div class="lg:col-span-2 space-y-6">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-headline font-extrabold tracking-tight">Today's Reservations</h2>
          <button class="text-primary font-bold text-sm hover:underline">View All</button>
        </div>
        <div class="bg-surface-container rounded-xl overflow-hidden shadow-2xl">
          <table class="w-full text-left">
            <thead>
              <tr class="bg-surface-container-highest/30">
                <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-outline">Customer Name</th>
                <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-outline">Time</th>
                <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-outline text-center">Table #</th>
                <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-outline">Status</th>
                <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-outline text-right">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/10">
              <tr class="hover:bg-white/5 transition-colors group">
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div
                      class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-secondary font-bold text-xs">
                      AS</div>
                    <span class="font-medium">Amine Sefrioui</span>
                  </div>
                </td>
                <td class="px-6 py-5 text-on-surface-variant">14:30 PM</td>
                <td class="px-6 py-5 text-center font-headline font-bold text-primary">04</td>
                <td class="px-6 py-5">
                  <span
                    class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-tighter bg-primary/10 text-primary border border-primary/20">Confirmed</span>
                </td>
                <td class="px-6 py-5 text-right">
                  <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 hover:bg-primary/20 rounded-lg text-primary"><span
                        class="material-symbols-outlined text-sm">edit</span></button>
                    <button class="p-2 hover:bg-error/20 rounded-lg text-error"><span
                        class="material-symbols-outlined text-sm">close</span></button>
                  </div>
                </td>
              </tr>
              <tr class="hover:bg-white/5 transition-colors group">
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div
                      class="w-8 h-8 rounded-full bg-tertiary-container flex items-center justify-center text-tertiary font-bold text-xs">
                      KL</div>
                    <span class="font-medium">Karima Lahlou</span>
                  </div>
                </td>
                <td class="px-6 py-5 text-on-surface-variant">15:00 PM</td>
                <td class="px-6 py-5 text-center font-headline font-bold text-primary">09</td>
                <td class="px-6 py-5">
                  <span
                    class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-tighter bg-secondary/10 text-secondary border border-secondary/20">Pending</span>
                </td>
                <td class="px-6 py-5 text-right">
                  <div class="flex justify-end space-x-2">
                    <button
                      class="brass-gradient px-4 py-1.5 rounded-full text-on-primary text-xs font-bold shadow-lg shadow-primary/20">Confirm</button>
                  </div>
                </td>
              </tr>
              <tr class="hover:bg-white/5 transition-colors group">
                <td class="px-6 py-5">
                  <div class="flex items-center space-x-3">
                    <div
                      class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-secondary font-bold text-xs">
                      OM</div>
                    <span class="font-medium">Omar Mansouri</span>
                  </div>
                </td>
                <td class="px-6 py-5 text-on-surface-variant">16:15 PM</td>
                <td class="px-6 py-5 text-center font-headline font-bold text-primary">02</td>
                <td class="px-6 py-5">
                  <span
                    class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-tighter bg-primary/10 text-primary border border-primary/20">Confirmed</span>
                </td>
                <td class="px-6 py-5 text-right">
                  <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 hover:bg-primary/20 rounded-lg text-primary"><span
                        class="material-symbols-outlined text-sm">edit</span></button>
                    <button class="p-2 hover:bg-error/20 rounded-lg text-error"><span
                        class="material-symbols-outlined text-sm">close</span></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Recent History Section -->
      <div class="space-y-6">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-headline font-extrabold tracking-tight">Recent History</h2>
        </div>
        <div class="space-y-4">
          <div
            class="bg-surface-container-low p-5 rounded-xl flex items-center justify-between group hover:translate-x-2 transition-transform duration-300 cursor-default">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 rounded-lg bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">sports_esports</span>
              </div>
              <div>
                <p class="font-bold text-on-surface">PS5 - Station 3</p>
                <p class="text-xs text-secondary">Session ended &bull; 2h 15m</p>
              </div>
            </div>
            <div class="text-right">
              <p class="font-headline font-bold text-primary">145 DH</p>
            </div>
          </div>
          <div
            class="bg-surface-container-low p-5 rounded-xl flex items-center justify-between group hover:translate-x-2 transition-transform duration-300 cursor-default">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 rounded-lg bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">coffee</span>
              </div>
              <div>
                <p class="font-bold text-on-surface">Kitchen Order</p>
                <p class="text-xs text-secondary">Table 05 &bull; 3 items</p>
              </div>
            </div>
            <div class="text-right">
              <p class="font-headline font-bold text-primary">85 DH</p>
            </div>
          </div>
          <div
            class="bg-surface-container-low p-5 rounded-xl flex items-center justify-between group hover:translate-x-2 transition-transform duration-300 cursor-default">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 rounded-lg bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">group</span>
              </div>
              <div>
                <p class="font-bold text-on-surface">Billiards - Room A</p>
                <p class="text-xs text-secondary">Session ended &bull; 1h 00m</p>
              </div>
            </div>
            <div class="text-right">
              <p class="font-headline font-bold text-primary">60 DH</p>
            </div>
          </div>
          <!-- Decorative History Card Bleed -->
          <div class="bg-surface-container-low p-5 rounded-xl flex items-center justify-between opacity-50 blur-[1px]">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 rounded-lg bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">sports_esports</span>
              </div>
              <div>
                <p class="font-bold text-on-surface">PC - Station 12</p>
                <p class="text-xs text-secondary">Session ended &bull; 4h 00m</p>
              </div>
            </div>
            <div class="text-right">
              <p class="font-headline font-bold text-primary">200 DH</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Contextual FAB (Authority: Shared Components Logic) - Shown for Admin Dashboard -->
  <button
    class="fixed bottom-8 right-8 brass-gradient w-16 h-16 rounded-full shadow-[0_20px_50px_rgba(233,193,118,0.3)] flex items-center justify-center group hover:scale-110 transition-transform duration-300 z-50">
    <span class="material-symbols-outlined text-on-primary text-3xl"
      style="font-variation-settings: 'FILL' 1;">add</span>
    <span
      class="absolute right-20 bg-surface-container-highest text-primary px-4 py-2 rounded-lg text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">New
      Reservation</span>
  </button>
</body>

</html>