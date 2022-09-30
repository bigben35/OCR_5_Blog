   // ANIMATION BTN CREATE AN ACCOUNT     

   let button = document.querySelector('.createUserAccount');
   let checkbox = document.getElementById('autorisation');

   checkbox.addEventListener('click', () => {
   button.classList.toggle('activeBtn');
   
})