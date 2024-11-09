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
            <h1 class="text-2xl font-bold">Kartu Ucapan & Doa</h1>
        </div>
    </div>
    <div class="flex justify-end pb-2 items-center gap-2">
        <button class="bg-blue-500 font-bold text-white py-2 px-3 rounded-lg flex items-center space-x-2">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
            </svg>

            <span>Download</span>
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full bg-white border rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-pink-600 text-white text-left">
                    <th class="py-2 px-4 border-b text-left" style="width:15px">No</th>
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Ucapan</th>
                    <th class="py-2 px-4 border-b text-left"></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($greeting)): ?>
                    <?php $no = $page + 1; ?>
                    <?php foreach ($greeting as $data): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b align-top"><?php echo $no++; ?></td>
                            <td class="py-2 px-4 border-b align-top"><?php echo $data->name; ?></td>
                            <td class="py-2 px-4 border-b align-top">
                                <div class="flex flex-col space-y-2">
                                    <div class="flex justify-start">
                                        <div
                                            class="w-11/12 mb-2 bg-blue-100 text-blue-900 text-sm rounded-lg px-4 py-2 max-w-xs break-words shadow">
                                            <?php echo $data->message ? $data->message : '-'; ?>
                                        </div>
                                    </div>
                                    <?php if (isset($data->reply) && $data->reply !== "" && !empty($data->reply)): ?>
                                        <div class="flex justify-end">
                                            <div
                                                class="w-11/12 text-end mb-2 bg-red-100 text-red-900 text-sm rounded-lg px-4 py-2 max-w-xs break-words shadow">
                                                <?php echo $data->message ? $data->reply : '-'; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if (!isset($data->reply) || $data->reply === "" || empty($data->reply)): ?>
                                    <a href="javascript:void(0);"
                                        onclick="openModal('<?php echo $data->id; ?>','<?php echo $data->name; ?>')"
                                        class="text-blue-500 hover:underline flex items-center">
                                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="#3b82f6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z" />
                                        </svg>
                                        <span>Balas</span>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td class="py-2 px-4 border-b align-top">
                                <div class="flex gap-2">
                                    <?php if ($data->status == 1): ?>
                                        <!-- tombol non aktifkan -->
                                        <button
                                            onclick="window.location.href='<?php echo site_url('greeting/update_status/' . $data->id); ?>'"
                                            class="w-6 h-6 rounded-lg bg-red-100 hover:bg-red-300 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    <?php else: ?>
                                        <!-- tombol aktifkan -->
                                        <button
                                            onclick="window.location.href='<?php echo site_url('greeting/update_status/' . $data->id); ?>'"
                                            class="w-6 h-6 rounded-lg bg-blue-100 hover:bg-blue-300 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="blue" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="py-2 px-4 text-center border-b">Tidak ada data tamu.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo $pagination; ?>
    </div>
    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg w-80 p-6 shadow-lg">
            <h2 class="text-xl font-bold mb-4">Balas</h2>
            <form action="<?php echo base_url('index.php/greeting/reply'); ?>" method="post">
                <div class="mb-4">
                    <input type="hidden" id="id_greeting" name="id_greeting">
                    <label id="labelBalasan" class="block text-gray-700 text-sm font-bold mb-2" for="name">Pesan
                        Balasan</label>
                    <textarea name="message" id="message" rows="4"
                        class="block w-full px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm"></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/greeting.js'); ?>"></script>

</body>

</html>