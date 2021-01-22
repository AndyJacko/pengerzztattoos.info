let exampleModal = document.getElementById('imageModal');
exampleModal.addEventListener('show.bs.modal', function (event) {
  let button = event.relatedTarget;
  let imgToShow = button.getAttribute('data-bs-img');
  let modalBodyImg = exampleModal.querySelector('.modal-body img');
  modalBodyImg.src = "/images/tattoos/m/" + imgToShow;
});