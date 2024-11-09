document.addEventListener("DOMContentLoaded", function() {
    const selectElement = document.getElementById('template');
    showTemplateContent(selectElement);
});
function showTemplateContent(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    let dataTemplate = selectedOption.dataset.template;
    document.getElementById('chatContent').innerText  = dataTemplate;
}