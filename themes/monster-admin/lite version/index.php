


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/globe.png">
    <title>Twitter trends</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

   
    <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-analytics.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>

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

    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    const db = firebase.firestore();
    </script>
     <script>
    window.onload = function() {
      var array_data = []
      
      db.collection(<?php echo $_GET['contry']?>).get().then(snapshot => {
              snapshot.docs.forEach(doc => {
    
                  var tweetDB = doc.data().tweet
                  var trendDB = doc.data().trend
                  array_data.push({"y":tweetDB,"label":trendDB,"x":s+=1})
            
                  console.log(array_data)
    
              });
              chart.render()
              document.getElementById("No1").innerHTML = array_data[0]['label'];
              document.getElementById("No2").innerHTML = array_data[1]['label'];
              document.getElementById("no1").innerHTML = array_data[0]['y']+" K";
              document.getElementById("no2").innerHTML = array_data[1]['y']+" K";
          });
    
    
    
      var s = -1
      CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#85C1E9",
                "#5DADE2",
                "#3498DB",
                             
                ]);
      var chart = new CanvasJS.Chart("chartContainer", {
         
        colorSet: "greenShades",
          axisX:{
       labelFontSize: 10,
     },
          axisY: {
              
              suffix:  "k"
          },
          data: [{
              type: "bar",
              yValueFormatString: "#,##0K",
              indexLabel: "{y}",
              indexLabelPlacement: "inside",
              indexLabelFontSize: 10,
              indexLabelFontWeight: "bolder",
              indexLabelFontColor: "white",
              dataPoints: array_data,
          }]
      });
      
    
      
    }
</script>   

   
</head>

<body class="fix-header fix-sidebar card-no-border">
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
   
    <div id="main-wrapper">
      
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
               
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?contry='realtime'">
                       
                        <b>
                          
                            <img src="../assets/images/globe.png" alt="homepage" class="dark-logo" />
                            
                        </b>
                       
                        <span>
                           
                            <img src="../assets/images/name.png" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                
                <div class="navbar-collapse">
                   
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20" >
                                <input type="text" class="form-control" placeholder="Search for..." id = "search"> <a class="srh-btn"><i class="ti-search" onclick="btn_search()"></i></a>
                            </form>
                        </li>
                    </ul>
                    
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            
            <div class="scroll-sidebar">
                
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                   
                        <li>
                        <a class="nav-link" target="_blank" href="table.php?contry='week'">Worldwide of week</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="table.php?contry='month'">Worldwide of month</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="table.php?contry='year'">Worldwide of year</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='realtime'">Worldwide</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='thailand'">Thailand</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='korea'">Korea</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='japan'">Japan</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='united-states'">United States</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='united-kingdom'">United Kingdom</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='france'">France</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='germany'">Germany</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="table.php?contry='argentina'">Argentina</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="table.php?contry='australia'">Australia</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="table.php?contry='austria'">Austria</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='belgium'">Belgium</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='brazil'">Brazil</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='colombia'">Colombia</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='denmark'">Denmark</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='egypt'">Egypt</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='greece'">Greece</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='ghana'">Ghana</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='israel'">Israel</a>
                        </li>
                        
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='italy'">Italy</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='netherlands'">Netherlands</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='new-zealand'">New zealand</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='mexico'">Mexico</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='norway'">Norway</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='vietnam'">vietnam</a>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='panama'">Panama</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='turkey'">Turkey</a>
                        </li>
                        <li>
                        <a class="nav-link" target="_blank" href="index.php?contry='poland'">Poland</a>
                        </li>
                       
                       
                        
                        
                      
          

                        
                        
                    </ul>
                    
                </nav>
               
            </div>
          
        </aside>
      
        <div class="page-wrapper">
           
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">twitter</a></li>
                            <!-- <li class="breadcrumb-item active"><?php echo $_GET['contry']?></li> -->
                        </ol>
                    </div>
                    
                </div>
                
                <div class="row">
                   
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">No.1</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0" id="No1"><i class="ti-arrow-up text-success"></i></h2>
                                    <span class="text-muted">Todays Income</span>
                                </div>
                                <span class="text-success" id="no1"></span>
                                
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">No.2</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0" id="No2"><i class="ti-arrow-up text-info"></i> </h2>
                                    <span class="text-muted">Todays Income</span>
                                </div>
                                <span class="text-info" id="no2">30%</span>
                              
                            </div>
                        </div>
                    </div>
                  
                </div>
                

                
                
                  <div id="chartContainer" style="height: 500px; width: 100%;"></div>
               
                
        </div>
        <footer class="footer text-center">
                © 2020 twitter trends by nimnum sone4eva
            </footer>
        
    </div>
  
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="../assets/plugins/flot/jquery.flot.js"></script>
    <script src="../assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot-data.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
   
    <script>
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

    </script>
        
   
    
</body>

</html>
