function Username(user){ 
    var regex = /^[A-Za-z]{6,6}$/;
    if(user.value.match(regex)){ 
        alert('Benar')
        return true;
    } else { 
        alert('Salah tidak boleh selain huruf dan harus 6 huruf')
        return false;
    }
}
function Password(pass){
    var regex = /^[A-Za-z]{6,10}$/;
    if(pass.value.match(regex)){ 
        alert('Benar')
        return true;
    } else { 
        alert('Salah tidak boleh selain huruf dan harus 6 huruf')
        return false;
    }
}