function openModal(id, name) {
    document.getElementById('message').value = ''; // Kosongkan pesan sebelumnya
    document.getElementById('id_greeting').value = id; // Kosongkan pesan sebelumnya
    document.getElementById('labelBalasan').textContent = 'Balasan untuk ' + name; // Tampilkan nama di label
    document.getElementById('modal').classList.remove('hidden'); // Tampilkan modal
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}