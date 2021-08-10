//Ajax Call for thhe sign up form
//Once the form is submitted
$("#signupform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    $.ajax({
        type: 'POST',
        url: 'index_back.php',
        data:$('#signup').serialize(),
        success: function(){
            alert('form submitted !');
        }
    })
});