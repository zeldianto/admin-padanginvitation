<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('partial/header'); ?>

<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white rounded-lg shadow-md w-80">
        <div class="max-w-[600px] mx-auto w-full">
            <div class="bg-pink-600 rounded-t-lg flex items-center justify-center py-4">
                <img class="w-52" src="https://padanginvitation.com/static/assets/site/images/logo.png" alt="logo">
            </div>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-center mb-4">Silahkan login</h2>
                <?php if ($this->session->flashdata('error')): ?>
                    <p class="text-red-500 text-center mb-4 text-sm"><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>
                <form action="<?php echo base_url('index.php/auth/login'); ?>" method="post">
                    <div class="mb-4">
                        <input type="text" name="access" id="access"
                            class="block w-full px-2 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline sm:text-sm"
                            maxlength="6" placeholder="6 Digit Access" required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>