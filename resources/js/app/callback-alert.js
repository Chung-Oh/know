// If the element has temporary alert class, it will be removed in 15 seconds
if ($('.alert-temporary')) {
	setTimeout(function() {
		$('.alert-temporary').fadeOut(10000);
	}, 5000);
}