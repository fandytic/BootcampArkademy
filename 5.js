function countChar(kata,character){
    let map = {};
    if(!kata.includes(character)){
        return "Not Found";
    }  
    for(let huruf of kata){
        map[huruf] = map[huruf] + 1 || 1;
    }
    return map[character];
}