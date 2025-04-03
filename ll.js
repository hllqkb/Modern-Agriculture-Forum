function ll(png,title,text,zh,time){
   t= document.getElementById("title");
   t.innerHTML=title
    t= document.getElementById("t");
   t.innerHTML=title
   t= document.getElementById("zh");
   t.innerHTML=zh
   t= document.getElementById("count");
  te=text.replace(/<br>/g,"\n").length
   t.innerHTML=te
   t= document.getElementById("time");
   t.innerHTML=time
      t= document.getElementById("img");
   t.src=png
      t= document.getElementById("text");
   t.innerHTML=text
}