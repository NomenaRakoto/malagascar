function encodeImageFileBase64(element) {
  var imagebase64 = "";
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    imagebase64 = reader.result;
    element.parentElement.getElementsByClassName('img-preview')[0].setAttribute("src", imagebase64);
  }
  reader.readAsDataURL(file);
}

$(document).ready(function(){
	$('.mdf-photo').on('click', function(){
	  $('#' + $(this).attr('target')).click();
	});
});