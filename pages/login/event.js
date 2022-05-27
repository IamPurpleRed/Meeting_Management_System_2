const user1=document.getElementById('user1');
var count=0;
had=false;
user1.addEventListener("click",showInput);
function showInput()
{
  const newInput=document.createElement("input");
  newInput.type="text";
  newInput.size=26;
  newInput.style="font-size:52px; margin-top:150px;background-color: rgba(256, 256, 256, 0.5);"

  const newInput2=document.createElement("input");
  newInput2.type="text";
  newInput2.size=26;
  newInput2.style="font-size:52px; margin-top:100px;background-color: rgba(256, 256, 256, 0.5);"

  const newButton=document.createElement("button");
  newButton.style="font-size:52px; width:25%;height:8%;border-radius:20%;margin:80px auto; text-align:center; display:block;background-color:light-gray;opacity:0.7;";
  newButton.innerText="Login";
  if(!had)
  {
      document.getElementById('test').appendChild(newInput);
      document.getElementById('test').appendChild(newInput2);
        document.getElementById('test').appendChild(newButton);
      had=true;
  }

}
