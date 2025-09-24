document.getElementById("signUp").addEventListener("submit", function(e){
    e.preventDefault();

    let username = this.username.value.trim();
    let email = this.email.value.trim();
    let pwd = this.pwd.value;
    let pwdRepeat = this.pwdRepeat.value;
    let errorcontainer = document.getElementById('error-message');

    let errors = []
    
    if(!username || !email || !pwd || !pwdRepeat){
       errors.push('All fields are required');
    }
    
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailPattern.test(email) && email){
        errors.push('Invalid email format');
    }

    if(pwd !== pwdRepeat){
        errors.push('Password do not match');
    }

    if(errors.length > 0){
        errorcontainer.innerHTML = errors.join(". ")
        return;
    } else {
        errorcontainer.innerHTML = "";
    }

    let formData = new FormData(this);

    $.ajax({
        url: "./public/handler.php?action=signup",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response){
            try {
                let res = JSON.parse(response);
                if (res.success){
                    window.location.href = "./login.php";
                } else {
                    errorcontainer.innerHTML = res.errors.join('. ');
                }
            } catch (err) {
                console.error("Failed response", err);
            }
        }
    })
})