function sortNumber(input){
    let aa = /[0-9]/mg;
    if(aa.test(input) == false){
        return false;
    } 
    let pattern = input.replace(/[^-.0-9]/g,'').split('').sort().join('');
    return Number(pattern);
}