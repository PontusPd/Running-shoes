
$(document).ready(function(){	
	displayCss();
  sortDropDownListByText();
  $('.align-products:last-child').addClass('last-randomproduct');
});
  function toggleClock() { 
    var loginId = document.getElementById('log-in');
    var regId = document.getElementById('reg-in');
    var btnId = document.getElementById('showreg-btn');
    var displaySettingLog = loginId.style.display;
    var displaySettingReg = regId.style.display;
    console.log('asadasdsasasda');
    if (displaySettingLog == 'block') { 
		loginId.style.display = 'none';
		regId.style.display = 'block';    	
    	btnId.innerHTML = 'Log in';
    }
    else {  
		loginId.style.display = 'block';
		regId.style.display = 'none';
    	btnId.innerHTML = 'Register';
    }
  }

  function displayCss(){
    var regId = document.getElementsByClassName('reg-group-in');
	var loginId = document.getElementsByClassName('log-group-in');
    
    if (regId) {
	    for (var i = 0; i < regId.length; i++) {
	    	regId[i].style.display = 'none';
		}
	}
	if (loginId) {
   	    for (var i = 0; i < loginId.length; i++) {
    		loginId[i].style.display = 'block';
   		}
	}
  }

  function sortDropDownListByText() {
    // Loop for each select element on the page.
    $("select").each(function() {
         
        // Keep track of the selected option.
        var selectedValue = $(this).val();
 
        // Sort all the options by text. I could easily sort these by val.
        $(this).html($("option", $(this)).sort(function(a, b) {
            return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
        }));
 
        // Select one option.
        $(this).val(selectedValue);
    });
}