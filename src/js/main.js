if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker.register("/sw.js").then(function(registration) {
      // Registration was successful
      console.log("ServiceWorker registration now successful with scope: ", registration.scope);
    }, function(err) {
      // registration failed :(
      console.log("ServiceWorker registration failed: ", err);
      // log this error
    });
  });
}

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
