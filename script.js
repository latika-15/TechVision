const typewriter = document.getElementById('typewriter');
const text = "Shaping Engineers for future";

async function typeWriter() {
  for (const char of text) {
    await new Promise(resolve => setTimeout(resolve, 100)); // Adjust delay as needed
    typewriter.textContent += char;
  }
}

typeWriter();

const welcomeElement = document.getElementById('welcome');
let isFloating = true;

window.addEventListener('scroll', () => {
  const scrollPosition = window.scrollY;

  if (scrollPosition > 100 && isFloating) { // Adjust the scroll threshold as needed
    welcomeElement.style.animation = 'none';
    isFloating = false;
  } else if (scrollPosition < 100 && !isFloating) {
    welcomeElement.style.animation = 'floatIn 2s ease-in-out';
    isFloating = true;
  }
});


const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signUp');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})

signInButton.addEventListener('click',function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})