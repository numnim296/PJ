
function table_add(){
    outputHTML = "";
    for (var e = 0;e<=h;e++){
        outputHTML+="<tr><td>"+(e+1)+"</td><td>"+array_dataW[e]['label']+"</td><td>"+array_dataW[e]['y']+" K</td></tr>";


}
    document.getElementById("tableW").innerHTML = outputHTML; 
}

function btn_search(){
    dataContry = ['thailand','korea','japan','canada','united-states','united-kingdom','france','germany','argentina','australia','austria','belgium','brazil','colombia','denmark','egypt','greece','ghana','israel','italy','netherlands','new-zealand','mexico','norway','vietnam','panama','turkey','poland']
    var search = document.getElementById("search");
    var searchDa = search.value.toLowerCase();
    var boolcheck = dataContry.includes(searchDa);
    
   
    if (boolcheck == true){
        window.location.href = "index.php?contry='"+searchDa+"'";
    }
    else{
      alert("Don't have this country please try again!!"+searchDa);
    
    }
   

   

    
}



                 