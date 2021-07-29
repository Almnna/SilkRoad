

var text = '{"id": "240", "name": "ahmad"}, {"id": "222", "name": "khalid"}, {"id": "203", "name": "alsafi"}';

//var people = JSON.parse(text);
var people = JSON.stringify(text)
// console.log(people);

document.getElementById("1").innerHTML = "1";
$("#1").onready(() => {
    this.innerText = people.name;
});