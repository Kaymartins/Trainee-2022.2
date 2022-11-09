const fadeModal = document.getElementById("fadeModal");
const botoes = document.getElementsByClassName("botao");

const botoesModal = [...botoes].filter((el) => {
    return el.dataset.modal != null
});

const modalCurrent = () => {
    const modal = document.getElementsByClassName("modal-p");
    const modalOpen = [...modal].filter((modal) => {
        return !modal.classList.contains("hide");
    })
    return modalOpen[0];
}

const toggleModal = (id) => {
    if(id == undefined){
        fadeModal.classList.toggle("hide");
        const currentModal = modalCurrent();
        currentModal.classList.toggle("hide");
    } else {
        const modalOpen = document.getElementById(id);
        modalOpen.classList.toggle("hide");
        fadeModal.classList.toggle("hide");
    }

}

const fechar = document.getElementsByClassName("fechar");

[...botoesModal, fadeModal, ...fechar].forEach((el) => {
    el.addEventListener("click", () => toggleModal(el.dataset.modal))
})