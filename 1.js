function BiodataFandy(){
    const biodata  = JSON.parse('{"name": "Fandy Hidayat","age" : 22,"address": "Jln. Rohana Kudus Jorong Pulau Berambai Muaro Sijunjung","hobbies": ["Bermain Tennis","Membuat Video di Youtube"],"is_married": false,"list_school": [{"name":"Politeknik Caltex Riau","year_in":2015,"year_out":2019,"major":"Teknik Informatika"},{"name":"SMA N 1 Sijunjung","year_in":2012,"year_out":2015,"major":"IPA"}],"skills":[{"skill_name":"Javascript", "level":"advanced"},{"skill_name":"UI/UX","level":"advanced"}],"interest_in_coding":true}');
    return biodata;
}

console.log(BiodataFandy());