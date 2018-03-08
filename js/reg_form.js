


function validateEmail(emailField)
{
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (reg.test(emailField.value) == false) 
    {
        $("label#email_error").show();		
		if(!emailField.value == "")
		{
			$("input#company_email").focus();
			return true;
		} 
		else
		{
			return false;
		}     
    }
    else
    {
    	$("label#email_error").hide();
    	return true;
    }
    
}

function validatePhone(phoneField)
{
    var reg = /^\d{10}$/;

    if (reg.test(phoneField.value) == false) 
    {
        $("label#phone_error").show();
        if(!phoneField.value == "")
        {
        	$("input#company_phone").focus();
        	return true;
        }
		else
		{
			return false;
		}        
    }
    else
    {
    	$("label#phone_error").hide();
    	return true;
    }
    
}





$(function() 
{
	$('.error').hide();
    $(".button").click(function() 
    {
      // validate and process form here
      $('.error').hide();
      	var name = $("input#company_name").val();
      		if(name == "")
      		{
      			$("label#name_error").show();
      			$("input#company_name").focus();
      			return false;
      		}

		var email = $("input#company_email").val();
			if(email == "")
			{
				$("label#email_error").show();
				$("input#company_email").focus();
				return false;
			}

		var phone = $("input#company_phone").val();
			if(phone == "")
			{
				$("label#phone_error").show();
				$("input#company_phone").focus();
				return false;
			}

		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone;
		//alert (dataString); return false;
		$.ajax
		({
			type: "POST",
			url: "backend/register.php",
			data: dataString,
			success: function()
			{
				$('#customer_details').html("<div id='message'></div>");
				$('#message').html("<a href = '#'><h2>Registration Successful!</h2></a>").append("<p>You can now upload your products/services.</p>")
				.hide()
				.fadeIn(1500, function()
				{
					$('#message').append("<img id='checkmark' src='img/checkmark.png' />");
				});
			}
		});
		$(document).ready(function(){
    $(this).scrollTop(0);
});
		return false;
	});
});