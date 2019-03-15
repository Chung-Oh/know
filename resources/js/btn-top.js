const btnTop = document.querySelector(".btn-top");

window.onscroll = () => {
	document.documentElement.scrollTop > 1 || document.body.scrollTop > 1
		? btnTop.style.display = "block"
		: btnTop.style.display = "none";
}

btnTop.addEventListener("click", event => {
	event.preventDefault;
	window.scrollTo({
		top: 0,
		behavior: "smooth"
	});
});