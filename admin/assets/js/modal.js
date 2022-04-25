$(document).on('click', '.open-modal', function() {
    openModal(0);
    return 0;
});

$(document).on('click', '.close-modal', function() {
    closeModal(0);
    return 0;
});

$('.modal').on('click', function(e) {
    if (e.target !== this)
        return;
    closeModal($(this).attr('name'));
});

function openModal(index){
    let modal = document.getElementsByClassName('modal')[index];
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.overflow = 'auto';
}

function closeModal(index){
    let modal = document.getElementsByClassName('modal')[index];
    modal.style.width = '0';
    modal.style.height = '0';
    modal.style.overflow = 'hidden';
}