function toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

function toggleSignUp(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); // display:block or none
    $('#logreg-forms .form-signup').toggle(); // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    $('#logreg-forms #btn-signup').click(toggleSignUp);
    $('#logreg-forms #cancel_signup').click(toggleSignUp);
})
$(function(){

$("#signup-form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(), 
         success: function(data)
         {

             location.reload();
         },
         error : function (xhr, status, error) {
          form.find( ".form-failure-message" ).removeClass('d-none');
          setTimeout(function(){ 
            form.find( ".form-failure-message" ).addClass('d-none');
          }, 5000);
         }
       });
});

$("#login-form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(), 
         success: function(data)
         {	
         	 localStorage.setItem('access_token', data.access_token);
             //location.reload();
             window.location = "/profile";
         },
         error : function (xhr, status, error) {
          form.find( ".form-failure-message" ).removeClass('d-none');
          setTimeout(function(){ 
            form.find( ".form-failure-message" ).addClass('d-none');
          }, 5000);
         }
       });
});

$("#profile-update-form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    
    var form = $(this);
    var url = form.attr('action');
    const access_token = localStorage.getItem('access_token');
    $.ajax({
         type: "POST",
         url: url,
         beforeSend: function(request){
		    request.setRequestHeader('Authorization', 'Bearer ' + access_token);
		 },
         data: form.serialize(), 
         success: function(data)
         {	
         	location.reload();
         },
         error : function (xhr, status, error) {
          form.find( ".form-failure-message" ).removeClass('d-none');
          setTimeout(function(){ 
            form.find( ".form-failure-message" ).addClass('d-none');
          }, 5000);
         }
       });
});

if ($(".profile-update-form").length > 0) {
	const access_token = localStorage.getItem('access_token');
	if (access_token.length > 0 ) {
		$.ajax({
            url: '/api/auth/getUser',
            beforeSend: function(request){
                request.setRequestHeader('Authorization', 'Bearer ' + access_token);
            },
            type: 'GET',
            success: function(data) {
               fill_details(data);
            },
            error: function() {
                alert('error');
            }
        });
	}
}
	function fill_details(data) {
		$("#email").val(data.user.email);
		$("#name").val(data.user.name);
		$("#phone").val(data.user.phone);
		$("#wife").val(data.user_details.wife);
		$("#child").val(data.user_details.child);
		$("#father").val(data.user_details.father);
		$("#mother").val(data.user_details.mother);
		$("#address").val(data.user_details.address);
		$("#country").val(data.user_details.country);
		$("#state").val(data.user_details.state);
		$("#zip").val(data.user_details.zip);
		
	}
});