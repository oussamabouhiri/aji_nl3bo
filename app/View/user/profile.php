<?php
$baseUrl = \App\Helper\Utility::baseUrl();
$user = \App\Service\AuthService::user();
$userName = $user['name'] ?? 'User';
$userEmail = $_SESSION['user_email'] ?? '';
$userPhone = $_SESSION['user_phone'] ?? '';
$userImage = $_SESSION['user_image'] ?? '';
$userRole = $user['role'] ?? 'user';
?>
<!DOCTYPE html>
<html class="dark" lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Profile | Aji L3bo</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "tertiary-container": "#453214", "tertiary-fixed": "#feddb3", "inverse-surface": "#e5e2e1",
            "surface-container-highest": "#353534", "surface-container-high": "#2a2a2a", "secondary-fixed": "#c7e9e8",
            "on-tertiary-fixed": "#281801", "tertiary-fixed-dim": "#e1c299", "surface-tint": "#e9c176",
            "inverse-primary": "#775a19", "primary-fixed": "#ffdea5", "on-surface-variant": "#c1c8c7",
            "primary-container": "#473100", "on-tertiary": "#402d10", "on-error": "#690005",
            "on-secondary-fixed": "#002020", "background": "#131313", "on-primary-fixed-variant": "#5d4201",
            "primary": "#e9c176", "outline": "#8b9292", "on-error-container": "#ffdad6",
            "on-tertiary-container": "#b69a73", "surface": "#131313", "on-surface": "#e5e2e1",
            "error": "#ffb4ab", "primary-fixed-dim": "#e9c176", "error-container": "#93000a",
            "tertiary": "#e1c299", "secondary-fixed-dim": "#abcdcc", "secondary-container": "#2f4e4e",
            "surface-dim": "#131313", "surface-container-lowest": "#0e0e0e", "surface-container-low": "#1c1b1b",
            "on-background": "#e5e2e1", "on-primary": "#412d00", "inverse-on-surface": "#313030",
            "on-primary-container": "#bd9852", "outline-variant": "#414848", "on-tertiary-fixed-variant": "#584324",
            "surface-variant": "#353534", "surface-bright": "#393939", "surface-container": "#201f1f",
            "secondary": "#abcdcc", "on-secondary-fixed-variant": "#2d4c4c", "on-secondary-container": "#9dbfbe",
            "on-primary-fixed": "#261900", "on-secondary": "#153535"
          },
          "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
          "fontFamily": { "headline": ["Manrope"], "body": ["Inter"], "label": ["Inter"] }
        },
      },
    }
  </script>
  <style>
    html { font-size: 16px; }
    body { font-size: 1rem; font-family: 'Inter', sans-serif; }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
    .glass-panel { background: rgba(32, 31, 31, 0.6); backdrop-filter: blur(16px); }
    .brass-gradient { background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%); }
    h1, h2, h3, .font-headline { font-family: 'Manrope', sans-serif; }
  </style>
</head>

