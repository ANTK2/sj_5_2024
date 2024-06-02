<?php
session_start();
include_once 'classes/autoloader.php';
$db = new Database();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>NovinySlovakia</title>
</head>
<body>
    <header>
    <nav class="bg-zinc-900 text-white p-4">
  <div class="mx-auto flex justify-between items-center">
    <a href="index">
    <div class="flex items-center">
      <img style="max-height:50px; max-width:auto;" src="img/logo.png" alt="Logo" class="mr-2" />
      <span class="font-serif text-2xl">NovinySlovakia</span>
    </div>
    </a>
    <div class="hidden md:flex space-x-4">
      <a href="#" class="hover:underline hover:bg-zinc-800 hover:text-zinc-300 px-2 py-1 rounded transition-all">Najnovšie Správy</a>
      <a href="#" class="hover:underline hover:bg-zinc-800 hover:text-zinc-300 px-2 py-1 rounded transition-all">Zdravie</a>
      <a href="#" class="hover:underline hover:bg-zinc-800 hover:text-zinc-300 px-2 py-1 rounded transition-all">Šport</a>
      <a href="#" class="hover:underline hover:bg-zinc-800 hover:text-zinc-300 px-2 py-1 rounded transition-all">Technológie</a>
      <a href="#" class="hover:underline hover:bg-zinc-800 hover:text-zinc-300 px-2 py-1 rounded transition-all">Životné Prostredie</a>
      <a href="#" class="hover:underline hover:bg-zinc-800 hover:text-zinc-300 px-2 py-1 rounded transition-all">Ekonomika</a>
    </div>
    <button class="md:hidden block">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16m-7 6h7"
        ></path>
      </svg>
    </button>
  </div>
</nav>
</header>