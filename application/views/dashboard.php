<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('partial/header'); ?>

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
                    <?php if ($this->session->userdata('user_role') === 'USER'): ?>
                        <a href="<?php echo $site_url; ?><?php echo $slug; ?>" target="_blank"
                            class="flex items-center px-4 py-2 gap-2 text-gray-700 hover:bg-gray-100">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778" />
                            </svg>
                            Buka Undangan
                        </a>
                        <a href="<?php echo site_url('testimoni'); ?>"
                            class="flex items-center px-4 py-2 gap-2 text-gray-700 hover:bg-gray-100">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="grey" stroke-width="2"
                                    d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z" />
                            </svg>

                            Testimoni
                        </a>
                        <a href="<?php echo site_url('setting'); ?>"
                            class="flex items-center px-4 py-2 gap-2 text-gray-700 hover:bg-gray-100">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            Pengaturan
                        </a>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('user_role') === 'ADMIN'): ?>
                        <a href="https://forms.gle/k7kfW2e4pqMxAyML7" target="_blank"
                            class="flex items-center px-4 py-2 gap-2 text-gray-700 hover:bg-gray-100">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 3v4a1 1 0 0 1-1 1H5m4 6 2 2 4-4m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                            </svg>
                            Google Form
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo site_url('auth/logout'); ?>"
                        class="flex items-center px-4 py-2 gap-2 text-gray-700 hover:bg-gray-100">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>

                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php if ($this->session->userdata('user_role') === 'USER'): ?>
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
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023" />
                </svg>
                <span>Buku Tamu</span>
            </a>

            <a href="<?php echo site_url('greeting'); ?>"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                </svg>
                <span>Kartu Ucapan</span>
            </a>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-4">
            <a href="<?php echo site_url('rsvp'); ?>"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.5 12A2.5 2.5 0 0 1 21 9.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2.5a2.5 2.5 0 0 1 0 5V17a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2.5a2.5 2.5 0 0 1-2.5-2.5Z" />
                </svg>
                <span>RSVP</span>
            </a>
        </div>
        <span class="mx-2"></span>
        <div class="flex justify-center items-center">
            <a href="https://wa.me/6283181887801?text=Halo%20saya%20membutuhkan%20bantuan" target="_blank"
                class="flex justify-start gap-2 items-center px-4 py-2 text-gray-700 text-white bg-pink-600 hover:bg-pink-700 rounded-lg">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Pusat Bantuan</span>
            </a>
        </div>
    <?php elseif ($this->session->userdata('user_role') === 'ADMIN'): ?>
        <div class="bg-gray-100 my-6">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                    <span class="text-3xl font-bold count" data-target="<?php echo $total_order; ?>">0</span>
                    <span class="text-xs text-gray-500">Total Order</span>
                </div>

                <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                    <span class="text-3xl font-bold count" data-target="">0</span>
                    <span class="text-xs text-gray-500">Order Aktif</span>
                </div>

                <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                    <span class="text-3xl font-bold count" data-target="">0</span>
                    <span class="text-xs text-gray-500">Order Kadaluarsa</span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <a href="<?php echo site_url('order'); ?>"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                </svg>

                <span>Order</span>
            </a>
            <a href="<?php echo site_url('template-whatsapp'); ?>"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                        clip-rule="evenodd" />
                    <path fill="currentColor"
                        d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                </svg>
                <span>Template Whatsapp</span>
            </a>
            <a href="<?php echo site_url('tools/generator-file-name'); ?>"
                class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-8 rounded-lg flex flex-col items-center justify-center space-y-2">
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 10V4a1 1 0 0 0-1-1H9.914a1 1 0 0 0-.707.293L5.293 7.207A1 1 0 0 0 5 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2M10 3v4a1 1 0 0 1-1 1H5m5 6h9m0 0-2-2m2 2-2 2" />
                </svg>
                <span>Generator File Name</span>
            </a>
        </div>
    <?php endif; ?>
    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
</body>

</html>