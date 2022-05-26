const user1=document.getElementById('user1');
const userLeft=document.getElementById('userLeft');
const userRight=document.getElementById('userRight');
var count=0;
had=false;
user1.addEventListener("click",showInput);
userLeft.addEventListener("click",showInput);
userRight.addEventListener("click",showInput);




function showInput(){
const newInput=document.createElement("input");
newInput.type="text";
newInput.size=27;
newInput.style="font-size:52px; margin-top:150px;"

const newInput2=document.createElement("input");
newInput2.type="text";
newInput2.size=27;
newInput2.style="font-size:52px; margin-top:150px;"
if(!had)
{
    document.getElementById('test').appendChild(newInput);
    document.getElementById('test').appendChild(newInput2);
    had=true;
}

}
