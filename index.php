<?php include 'config/koneksi.php'; ?>
<?php include "config/akses.php"; ?>
<?php include "config/routes.php"; ?>
<?php cekLogin(); ?>
<?php include 'includes/header.php'; ?>
<main class="flex flex-col flex-1 overflow-auto hide-scroll [scrollbar-width:none] [-ms-overflow-style:none] [::-webkit-scrollbar]:hidden mx-auto w-full max-w-[560px] px-4 pt-4 pb-24 space-y-4 bg-gray-900">
    <?php

    $page = $_GET['page'] ?? "dashboard";
    $id   = $_GET['id']   ?? null;

    // kalau page tidak terdaftar → 404
    if (!array_key_exists($page, $routes)) {
        include "pages/404.php";
        exit;
    }

    // cek role user apakah diizinkan
    if (!cekAkses($routes[$page])) {
        echo "<h1>403 - Anda tidak punya akses ke halaman ini</h1>";
        ceksession();
        exit;
    }

    // kalau lolos → load halaman
    include "pages/" . $page . ".php";
    ?>
    <div class="h-24"></div>

</main>

<?php include 'includes/footer.php'; ?>