
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

const renderResults = (val) => {
  const message = document.querySelector('.comercio-body__test-discount')?.textContent
  const getVal = document.querySelector('.js-render-result')
  const getModal = document.querySelector('.comercio-modal__content')
  
  let htmlToRender = '<div class="comercio-validation__loading">loading...</div>'
  console.log(val)
  if(val.length === 0  || val.isBlack === "false") {
    htmlToRender = `<div class="comercio-validation__black"><h3 class="comercio-validation__no-black--message">Documento no válido</h3><p class="comercio-validation__black--message">No aplica descuento</p></div>`

    getModal.classList.add('comercio-modal__content--no-black')
  }

  if(val.isBlack === "true") {
    htmlToRender = `<div class="comercio-validation__black"><h3 class="comercio-validation__black--message">Documento válido</h3><p class="comercio-validation__pargraph">${message}</p></div>`
    getModal.classList.remove('comercio-modal__content--no-black')
  }
  getVal.innerHTML = htmlToRender
  
}


const validationBlack = (getSendBtn) => {

  getSendBtn.addEventListener('click', (e) => {
    const getInputValue = document.querySelector('.comercio-validation__input');
    
    const requestOptions = {
      method: "GET",
    };
    
    fetch("https://beneficioscolombia-test.smartfitcolombia.com/index.php//wp-json/smartfit/v1/idblack/" + getInputValue.value + "", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        let resultVal = JSON.parse(result);
        renderResults(resultVal)
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
    btnTriggerModal(getSendBtn)
  }



})