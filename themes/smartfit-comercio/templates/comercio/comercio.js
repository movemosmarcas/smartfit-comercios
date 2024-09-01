
const closeModal = () =>{
  const closeModal = document.querySelectorAll('.close-modal__close, .btn.btn--cancel')
  const getModal = document.querySelector('.comercio-modal')

  closeModal.forEach((element) => {
    element.addEventListener('click', (e) => getModal.close())
  })

  document.addEventListener('keydown', (e) => {
    if(e.key === 'Escape'){
      getModal.close()
    }
  })
}

const btnTriggerModal = (element) => {
    element.addEventListener('click', (e) => {
    const getModal = document.querySelector('.comercio-modal')
    getModal.showModal()
    closeModal()
  }) 
}

const renderResults = (val = false) => {
  closeModal()
  const getVal = document.querySelector('.comercio-val')
  let htmlToRender = `<div class="comercio-val__content"><h3 class="comercio-val__title">Tipo de Usuario</h3><p class="comercio-val__text">${val ? 'BLACK' : 'NO SE RECONOCE USUARIO BLACK'}</p></div>`

  getVal.innerHTML = htmlToRender
  
}


const validationBlack = (getSendBtn) => {

  getSendBtn.addEventListener('click', (e) => {
    const getInputValue = document.querySelector('.comercio-modal__input');
    
    const requestOptions = {
      method: "GET",
      redirect: "follow",
      Headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer 3952b3501112af42f568221f1c10da54"
      }
    };
    
    fetch("https://app.smartfit.com.br/api/v3/validate_black/" + getInputValue.value + "", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        console.log(result)
        renderResults()
      })
      .catch((error) => {
        console.error(error)
        renderResults()
      });

    })
}


window.addEventListener('DOMContentLoaded', () => {
  const getSendBtn = document.querySelector('.js-btn-validate');
  const getBtnTriggerModal = document.querySelector('.comercio-body__btn-val');

  if(getSendBtn){
    validationBlack(getSendBtn);
  }

  if(getBtnTriggerModal){
    btnTriggerModal(getBtnTriggerModal)
  }

})