$("#search").keyup(() => {
    let text = $("#search").val();
    // console.log(text);
    var xrequ = new XMLHttpRequest();
    xrequ.onreadystatechange = function(){
        if(xrequ.readyState == 4 && xrequ.status == 200){
            console.log(xrequ.responseText);
            document.getElementById("main").innerHTML = xrequ.responseText;
        }
    }
    xrequ.open("GET", "db_warehouse.php?q="+text, true);
    xrequ.send();
});