function openModal() {
    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

function shareContent(content) {
    if (navigator.share) {
        navigator.share({
            title: 'Padang Invitation Share',
            text: content,
            url: '<?php echo $url; ?>'
        }).then(() => {
            console.log('Successfully shared');
        }).catch((error) => {
            console.error('Error sharing:', error);
        });
    } else {
        alert('Fitur tidak didukung di browser ini.');
    }
}

document.querySelectorAll('.copyButton').forEach(button => {
    button.addEventListener('click', function () {
        const textToCopy = this.getAttribute('data-share-text');
        console.log(textToCopy)
        navigator.clipboard.writeText(textToCopy)
            .then(function () {
                alert('Text berhasil disalin ke clipboard!');
            })
            .catch(function (error) {
                console.error('Gagal menyalin teks:', error);
            });
    });
});