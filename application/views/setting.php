<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('partial/header'); ?>

<body class="bg-gray-100 max-w-[600px] mx-auto w-full px-4 pb-2">
    <div class="flex justify-start py-4 items-center gap-4">
        <div>
            <a href="<?php echo site_url('dashboard'); ?>"
                class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold w-10 h-10 rounded-full flex items-center justify-center focus:outline-none">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
            </a>
        </div>
        <div>
            <h1 class="text-2xl font-bold">Pengaturan</h1>
        </div>
    </div>

    <div class="bg-gray-100 my-6">

        <div class="rounded overflow-hidden shadow-lg bg-grey-100">
            <form action="<?php echo base_url('index.php/setting/updateTemplateWhatsapp'); ?>" method="post">
                <!-- Header Card -->
                <div class="bg-gray-800 p-4">
                    <h2 class="text-white text-lg font-bold">Kirim Pesan</h2>
                </div>

                <!-- Body Card -->
                <div class="p-4">
                    <div class="w-full">
                        <label for="template" class="block text-sm font-medium text-gray-700 mb-2">Pilih Template
                        </label>
                        <select id="template" name="template" onchange="showTemplateContent(this)"
                            class="block w-full px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm">
                            <option value="" selected disabled>Pilih Template</option>
                            <?php foreach ($template as $item): ?>
                                <option value="<?= $item['id']; ?>" data-template="<?= $item['content']; ?>"
                                    <?= $template_whatsapp == $item['id'] ? 'selected' : ''; ?>>
                                    <?= $item['title']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-4 bg-gray-100 border border-gray-300 rounded-lg overflow-hidden">
                        <!-- Header Chat -->
                        <div class="bg-green-500 text-white px-4 py-2 flex items-center gap-2">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="font-semibold">Contoh Tampilan Pesan</span>
                        </div>

                        <!-- Bubble Chat -->
                        <div class="p-4 space-y-2">
                            <!-- Pesan masuk -->
                            <div class="flex">
                                <div class="bg-white border border-gray-200 p-3 rounded-lg shadow-sm max-w-xs">
                                    <p class="text-sm">. . . . . .</p>
                                </div>
                            </div>
                            <!-- Pesan keluar -->
                            <div class="flex justify-end">
                                <div class="bg-green-100 border border-gray-200 rounded-lg shadow-sm max-w-sm">
                                <div class="bg-green-500 flex gap-1 items-center rounded-t-lg">
                                    <img class="rounded-tl-lg" src="https://placehold.jp/12/233C74/ffffff/100x100.png?text=Sample" alt="">    
                                    <div class="p-2">
                                        <h2 class="font-medium">Hello, We Are Getting Married</h2>
                                        <p style="font-size:10px">We are getting married, online invitation by Padang Invitation</p>
                                        <p style="font-size:10px; color:#6b7280">https://padanginvitation.com/andika-rima</p>
                                    </div>
                                </div>
                                <p class="text-sm p-3" id="chatContent">
                                        <!-- tampilkan disini.. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Card (Opsional) -->
                <div class="px-4 py-2 bg-gray-200 flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>

    </div>

    <script src="<?php echo base_url('assets/js/setting.js'); ?>"></script>
</body>

</html>