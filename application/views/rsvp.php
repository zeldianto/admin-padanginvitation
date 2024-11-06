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
            <h1 class="text-2xl font-bold">RSVP</h1>
        </div>
    </div>

    <div class="bg-gray-100 my-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                <span class="text-3xl font-bold count" data-target="<?php echo $total_attending_guests; ?>">0</span>
                <span class="text-xs text-gray-500">Hadir</span>
            </div>

            <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                <span class="text-3xl font-bold count" data-target="<?php echo $total_not_attending_guests; ?>">0</span>
                <span class="text-xs text-gray-500">Tidak Hadir</span>
            </div>

            <div class="bg-white py-4 rounded-lg shadow flex flex-col items-center">
                <span class="text-3xl font-bold count" data-target="<?php echo $total_not_confirm; ?>">0</span>
                <span class="text-xs text-gray-500">Tidak Konfirmasi</span>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full bg-white border rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-pink-600 text-white text-left">
                    <th class="py-2 px-4 border-b text-left" style="width:15px">No</th>
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Konfirmasi</th>
                    <th class="py-2 px-4 border-b text-left">Jumlah Tamu</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rsvp)): ?>
                    <?php $no = $page + 1; ?>
                    <?php foreach ($rsvp as $data): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b align-top"><?php echo $no++; ?></td>
                            <td class="py-2 px-4 border-b align-top"><?php echo $data->name; ?></td>
                            <td class="py-2 px-4 border-b align-top"><?php echo $data->confirm; ?></td>
                            <td class="py-2 px-4 border-b align-top"><?php echo $data->number_of_guest; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="py-2 px-4 text-center border-b">Belum ada tamu yg konfirmasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo $pagination; ?>
    </div>

    <script src="<?php echo base_url('assets/js/rsvp.js'); ?>"></script>
</body>

</html>