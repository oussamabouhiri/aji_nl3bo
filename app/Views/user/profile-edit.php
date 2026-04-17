<?php

use App\Helper\Csrf;

$userName = $user['name'] ?? '';
$userEmail = $user['email'] ?? '';
$userPhone = $user['phone'] ?? '';
?>
<!DOCTYPE html>
<html class="dark" lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Edit Profile | Aji L3bo</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            background: "#131313",
            surface: "#1c1b1b",
            surfacehigh: "#2a2a2a",
            primary: "#e9c176",
            onprimary: "#412d00",
            secondary: "#abcdcc",
            outline: "#414848",
            ontext: "#e5e2e1"
          },
          fontFamily: {
            headline: ["Manrope"],
            body: ["Inter"]
          }
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    h1,
    h2,
    h3 {
      font-family: 'Manrope', sans-serif;
    }

    .brass-gradient {
      background: linear-gradient(135deg, #e9c176 0%, #bd9852 100%);
    }
  </style>
</head>

<body class="bg-background text-ontext min-h-screen">
  <main class="max-w-3xl mx-auto px-4 py-10">
    <div class="mb-8 flex items-center justify-between gap-4">
      <div>
        <h1 class="text-3xl md:text-4xl font-headline font-extrabold tracking-tight">Edit Your Profile</h1>
        <p class="text-secondary mt-2">Update your account information below.</p>
      </div>
      <a href="<?= BASE_URL ?>/profile" class="px-5 py-2.5 rounded-full border border-outline text-secondary hover:bg-surfacehigh transition-colors">
        Back
      </a>
    </div>

    <section class="bg-surface rounded-3xl border border-outline/60 p-6 md:p-8">
      <form action="<?= BASE_URL ?>/profile/update" method="POST" class="space-y-6">
        <?= Csrf::field() ?>

        <div class="space-y-2">
          <label for="name" class="text-sm font-medium text-secondary">Full Name</label>
          <input
            id="name"
            name="name"
            type="text"
            required
            value="<?= htmlspecialchars($userName) ?>"
            class="w-full rounded-xl bg-background border border-outline px-4 py-3 text-ontext placeholder:text-secondary/40 focus:border-primary focus:ring-primary"
            placeholder="Your full name"
          >
        </div>

        <div class="space-y-2">
          <label for="email" class="text-sm font-medium text-secondary">Email Address</label>
          <input
            id="email"
            name="email"
            type="email"
            required
            value="<?= htmlspecialchars($userEmail) ?>"
            class="w-full rounded-xl bg-background border border-outline px-4 py-3 text-ontext placeholder:text-secondary/40 focus:border-primary focus:ring-primary"
            placeholder="you@example.com"
          >
        </div>

        <div class="space-y-2">
          <label for="phone" class="text-sm font-medium text-secondary">Phone Number</label>
          <input
            id="phone"
            name="phone"
            type="text"
            value="<?= htmlspecialchars($userPhone) ?>"
            class="w-full rounded-xl bg-background border border-outline px-4 py-3 text-ontext placeholder:text-secondary/40 focus:border-primary focus:ring-primary"
            placeholder="+212 6XX XXX XXX"
          >
        </div>

        <div class="pt-3 flex flex-col sm:flex-row gap-3 sm:justify-end">
          <a href="<?= BASE_URL ?>/profile" class="px-6 py-3 rounded-xl border border-outline text-secondary text-center hover:bg-surfacehigh transition-colors">
            Cancel
          </a>
          <button type="submit" class="brass-gradient px-7 py-3 rounded-xl text-onprimary font-semibold hover:opacity-95 transition-opacity">
            Save Changes
          </button>
        </div>
      </form>
    </section>
  </main>
</body>

</html>
