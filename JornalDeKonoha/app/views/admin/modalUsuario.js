const fadeModal = document.getElementById("fadeModal");
const botoes = document.getElementsByClassName("btn");
const fechar = document.getElementsByClassName('fechar');
const enviar = document.getElementsByClassName('enviar');


const botoesModal = [...botoes].filter((el) => {
    return el.dataset.modal != null
}) ;

const modalCurrent = () => {
    const modal = document.getElementsByClassName('modal-p');
    const modalOpen = [...modal].filter((modal) => {
        return !modal.classList.contains('hide');
    })

    return modalOpen[0];
}

const toggleModal = (el) => {
    if(el == undefined){
        fadeModal.classList.toggle("hide");
        const currentModal = modalCurrent();
        currentModal.classList.toggle('hide');
    } else {
        const modalOpen = document.getElementById(el);
        modalOpen.classList.toggle("hide");
        fadeModal.classList.toggle("hide");
    }

    
}

[...botoesModal, fadeModal, ...enviar, ...fechar].forEach((el) => {
    console.log(el);
    el.addEventListener("click", () => toggleModal(el.dataset.modal))
})