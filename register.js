const email = document.getElementById('emailfield')
const pass = document.getElementById('passfield')
const nameu = document.getElementById('namefield')
const pass2 = document.getElementById('passfield2')
const form = document.getElementById('signupform')
const error =document.getElementById('error')

form.addEventListener('submit' ,(e) =>{
   let messages = []
   if (email.value === '' || email.value == null)
   {
    messages.push('email is required')
   }
   if (pass.value === '' || pass.value == null || pass2.value === '' || pass2.value == null)
   {
    messages.push('password is required')
   }
   if (nameu.value === '' || nameu.value == null)
   {
    messages.push('name is required')
   }
   if(pass.value != pass2.value)
   {
    messages.push('passwords dont match')
   }
   if(messages.length > 0)
   {
    e.preventDefault()
    error.innerText = messages.join('\n')
   }
   else{
    error.innerText = messages.join('\n')
   }
    
})