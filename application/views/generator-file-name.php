<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Name Generator</title>
</head>
<body>
    <h1>Generate File Names and Download</h1>
    <form action="<?= site_url('FileRename/process_files') ?>" method="post" enctype="multipart/form-data">
        <label for="file_prefix">Masukkan Prefix Nama File:</label>
        <input type="text" name="file_prefix" id="file_prefix" required>
        <br><br>
        
        <label for="files">Pilih File (Multiple):</label>
        <input type="file" name="files[]" id="files" multiple required>
        <br><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html> -->

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
            <h1 class="text-2xl font-bold">Generator File Name</h1>
        </div>
    </div>
    <div class="overflow-x-auto">
        <form action="<?= site_url('FileRename/process_files') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Prefix name</label>
                <input type="text" name="file_prefix" id="file_prefix" required
                    class="block w-full px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Files *<span class="font-normal text-red-600">jpg|png|jpeg|pdf|docx|txt|gif|mp3|webp</span></label>
                <input type="file" name="files[]" id="files" multiple required
                    class="block w-full px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Submit</button>
        </form>
    </div>

    <script src="<?php echo base_url('assets/js/greeting.js'); ?>"></script>

</body>

</html>