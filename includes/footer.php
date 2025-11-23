    <!-- Bottom Navigation -->
    <?php $currentPage = isset($_GET['page']) ? $_GET['page'] : "dashboard"; ?>

    <div class="fixed bottom-0 left-0 right-0 bg-gray-800 shadow-md border-t w-full mx-auto max-w-[640px]">

        <nav class="fixed bottom-nav left-1/2 -translate-x-1/2 bottom-5 bg-gray-800 shadow-xl rounded-md px-6 py-3 w-[90%] max-w-md  z-50">
            <div class="flex items-center w-full justify-between">

                <a href="/inventori/dashboard"
                    class="flex flex-col items-center text-xs
                <?= in_array($currentPage, ['dashboard'])
                    ? 'text-orange-600 font-bold'
                    : 'text-gray-600 hover:text-orange-400' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 mb-0.5">
                        <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                </a>

                <a href="/inventori/barang/list"
                    class="flex flex-col items-center text-xs opacity-70 
                <?= in_array($currentPage, ['barang/add', 'barang/list'])
                    ? 'text-orange-600 font-bold'
                    : 'text-gray-600 hover:text-orange-400' ?>">
                    <svg xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 mb-0.5">
                        <path d="M16.5 7.5h-9v9h9v-9Z" />
                        <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 0 1 9 3v.75h2.25V3a.75.75 0 0 1 1.5 0v.75H15V3a.75.75 0 0 1 1.5 0v.75h.75a3 3 0 0 1 3 3v.75H21A.75.75 0 0 1 21 9h-.75v2.25H21a.75.75 0 0 1 0 1.5h-.75V15H21a.75.75 0 0 1 0 1.5h-.75v.75a3 3 0 0 1-3 3h-.75V21a.75.75 0 0 1-1.5 0v-.75h-2.25V21a.75.75 0 0 1-1.5 0v-.75H9V21a.75.75 0 0 1-1.5 0v-.75h-.75a3 3 0 0 1-3-3v-.75H3A.75.75 0 0 1 3 15h.75v-2.25H3a.75.75 0 0 1 0-1.5h.75V9H3a.75.75 0 0 1 0-1.5h.75v-.75a3 3 0 0 1 3-3h.75V3a.75.75 0 0 1 .75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h10.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V6.75Z" clip-rule="evenodd" />
                    </svg>
                </a>

                <!-- Peminjaman -->
                <a href="/inventori/peminjaman/list"
                    class="flex flex-col items-center text-xs opacity-70 group <?= in_array($currentPage, ['peminjaman/add', 'peminjaman/list']) ? 'text-orange-600 font-bold' : 'text-gray-600 hover:text-orange-400' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 mb-0.5">
                        <path fill-rule="evenodd" d="M6.97 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06L8.25 4.81V16.5a.75.75 0 0 1-1.5 0V4.81L3.53 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5Zm9.53 4.28a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V7.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                </a>

                <!-- More Menu -->
                <a href="/inventori/menu"
                    class="flex flex-col items-center text-xs opacity-70 group
                        <?= in_array($currentPage, ['menu']) ? 'text-orange-600 font-bold' : 'text-gray-600 hover:text-orange-400' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 mb-0.5">
                        <path d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
                    </svg>

                </a>
            </div>
        </nav>
    </div>
    </div>
    </body>

    </html>