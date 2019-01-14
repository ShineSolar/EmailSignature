if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker.register("/sw.js").then(reg => {
      // Registration was successful
      console.log("ServiceWorker registration now successful with scope: ", reg.scope);
    }, err => {
      // registration failed :(
      console.log("ServiceWorker registration failed: ", err);
      // log this error
    });
  });
}

// 
let deferredPrompt;
const appAddButton = document.querySelector('.app-add-button');

window.addEventListener('beforeinstallprompt', function(e) {
  e.preventDefault();
  deferredPrompt = e;
  appAddButton.style.visibility = 'visible';
});

appAddButton.addEventListener('click', function() {
  appAddButton.style.visibility = 'hidden';
  deferredPrompt.prompt();
  deferredPrompt = null;
}, false);

// Adding the error validation
const inputs = document.querySelectorAll('input, select');
const inputLength = inputs.length;

for (let i=0; i<inputLength; i++) {
	inputs[i].addEventListener('blur', function() {
		if (!this.classList.contains('blurred')) {
			this.classList.add('blurred');
		}
	}, false);
}

window.onload = function() {
	setTimeout(function() {
		document.querySelector('.loading-screen').style.display = 'none';
	}, 1000);
}
