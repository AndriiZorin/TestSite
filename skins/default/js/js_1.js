function showHideForm() {

	f = document.getElementById('review_form');
	o = document.getElementById('review_form_overlay'); 

	if (f.style.display == 'none') {
		f.style.display = 'block';
		o.style.display = 'block';
	} else {
		f.style.display = 'none';
		o.style.display = 'none';
	}
}