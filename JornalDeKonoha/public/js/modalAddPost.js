const fadeModal = document.getElementById("fade-modal");
const buttons = document.getElementsByClassName("buttons");

const botoesModal = [...buttons].filter((el) => {
    return el.dataset.modal != null;
});


const toggleModal = (id) => {
    if (id == undefined){
        fadeModal.classList.toggle("hide");
    }
    const modalAbrir = document.getElementById(id);
    modalAbrir.classList.toggle("hide");
    fadeModal.classList.toggle("hide");
}

[...botoesModal, fadeModal].forEach((el) =>{
    el.addEventListener("click", () => toggleModal(el.dataset.modal))
});