const fadeModal = document.getElementById("fade-modal");
const buttons = document.getElementsByClassName("buttons");

const botoesModal = [...buttons].filter((el) => {
    return el.dataset.modal != null;
});

const modalAtual = () => {
    const modal = document.getElementsByClassName("modal-p");
    const modalAberto = [...modal].filter((modal) =>{
        return !modal.classList.contains("hide");
    })
    return modalAberto[0];
}


const toggleModal = (id) => {
    if (id == undefined){
        fadeModal.classList.toggle("hide");
        const atual = modalAtual();
        atual.classList.toggle("hide");
    }
    else {
    const modalAbrir = document.getElementById(id);
    modalAbrir.classList.toggle("hide");
    fadeModal.classList.toggle("hide");
    }
}

const voltar =  document.getElementsByClassName("voltar");

[...botoesModal, fadeModal, ...voltar].forEach((el) =>{
    el.addEventListener("click", () => toggleModal(el.dataset.modal))
});