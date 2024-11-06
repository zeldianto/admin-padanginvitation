<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="https://cdn.dazelpro.com/uploads/dazelinv/favico.ico">
    <title>Padang Invitation | Admin</title>
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body class="bg-gray-100 max-w-[600px] mx-auto w-full px-4 pb-2">
    <div class="flex justify-between py-4 items-center">
        <div>
            <div>Selamat Datang,</div>
            <h1 class="text-2xl font-bold"><?php echo $this->session->userdata('user_name'); ?>!</h1>
        </div>
        <div>
            <div class="relative">
                <!-- Tombol Menu -->
                <button id="menuButton"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold w-10 h-10 rounded-full flex items-center justify-center focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="menuDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Bantuan</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Testimoni</a>
                    <a href="<?php echo site_url('auth/logout'); ?>"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 my-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                <span class="text-3xl font-bold count" data-target="<?php echo $total_views; ?>">0</span>
                <span class="text-xs text-gray-500">Jumlah Views</span>
            </div>

            <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                <span class="text-3xl font-bold count" data-target="<?php echo $total_greetings; ?>">0</span>
                <span class="text-xs text-gray-500">Ucapan Doa</span>
            </div>

            <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                <span class="text-3xl font-bold count" data-target="<?php echo $total_attending_guests; ?>">0</span>
                <span class="text-xs text-gray-500">Tamu Akan Datang</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <a href="<?php echo site_url('guestbook'); ?>"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v8m-4-4h8m2 4V8a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2z" />
            </svg>
            <span>Buku Tamu</span>
        </a>

        <a href="<?php echo site_url('greeting'); ?>"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v6m6 6H6a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2z" />
            </svg>
            <span>Kartu Ucapan</span>
        </a>

        <a href="<?php echo site_url('guestbook'); ?>"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 9l3 3-3 3m5-6l3 3-3 3M4 4h16v16H4z" />
            </svg>
            <span>RSVP</span>
        </a>

        <a href="<?php echo site_url('guestbook'); ?>"
            class="bg-red-500 hover:bg-red-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h3v3h-3zM15 12h3v3h-3zM9 6h6M5 18h14m-2-6H5v6a2 2 0 002 2h10a2 2 0 002-2v-6H7z" />
            </svg>
            <span>Laporan</span>
        </a>
    </div>
    <span class="mx-2"></span>
    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>