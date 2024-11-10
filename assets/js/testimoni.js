let rating = 0;

function setRating(starNumber) {
    rating = starNumber;
    for (let i = 1; i <= 5; i++) {
        const star = document.getElementById(`star-${i}`);
        if (i <= starNumber) {
            star.classList.remove('text-gray-400');
            star.classList.add('text-yellow-500');
        } else {
            star.classList.remove('text-yellow-500');
            star.classList.add('text-gray-400');
        }
    }
    document.getElementById("star").value = rating;
    console.log('Rating yang dipilih:', rating);
}

function validateForm() {
    if (rating === 0) {
        alert("Silakan pilih jumlah bintang sebelum mengirim testimoni.");
        return false;
    }
    return true;
}

function showForm() {
    document.getElementById('formTestimoni').style.display = 'block';
    document.getElementById('thanksTestimoni').style.display = 'none';
}