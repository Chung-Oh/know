// Getting the element
const btnTop = document.querySelector(".btn-top");

// Placing the scroll event
window.onscroll = () => {
	// Where if the top is greater than 500 will show the button
	// and the smaller one will remove
	document.documentElement.scrollTop > 500 || document.body.scrollTop > 500
		? btnTop.style.display = "block"
		: btnTop.style.display = "none";
}

// Event of click on button where will to top smooth
btnTop.addEventListener("click", event => {
	event.preventDefault;
	window.scrollTo({
		top: 0,
		behavior: "smooth"
	});
});