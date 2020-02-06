$(function(){
    $('#submitForm').click(function(e){
        $('#loader').css("display", "block");
        var name = $('#name').val();
        var email = $('#email').val();
        var flag = validateEmail(email);
        var message = $('#message').val();
        if(name == "" || email == "" || message == ""){
            alert('Fill in all the Fields');
            $('#loader').css("display", "none");
            return;
        }
        if(flag == false){
            alert("wrong email Address");
            $('#loader').css("display", "none");
            return;
        }
        var toEmail = "mawanda111@gmail.com";
        var fromEmail = email;
        var subject = "A Message From your Blog Site"
        var body = message;
        const data = {
            toEmail,
            fromEmail,
            name,
            subject,
            body
        }

        $.post("https://send-email-api.herokuapp.com/send", data, function(data){
                console.log(data)
            if(data.status == 200){
                
                $('#loader').css('display', 'none');
                $('#success').show().delay(3000).fadeOut();
                
            }
            else{
                alert("could not send the information. Sorry")
            }
        } )

    });
})

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}