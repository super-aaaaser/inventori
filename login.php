<?php
session_start();
include "config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pengguna = $_POST['nama'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM pengguna WHERE nama_pengguna = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $nama_pengguna);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password_hash'])) {
        // simpan session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama_pengguna'];
        $_SESSION['peran'] = $user['role'];
        $_SESSION['jurusan_id'] = $user['jurusan_id'];

        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?status=gagal");
        exit;
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Aplikasi-Style Web</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="app-shell flex">
        <main class="card w-100">
            <section class="bg-white/90 backdrop-blur-sm rounded-2xl p-8 relative">
                <!-- Decorative top gradient overlay -->
                <div class="absolute inset-x-0 -top-16 h-32 bg-gradient-to-r from-orange-500 via-amber-400 to-yellow-400 blur-3xl opacity-60 rounded-full"></div>


                <div class="flex flex-col items-center gap-3 mb-4 relative z-10">
                    <div class="w-20 h-20 rounded-full bg-indigo-50 flex items-center justify-center">
                        <img src="https://img.icons8.com/fluency/48/user-male-circle.png" alt="user icon" class="w-12 h-12" />
                    </div>
                    <h1 class="text-2xl font-semibold text-gray-800">Masuk ke Akun Anda</h1>
                    <p class="text-sm text-gray-500">Akses cepat dan aman — bebas ribet</p>
                </div>


                <form id="loginForm" class="space-y-4 relative z-10" action="" method="post">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                        <input id="nama" name="nama" type="text" required class="mt-1 block w-full rounded-lg border border-gray-200 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300" />
                    </div>


                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative mt-1">
                            <input id="password" name="password" type="password" required placeholder="Masukkan password" class="block w-full rounded-lg border border-gray-200 px-3 py-2 pr-10 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300" />
                            <button type="button" id="togglePwd" aria-label="Tampilkan password" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-gray-500">
                                Tampil
                            </button>
                        </div>
                    </div>


                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-300" />
                            Ingat saya
                        </label>
                        <a href="#" class="text-orange-600 hover:underline">Lupa password?</a>
                    </div>


                    <button type="submit" class="w-full py-3 rounded-xl bg-orange-500 text-white font-medium shadow-md hover:bg-orange-600 transition">Masuk</button>


                    <div class="text-center text-sm text-gray-500">
                        Belum punya akun? <a href="#" class="text-orange-600 hover:underline">Daftar</a>
                    </div>
                </form>


                <hr class="my-5 border-gray-100 relative z-10" />


            </section>
        </main>
    </div>

    <script>
        const toggle = document.getElementById('togglePwd');
        const pwd = document.getElementById('password');
        toggle.addEventListener('click', () => {
            if (pwd.type === 'password') {
                pwd.type = 'text';
                toggle.textContent = 'Sembunyikan';
            } else {
                pwd.type = 'password';
                toggle.textContent = 'Tampil';
            }
        });


        function handleSubmit(e) {
            e.preventDefault();
            const email = document.getElementById('email').value.trim();
            const password = pwd.value.trim();
            if (!email || !password) {
                alert('Isi email dan password.');
                return;
            }
            alert('Login berhasil (contoh). Email: ' + email);
        }
    </script>
</body>

</html>