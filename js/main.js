const inputs = document.querySelectorAll('input, select');
const inputLength = inputs.length;

for (let i=0; i<inputLength; i++) {
	inputs[i].addEventListener('blur', function() {
		if (!this.classList.contains('blurred')) {
			this.classList.add('blurred');
		}
	}, false);
}