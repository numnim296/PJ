<?php

use Symfony\Component\VarExporter\Internal\Values;

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
$elementsV = array();
$url = 'https://getdaytrends.com/top/tweeted/month/';
$content = file_get_contents($url);
$doc = new DOMDocument();
$doc->loadHTML($content);
$k = "";
$v = "";
$i = 0;
$j = 0;
$g = 0;
$d = 0;
$f = 0;



foreach($doc->getElementsByTagName('td') as $element){

    $j++;
    if($j<=200){
        $i++;
        if(($i%4) == 1){
            $d++;
               $elements["a{$d}"] = "$element->nodeValue";
        }
    }
    
   
    
    
}

foreach($doc->getElementsByTagName('td') as $element){

    $g++;
    if($g<=200){
        $i++;
        if(($i%4) == 2){
            $f++;
            $elementsV["a{$f}"] = "$element->nodeValue";
    }
}
    
}

$ff = array_merge_recursive($elements,$elementsV);

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
    

    <script>

    var passedArray =  <?php echo json_encode($ff); ?>; 
       
// console.log(passedArray["a1"][1][-1]); 


     for (var w = 0; w<= 50; w++){
        
        db.collection("month").doc((w+1).toString()).set({
            
            trend: passedArray["a"+(w+1)][0],
            
            tweet: conNull()
            // tweet: passedArray["a"+(w+1)][1],
            

        })
        .then(function() {
            console.log("Document successfully written!");
        })
        .catch(function(error) {
            console.error("Error writing document: ", error);
        });
    }
   
// }

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