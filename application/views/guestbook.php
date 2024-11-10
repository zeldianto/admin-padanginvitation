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
            <h1 class="text-2xl font-bold">Buku Tamu</h1>
        </div>
    </div>
    <div class="flex flex-wrap justify-end items-center pb-2 gap-2 w-full">
        <div class="flex items-center gap-2">
            <button class="bg-blue-500 font-bold text-white py-2 px-3 rounded-lg flex items-center space-x-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                </svg>
                <span class="hidden sm:inline">Download</span>
            </button>
            <button onclick="openModal()"
                class="bg-blue-500 font-bold text-white py-2 px-3 rounded-lg flex items-center space-x-2">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
                <span class="hidden sm:inline">Tamu</span>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full bg-white border rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-pink-600 text-white text-left">
                    <th class="py-2 px-4 border-b text-left" style="width:15px">No</th>
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Telepon</th>
                    <th class="py-2 px-4 border-b text-left">Kirim</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($guests)): ?>
                    <?php $no = $page + 1; ?>
                    <?php foreach ($guests as $guest): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b align-top"><?php echo $no++; ?></td>
                            <td class="py-2 px-4 border-b align-top"><?php echo $guest->name; ?></td>
                            <td class="py-2 px-4 border-b align-top"><?php echo $guest->phone ? $guest->phone : '-'; ?></td>
                            <td class="py-2 px-4 border-b align-top">
                                <div class="flex gap-2">
                                    <?php
                                    $url = "$site_url{$guest->slug}?guest={$guest->id}";
                                    $shareText = str_replace(['{link}', '{nama-tamu}'], [$url, $guest->name], $content);
                                    $encodedShareText = urlencode($shareText);
                                    ?>
                                    <!-- Button open link new tab -->
                                    <button onclick="window.open('<?php echo $url; ?>', '_blank')"
                                        class="w-6 h-6 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="grey" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778" />
                                        </svg>
                                    </button>
                                    <!-- Button copy link to clipboard -->
                                    <button data-share-text="<?php echo htmlspecialchars($shareText); ?>"
                                        class="copyButton w-6 h-6 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="grey" stroke-linejoin="round" stroke-width="2"
                                                d="M14 4v3a1 1 0 0 1-1 1h-3m4 10v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2m11-3v10a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1V7.87a1 1 0 0 1 .24-.65l2.46-2.87a1 1 0 0 1 .76-.35H18a1 1 0 0 1 1 1Z" />
                                        </svg>
                                    </button>
                                    <!-- Button share -->
                                    <button onclick="shareContent('<?php echo $encodedShareText; ?>')"
                                        class="w-6 h-6 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="grey" stroke-linecap="round" stroke-width="2"
                                                d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                        </svg>
                                    </button>
                                    <!-- Button share link to facebook -->
                                    <button
                                        onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $encodedShareText; ?>', '_blank')"
                                        class="w-6 h-6 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3B82F6"
                                            viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <!-- Button share link to whatsapp -->
                                    <button
                                        onclick="window.open('https://wa.me/?text=<?php echo $encodedShareText; ?>', '_blank')"
                                        class="w-6 h-6 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path fill="green" fill-rule="evenodd"
                                                d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                                                clip-rule="evenodd" />
                                            <path fill="green"
                                                d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                                        </svg>
                                    </button>
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
            <h2 class="text-xl font-bold mb-4">Tambah Tamu</h2>
            <form action="<?php echo base_url('index.php/guestbook/add'); ?>" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama</label>
                    <input type="text" name="name" id="name" required
                        class="block w-full px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Telepon</label>
                    <input type="text" name="phone" id="phone"
                        class="block w-full px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/guestbook.js'); ?>"></script>

</body>

</html>