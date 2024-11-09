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
            <h1 class="text-2xl font-bold">Order</h1>
        </div>
    </div>
    <div class="flex justify-end pb-2 items-center gap-2">
        <button onclick="openModal()"
            class="bg-blue-500 font-bold text-white py-2 px-3 rounded-lg flex items-center space-x-2">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg>
            <span>Order</span>
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full bg-white border rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-pink-600 text-white text-left">
                    <th class="py-2 px-4 border-b text-left" style="width:15px">No</th>
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Tanggal</th>
                    <th class="py-2 px-4 border-b text-left">Url</th>
                    <th class="py-2 px-4 border-b text-left">Akses</th>
                    <th class="py-2 px-4 border-b text-left"></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($greeting)): ?>
                    <?php $no = $page + 1; ?>
                    <?php foreach ($greeting as $data): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b align-top"><?php echo $no++; ?></td>
                            <td class="py-2 px-4 border-b align-top whitespace-nowrap"><?php echo $data->name; ?></td>
                            <td class="py-2 px-4 border-b align-top whitespace-nowrap"><?php echo $data->date; ?></td>
                            <td class="py-2 px-4 border-b align-top">
                                <a href="<?php echo $site_url ?><?php echo $data->slug; ?>" target="_blank" class="flex items-center gap-1 whitespace-nowrap text-blue-500">
                                    <svg class="w-4 h-4 text-blue-500 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="#3980EE" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778" />
                                    </svg>
                                    <?php echo $data->slug; ?>
                                </a>
                            </td>
                            <td class="py-2 px-4 border-b align-top"><?php echo $data->access; ?></td>
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
            <h2 class="text-xl font-bold mb-4">Buat Order</h2>
            <form action="<?php echo base_url('index.php/order/add'); ?>" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama</label>
                    <input type="text" name="name" id="name" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="url">Url</label>
                    <input type="text" name="url" id="url" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="date">Tanggal Acara</label>
                    <input type="date" name="date" id="date" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/order.js'); ?>"></script>

</body>

</html>