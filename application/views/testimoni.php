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
            <h1 class="text-2xl font-bold">Testimoni</h1>
        </div>
    </div>

    <div class="bg-gray-100 my-6" id="formTestimoni" <?php echo ($total_testimoni > 0) ? 'style="display:none;"' : ''; ?>>
        <form action="<?php echo base_url('index.php/testimoni/add'); ?>" method="POST"
            onsubmit="return validateForm()">
            <div class="rounded overflow-hidden shadow-lg bg-grey-100">
                <div class="p-4 text-center">
                    <p class="mb-4">Kepuasan Anda adalah kebahagiaan kami!
                        Ceritakan bagaimana undangan digital Padang
                        Invitation membuat hari spesial Anda lebih istimewa. Testimoni Anda sangat berarti bagi kami!
                    </p>
                    <div class="flex justify-center items-center space-x-2 mb-4">
                        <input type="hidden" id="star" name="star" required>
                        <svg id="star-1" class="w-8 h-8 text-gray-400 cursor-pointer" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24" onclick="setRating(1)">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                        <svg id="star-2" class="w-8 h-8 text-gray-400 cursor-pointer" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24" onclick="setRating(2)">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                        <svg id="star-3" class="w-8 h-8 text-gray-400 cursor-pointer" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24" onclick="setRating(3)">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                        <svg id="star-4" class="w-8 h-8 text-gray-400 cursor-pointer" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24" onclick="setRating(4)">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                        <svg id="star-5" class="w-8 h-8 text-gray-400 cursor-pointer" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24" onclick="setRating(5)">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                    </div>
                    <div class="flex justify-center">
                        <textarea name="testimoni" id="testimoni" rows="4" required
                            class="block w-full max-w-xs px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm"></textarea>

                    </div>
                </div>
                <div class="px-4 py-2 bg-gray-200 flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Kirim</button>
                </div>
            </div>
        </form>
    </div>
    <div class="bg-gray-100 my-6" id="thanksTestimoni" <?php echo ($total_testimoni > 0) ? '' : 'style="display:none;"'; ?>>
        <div class="rounded overflow-hidden shadow-lg bg-grey-100">
            <div class="p-4 text-center">
                <p class="mb-3">
                    Terima kasih banyak telah meluangkan waktu untuk memberikan testimoni! Pendapat Anda sangat berarti
                    bagi kami dan akan membantu kami untuk terus meningkatkan layanan kami. Semoga undangan digital
                    Padang Invitation dapat selalu membuat momen istimewa Anda lebih berkesan. Kami sangat menghargai
                    dukungan Anda!
                </p>
                <div class="flex justify-center">
                    <img class="mb-3 w-14 text-center" src="<?php echo base_url('assets/images/romantic.png'); ?>" alt="">
                </div>
            </div>
            <div class="px-4 py-2 bg-gray-200 flex justify-center">
                <button onclick="showForm()" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Buat Testimoni Lagi</button>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/testimoni.js'); ?>"></script>
</body>

</html>