<body class="bg-background text-on-background min-h-screen overflow-x-hidden">
  <!-- TopNavBar -->
  <nav class="fixed top-0 w-full z-50 bg-[#131313]/60 backdrop-blur-xl flex justify-between items-center px-8 py-4 max-w-full shadow-[0_16px_40px_-4px_rgba(0,0,0,0.1)]">
    <div class="text-2xl font-bold tracking-tighter text-[#e9c176]">Aji L3bo</div>
    <div class="hidden md:flex items-center gap-8">
      <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors" href="<?= $baseUrl ?>games">Library</a>
      <a class="text-[#abcdcc] hover:text-[#e9c176] transition-colors" href="<?= $baseUrl ?>reservation">Reservations</a>
      <a class="text-[#e9c176] border-b-2 border-[#e9c176] pb-1" href="<?= $baseUrl ?>profile">Profile</a>
    </div>
    <div class="flex items-center gap-4">
      <button class="material-symbols-outlined text-[#abcdcc] hover:text-[#e9c176] transition-all duration-300">notifications</button>
      <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-[#412d00] font-bold">
        <?= strtoupper(substr($userName, 0, 1)) ?>
      </div>
    </div>
  </nav>

  <!-- SideNavBar -->
  <aside class="hidden lg:flex flex-col h-screen w-64 fixed left-0 top-0 bg-[#0e0e0e] py-8 z-40">
    <div class="px-6 mb-12">
      <h1 class="text-[#e9c176] font-black italic text-xl">AJI L3BO</h1>
      <p class="text-secondary text-xs tracking-widest uppercase opacity-60">Customer Portal</p>
    </div>
    <div class="flex-1 px-4 space-y-2">
      <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] opacity-70 hover:bg-[#201f1f] hover:text-[#e9c176] rounded-xl transition-all" href="<?= $baseUrl ?>dashboard">
        <span class="material-symbols-outlined">dashboard</span>
        <span class="font-medium">Dashboard</span>
      </a>
      <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] opacity-70 hover:bg-[#201f1f] hover:text-[#e9c176] rounded-xl transition-all" href="<?= $baseUrl ?>games">
        <span class="material-symbols-outlined">casino</span>
        <span class="font-medium">Game Library</span>
      </a>
      <a class="flex items-center gap-3 px-4 py-3 text-[#abcdcc] opacity-70 hover:bg-[#201f1f] hover:text-[#e9c176] rounded-xl transition-all" href="<?= $baseUrl ?>reservation">
        <span class="material-symbols-outlined">event_note</span>
        <span class="font-medium">My Bookings</span>
      </a>
      <a class="flex items-center gap-3 px-4 py-3 text-[#e9c176] bg-[#201f1f] rounded-r-full font-bold translate-x-1 duration-200" href="<?= $baseUrl ?>profile">
        <span class="material-symbols-outlined">settings</span>
        <span class="font-medium">Settings</span>
      </a>
    </div>
    <div class="mt-auto px-6 space-y-6">
      <div class="p-4 bg-surface-container rounded-2xl border border-outline-variant/10">
        <div class="flex items-center gap-3 mb-2">
          <div class="w-2 h-2 rounded-full bg-primary shadow-[0_0_8px_#e9c176]"></div>
          <span class="text-[10px] uppercase tracking-widest text-primary font-bold">Member</span>
        </div>
        <p class="text-xs text-on-surface-variant leading-relaxed">Welcome to your profile page.</p>
      </div>
      <div class="space-y-1">
        <a class="flex items-center gap-3 px-4 py-2 text-[#abcdcc] opacity-70 hover:text-[#e9c176] transition-colors" href="#">
          <span class="material-symbols-outlined">help</span>
          <span class="text-sm">Support</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-2 text-[#abcdcc] opacity-70 hover:text-[#e9c176] transition-colors" href="<?= $baseUrl ?>logout">
          <span class="material-symbols-outlined">logout</span>
          <span class="text-sm">Logout</span>
        </a>
      </div>
    </div>
  </aside>

  <!-- Main Content Canvas -->
  <main class="lg:pl-64 pt-24 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 py-8 space-y-12">
      <!-- 1. User Header Section -->
      <section class="relative flex flex-col md:flex-row items-end gap-8 bg-surface-container-lowest rounded-[2rem] p-8 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full opacity-10 pointer-events-none">
          <div class="absolute inset-0 brass-gradient rotate-12 translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        </div>
        <div class="relative z-10 w-40 h-40 rounded-3xl overflow-hidden shadow-2xl border-4 border-surface-container bg-primary flex items-center justify-center">
          <?php if (!empty($userImage)): ?>
            <img src="<?= $baseUrl . ltrim($userImage, '/') ?>" alt="Profile" class="w-full h-full object-cover">
          <?php else: ?>
            <span class="text-6xl font-bold text-[#412d00]"><?= strtoupper(substr($userName, 0, 1)) ?></span>
          <?php endif; ?>
        </div>
        <div class="relative z-10 flex-1 space-y-2">
          <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-primary-container text-primary text-[10px] font-bold uppercase tracking-widest">Member</span>
            <span class="text-secondary/50 text-sm font-medium">User Profile</span>
          </div>
          <h1 class="text-5xl font-extrabold tracking-tighter text-on-surface"><?= htmlspecialchars($userName) ?></h1>
          <p class="text-secondary font-medium text-lg italic opacity-80">Welcome to your personal dashboard</p>
        </div>
        <div class="relative z-10 flex gap-3">
          <button onclick="document.getElementById('editProfileModal').showModal()" class="px-6 py-3 rounded-full border border-outline-variant/30 text-secondary hover:bg-surface-container-highest transition-all duration-300 flex items-center gap-2">
            <span class="material-symbols-outlined">edit</span>
            Edit Profile
          </button>
          <a href="<?= $baseUrl ?>reservation" class="brass-gradient px-8 py-3 rounded-full text-on-primary font-bold hover:opacity-90 transition-transform active:scale-95 flex items-center gap-2">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bolt</span>
            Quick Reservation
          </a>
        </div>
      </section>

      <!-- Edit Profile Modal -->
      <dialog id="editProfileModal" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50 w-full max-w-md">
        <h3 class="text-xl font-bold text-primary mb-6">Edit Profile</h3>
        <form method="POST" action="<?= $baseUrl ?>profile/update" enctype="multipart/form-data" class="space-y-4">
          <div class="flex justify-center mb-4">
            <div class="relative w-24 h-24 rounded-full overflow-hidden border-2 border-primary">
              <?php if (!empty($userImage)): ?>
                <img id="preview-image" src="<?= $baseUrl . ltrim($userImage, '/') ?>" alt="Profile" class="w-full h-full object-cover">
              <?php else: ?>
                <div id="preview-image" class="w-full h-full bg-primary flex items-center justify-center">
                  <span class="text-3xl font-bold text-[#412d00]"><?= strtoupper(substr($userName, 0, 1)) ?></span>
                </div>
              <?php endif; ?>
              <label class="absolute inset-0 bg-black/50 flex items-center justify-center cursor-pointer opacity-0 hover:opacity-100 transition-opacity">
                <span class="material-symbols-outlined text-white">camera_alt</span>
                <input type="file" name="image" accept="image/*" class="hidden" onchange="previewFile()">
              </label>
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-secondary mb-2">Full Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($userName) ?>" required
              class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface">
          </div>
          <div>
            <label class="block text-sm font-medium text-secondary mb-2">Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($userEmail) ?>" required
              class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface">
          </div>
          <div>
            <label class="block text-sm font-medium text-secondary mb-2">Phone</label>
            <input type="tel" name="phone" value="<?= htmlspecialchars($userPhone) ?>"
              class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface">
          </div>
          <div class="flex justify-end gap-3 pt-2">
            <button type="button" onclick="document.getElementById('editProfileModal').close()"
              class="px-6 py-2 rounded-full text-secondary hover:bg-surface-container">Cancel</button>
            <button type="submit" class="brass-gradient text-[#412d00] px-6 py-2 rounded-full font-bold">Save Changes</button>
          </div>
        </form>
      </dialog>
      <script>
        function previewFile() {
          const file = document.querySelector('input[name="image"]').files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
              const preview = document.getElementById('preview-image');
              if (preview.tagName === 'IMG') {
                preview.src = e.target.result;
              } else {
                preview.outerHTML = '<img id="preview-image" src="' + e.target.result + '" alt="Profile" class="w-full h-full object-cover">';
              }
            };
            reader.readAsDataURL(file);
          }
        }
      </script>

      <!-- 2. Account Info -->
      <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="glass-panel p-8 rounded-[2rem] border border-outline-variant/10">
          <h3 class="text-secondary uppercase tracking-[0.2em] text-xs font-bold mb-6">Account Information</h3>
          <div class="space-y-4">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary">person</span>
              </div>
              <div>
                <p class="text-xs text-secondary">Full Name</p>
                <p class="text-on-surface font-medium"><?= htmlspecialchars($userName) ?></p>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary">mail</span>
              </div>
              <div>
                <p class="text-xs text-secondary">Email Address</p>
                <p class="text-on-surface font-medium"><?= htmlspecialchars($userEmail ?: 'Not set') ?></p>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary">phone</span>
              </div>
              <div>
                <p class="text-xs text-secondary">Phone Number</p>
                <p class="text-on-surface font-medium"><?= htmlspecialchars($userPhone ?: 'Not set') ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="glass-panel p-8 rounded-[2rem] border border-outline-variant/10">
          <h3 class="text-secondary uppercase tracking-[0.2em] text-xs font-bold mb-6">Security</h3>
          <div class="space-y-4">
            <button onclick="document.getElementById('changePasswordModal').showModal()" class="w-full flex items-center gap-4 p-4 rounded-xl bg-surface-container hover:bg-surface-container-highest transition-all">
              <div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary">lock</span>
              </div>
              <div class="text-left flex-1">
                <p class="text-on-surface font-medium">Change Password</p>
                <p class="text-xs text-secondary">Update your security settings</p>
              </div>
              <span class="material-symbols-outlined text-secondary">chevron_right</span>
            </button>
          </div>
        </div>
      </section>

      <!-- Change Password Modal -->
      <dialog id="changePasswordModal" class="bg-surface-container rounded-2xl p-6 backdrop:bg-black/50 w-full max-w-md">
        <h3 class="text-xl font-bold text-primary mb-6">Change Password</h3>
        <form method="POST" action="<?= $baseUrl ?>profile/password" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-secondary mb-2">Current Password</label>
            <input type="password" name="current_password" required
              class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface">
          </div>
          <div>
            <label class="block text-sm font-medium text-secondary mb-2">New Password</label>
            <input type="password" name="new_password" required minlength="6"
              class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface">
          </div>
          <div>
            <label class="block text-sm font-medium text-secondary mb-2">Confirm New Password</label>
            <input type="password" name="confirm_password" required minlength="6"
              class="w-full bg-surface-container-high px-4 py-3 rounded-xl border border-outline-variant/20 focus:border-primary text-on-surface">
          </div>
          <div class="flex justify-end gap-3 pt-2">
            <button type="button" onclick="document.getElementById('changePasswordModal').close()"
              class="px-6 py-2 rounded-full text-secondary hover:bg-surface-container">Cancel</button>
            <button type="submit" class="brass-gradient text-[#412d00] px-6 py-2 rounded-full font-bold">Update Password</button>
          </div>
        </form>
      </dialog>

      <!-- 3. Quick Actions -->
      <section class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-12">
        <a href="<?= $baseUrl ?>reservation" class="group relative bg-surface-container hover:bg-surface-container-highest p-6 rounded-3xl transition-all duration-300 text-left">
          <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
              <span class="material-symbols-outlined">event_available</span>
            </div>
            <span class="material-symbols-outlined text-on-surface-variant group-hover:translate-x-1 transition-transform">arrow_forward_ios</span>
          </div>
          <h4 class="text-lg font-bold text-on-surface">Make Reservation</h4>
          <p class="text-sm text-secondary opacity-60">Book your next gaming session</p>
        </a>
        <a href="<?= $baseUrl ?>games" class="group relative bg-surface-container hover:bg-surface-container-highest p-6 rounded-3xl transition-all duration-300 text-left">
          <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform">
              <span class="material-symbols-outlined">sports_esports</span>
            </div>
            <span class="material-symbols-outlined text-on-surface-variant group-hover:translate-x-1 transition-transform">arrow_forward_ios</span>
          </div>
          <h4 class="text-lg font-bold text-on-surface">Browse Games</h4>
          <p class="text-sm text-secondary opacity-60">Explore our game collection</p>
        </a>
        <button onclick="document.getElementById('editProfileModal').showModal()" class="group relative bg-surface-container hover:bg-surface-container-highest p-6 rounded-3xl transition-all duration-300 text-left">
          <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-full bg-tertiary-container/30 flex items-center justify-center text-tertiary group-hover:scale-110 transition-transform">
              <span class="material-symbols-outlined">settings</span>
            </div>
            <span class="material-symbols-outlined text-on-surface-variant group-hover:translate-x-1 transition-transform">arrow_forward_ios</span>
          </div>
          <h4 class="text-lg font-bold text-on-surface">Account Settings</h4>
          <p class="text-sm text-secondary opacity-60">Manage your profile details</p>
        </button>
      </section>
    </div>
  </main>
</body>
</html>