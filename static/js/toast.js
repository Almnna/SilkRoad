// setCookie("temp_user", "ahmad", 10);
let tmp = "";

var path = window.location.pathname;
var page = path.split("/").pop();

if(getCookie("user_created") && page == "index.php")
{
  tmp = getCookie("user_created");
  M.toast({html: `<p style="font-size: 14px;">User ${tmp} Successfully Created! </p>`, classes: 'green rounded', displayLength: 5000, width: 100});
}

if(getCookie("logged_user") && page == "dashboard.php")
{
  tmp = getCookie("logged_user");
  M.toast({html: `<p style="font-size: 14px;">Welcome ${tmp}! </p>`, classes: 'green rounded', displayLength: 5000, width: 100});
}

if(getCookie("loggedout_user") && page == "index.php")
{
  tmp = getCookie("loggedout_user");
  M.toast({html: `<p style="font-size: 14px;">See You Soon ${tmp}! </p>`, classes: 'black rounded', displayLength: 5000, width: 100});
}

if(getCookie("new_item") && page == "post.php")
{
  console.log(getCookie("new_item"));
  tmp = getCookie("new_item");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  M.toast({html: `<p style="font-size: 14px;"> ${tmp}</p>`, classes: 'green rounded', displayLength: 5000, width: 100});
}

if(getCookie("delete_item") && page == "manage.php")
{
  console.log(getCookie("delete_item"));
  tmp = getCookie("delete_item");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  M.toast({html: `<p style="font-size: 14px;"> ${tmp}</p>`, classes: 'green rounded', displayLength: 5000, width: 100});
}

if(getCookie("not_new_item") && page == "post.php")
{
  tmp = getCookie("not_new_item");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  tmp = tmp.replace("+", " ");
  
  M.toast({html: `<p style="font-size: 14px;">${tmp}</p>`, classes: 'red rounded', displayLength: 5000, width: 100});
}


function setCookie(cname, cvalue, sec) 
{
    var d = new Date();
    d.setTime(d.getTime() + sec*1000);//(exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }