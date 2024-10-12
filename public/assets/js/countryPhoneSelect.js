var input = document.querySelector(".phone");
window.intlTelInput(input, {
 //allowDropdown: false,
 autoInsertDialCode: true,
// autoPlaceholder: "off",
// dropdownContainer: document.body,
// excludeCountries: ["us"],
 formatOnDisplay: false,
 geoIpLookup: function(callback) {
   fetch("https://ipapi.co/json")
     .then(function(res) { return res.json(); })
     .then(function(data) { callback(data.country_code); })
     .catch(function() { callback("us"); });
 },
 hiddenInput: "full_number",
 initialCountry: "auto",
// localizedCountries: { 'de': 'Deutschland' },
//nationalMode: false,
// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
 placeholderNumberType: "MOBILE",
 preferredCountries: ['us', 'gb','jp','cn', 'mg'],
 separateDialCode: true,
 //showFlags: false,
utilsScript: "/assets/inttelput/js/utils.js"
});

var input2 = document.querySelector("#whatsapp");
window.intlTelInput(input2, {
 //allowDropdown: false,
 autoInsertDialCode: true,
// autoPlaceholder: "off",
// dropdownContainer: document.body,
// excludeCountries: ["us"],
 formatOnDisplay: false,
 geoIpLookup: function(callback) {
   fetch("https://ipapi.co/json")
     .then(function(res) { return res.json(); })
     .then(function(data) { callback(data.country_code); })
     .catch(function() { callback("us"); });
 },
 hiddenInput: "full_number",
 initialCountry: "auto",
// localizedCountries: { 'de': 'Deutschland' },
//nationalMode: false,
// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
 placeholderNumberType: "MOBILE",
 preferredCountries: ['us', 'gb','jp','cn', 'mg'],
 separateDialCode: true,
 //showFlags: false,
utilsScript: "/assets/inttelput/js/utils.js"
});

$(document).ready(function(){
	$('.phone').on('blur', function(){
		var name = $(this).attr('name');
		var parent = $(this).parent();
		var number = $(this).val();
		var full_number = parent.find('.iti__selected-dial-code').text() + number.substr(1);
		var ipt = $(this).parent().find('input[name="full_number"]');
		$(this).parent().find('input[name="full_number"]').attr('name', 'full_' + name); 
		$(this).parent().find('input[name="full_' + name + '"]').val(full_number);
	});
});
