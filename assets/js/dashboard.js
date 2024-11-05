const menuButton = document.getElementById('menuButton');
const menuDropdown = document.getElementById('menuDropdown');
const counters = document.querySelectorAll('.count');

menuButton.addEventListener('click', () => {
    menuDropdown.classList.toggle('hidden');
});

document.addEventListener('click', (event) => {
    if (!menuButton.contains(event.target) && !menuDropdown.contains(event.target)) {
        menuDropdown.classList.add('hidden');
    }
});

counters.forEach(counter => {
    const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / 100;

        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(updateCount, 25); 
        } else {
            counter.innerText = target;
        }
    };
    updateCount();
});