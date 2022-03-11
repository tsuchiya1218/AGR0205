// function selectChange1(){
//     pullDown = document.getElementsById('type');
//     if(pullDown=="book"){
//         document.getElementById('firstBox').display = "";
//         document.getElementById('secondBox').display ="none";
//     }
// }
// window.onload = entryChange1;


function radioSwitch(){
    radio = document.getElementsByName('isbn')

    const elm = document.getElementById('rege')

    if(radio[0].checked){
        document.getElementById("s1").style.display ="";
        elm.required = true;
    }else if(radio[1].checked){
        document.getElementById("s1").style.display ="none";
        elm.required = false;
    }
}
window.onload = radioSwitch;