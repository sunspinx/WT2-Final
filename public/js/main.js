window.onload = function() {
  document.getElementById("timetext").innerHTML = document.getElementById("time").value + " s";
}

function changeTime(value){
  document.getElementById("timetext").innerHTML = value + " s";
}
