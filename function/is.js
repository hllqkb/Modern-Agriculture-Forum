var xhr = new XMLHttpRequest();
xhr.onload = function () {
    // 输出接收到的文字数据
    if (xhr.responseText=="请重新登录"){
            mdui.alert(xhr.responseText);
    setTimeout(function (){
    window.location="index.php"
},1000)
}
}
xhr.onerror = function () {
    mdui.alert("未知行为");
}
xhr.open("post", "home.php", true);
xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xhr.send();
