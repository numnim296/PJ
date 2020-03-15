<?php

use Symfony\Component\VarExporter\Internal\Values;

$contry = $_GET['contry'];

include_once("simple_html_dom.php");
//use curl to get html content
function getHTML($url,$timeout)
{
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
       return @curl_exec($ch);
}


ini_set('display_errors',0);
$elements = array();
if($contry == 'realtime'){
    $url = 'https://twitter-trends.iamrohit.in/';
}
else{
    $url = 'https://twitter-trends.iamrohit.in/'.$contry;
}
// $url = 'https://twitter-trends.iamrohit.in/'.$contry;
// $url = 'https://twitter-trends.iamrohit.in/';
$content = file_get_contents($url);
$doc = new DOMDocument();
$doc->loadHTML($content);
$k = "";
$v = "";
$i = 0;
$j = 0;
$g = 0;
$d = 0;
foreach($doc->getElementsByTagName('th') as $element){
    if($i <= 61 && $i >=3){ 
        
       
        if($j % 3 == 1 ){
            $d++;
           $elements["a{$d}"] = "$element->nodeValue";
            $i++; 
            $j++;
            
        }
        else{
            $i++;
            $j++;
        }
        
    }
    else{
        $i++;
    }

}

$elementsV = array();
$docV = new DOMDocument();
$docV->loadHTML($content);
$kV = "";
$v = "";
$iV = 0;
$dV = 0;
$jV = 0;
$gV = 0;
foreach($docV->getElementsByTagName('th') as $element){
    if($iV <= 62 && $iV >=3){ 
        
       
        // $elements[] = $element->nodeValue;
        // $i++;
        if($jV % 3 == 2 ){
            
            $dV++;
           $elementsV["a{$dV}"] = $element->nodeValue;
            $iV++; 
            $jV++;
            
        }
        else{
            $iV++;
            $jV++;
        }
        
    }
    else{
        $iV++;
    }

}

// $doc->saveHTML();

// $docV->saveHTML();
$ff = array_merge_recursive($elements,$elementsV);


echo "<pre>";


echo "<pre>";
print_r($ff);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-analytics.js"></script>
        <script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAmATixVLrIsLCD9_6Tf7PysW6oQif5VoM",
    authDomain: "webprojectfinal-a0071.firebaseapp.com",
    databaseURL: "https://webprojectfinal-a0071.firebaseio.com",
    projectId: "webprojectfinal-a0071",
    storageBucket: "webprojectfinal-a0071.appspot.com",
    messagingSenderId: "162499703410",
    appId: "1:162499703410:web:d024a3bd470e4e8c6a88eb",
    measurementId: "G-JL5GVH5RYJ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  const db = firebase.firestore();
</script>
  
    <title>Document</title>
</head>
<body>
    <!-- <script src="addDB.js"></script> -->

    <script>

    // db.collection("mu1").doc().set({
    //         trend: "snsd",
    //         tweet: "10k",
            

    //     })
    //     .then(function() {
    //         console.log("Document successfully written!");
    //     })
    //     .catch(function(error) {
    //         console.error("Error writing document: ", error);
    //     });

    // for (var s = 0; s<= 20; s++){
    //     db.collection("mu1").doc().set({
    //         trend: "gggg",
    //         tweet: "ll",
            

    //     })
    //     .then(function() {
    //         console.log("Document successfully written!");
    //     })
    //     .catch(function(error) {
    //         console.error("Error writing document: ", error);
    //     });
    // }
    
    
    // }
    var passedArray =  
    <?php echo json_encode($ff); ?>; 
       
console.log(passedArray["a1"][0]); 
// for (var w = 1 ; w<=20;w++){
    

    // document.write(c)

     for (var w = 0; w< 10; w++){
        
        // db.collection("").doc((w+1).toString()).set({
            db.collection("<?php echo $_GET['contry'] ?>").doc((w+1).toString()).set({
            
            trend: passedArray["a"+(w+1)][0],
            // tweet: passedArray["a"+(w+1)][1],
            tweet: conNull()
            

        })
        .then(function() {
            console.log("Document successfully written!");
        })
        .catch(function(error) {
            console.error("Error writing document: ", error);
        });
    }
   


function conNull(){
                if(passedArray["a"+(w+1)][1] == ""){
                    return parseFloat(10);
                }
                if(passedArray["a"+(w+1)][1].slice(-1)=="M"){
                         var datatweet = passedArray["a"+(w+1)][1];
                    var datatweet =datatweet.split("M");
                   
                        return parseFloat(datatweet[0])*1000;
                }
                if(passedArray["a"+(w+1)][1].slice(-1)=="K"){
                        var datatweet = passedArray["a"+(w+1)][1];
                    var datatweet =datatweet.split("K");
                   
                        return parseFloat(datatweet[0]);
                }
            };

    </script>
</body>
</html>