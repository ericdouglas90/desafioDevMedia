let modalEl = document.querySelector('.btn-modal');

modalEl.addEventListener('click', () => {

  if(document.querySelector('.modal-hidden').style.display === 'block') {
    document.querySelector('.modal-hidden').style.display = 'none';
    modalEl.classList.remove('active')
  }else {
    document.querySelector('.modal-hidden').style.display = 'block';
    modalEl.classList.add('active')
  
  }

})

