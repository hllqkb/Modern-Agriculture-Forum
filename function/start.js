
   function start(png,title,subtitle,zh,time){
  $(document).ready(function() {
a=document.getElementById("a")
b=document.createElement("div")
c=document.createElement("div")
d=document.createElement("img")
e=document.createElement("div")
f=document.createElement("div")
g=document.createElement("div")
i=document.createElement("div")
j=document.createElement("div")
k=document.createElement("i")
l=document.createTextNode(zh)
m=document.createElement("i")
h=document.createTextNode(time)
//懒加载
d.setAttribute("data-original",png)

b.onclick=function (){
var jsPost = function(action, values) {
  var id = Math.random();
  document.write('<form id="post' + id + '" name="post'+ id +'" action="' + action + '" method="post">');
  for (var key in values) {
    document.write('<input type="hidden" name="' + key + '" value="' + values[key] + '" />');
  }
  document.write('</form>');  
  document.getElementById('post' + id).submit();
}
jsPost('../ll.php', {
  'p': png,
  't': title,
  "s":subtitle,
  "z":zh,
  "ti":time
});
        }
g.innerHTML=title
i.innerHTML=subtitle.replace(/<br>/g,"")
b.className="mdui-card mdui-ripple base"
c.className="mdui-card-media"
d.className="lazy"
e.className="mdui-card-media-covered mdui-card-media-covered-gradient"
f.className="mdui-card-primary"
g.className="mdui-card-primary-title"
i.className="mdui-card-primary-subtitle title"
j.className="mdui-divider"
k.innerHTML="account_circle"
m.innerHTML="access_time"
k.className="mdui-icon material-icons"
m.className="mdui-icon material-icons"
a.appendChild(b)
b.appendChild(c)
c.appendChild(d)
c.appendChild(e)
e.appendChild(f)
f.appendChild(g)
f.appendChild(i)
f.appendChild(j)
f.appendChild(j)
f.appendChild(k)
f.appendChild(l)
f.appendChild(m)
f.appendChild(h)
$(d).lazyload();
});
}