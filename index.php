<?php
  require __DIR__ . '/users/users.php';
  $users = getUsers();
  $userId = $_GET['id'];
  $errors = [];

$user = getUserById($userId);
if (!$user) {
    include "partials/not_found.php";
    exit;
}

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "partials/not_found.php";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {
      $user = updateUser($_POST, $userId);

      return header('Location: /Results.php');
    }
}
?>
<?php
$game = getUserById('game');
$letter = $game['letter']
?>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">    
      <link rel="stylesheet" href="./vendor/bootstrap/dist/css/bootstrap-grid.min.css">
      <link rel="stylesheet" href="./vendor/bootstrap/dist/css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="./vendor/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="./css/sweetalert2.css">
      <link rel="stylesheet" href="./css/sweetalert2.min.css">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <!-- Primary Meta Tags -->
      <title>ქალაქობანა</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="title" content="ქალაქობანა">
      <meta name="author" content="Kvali">
      <link rel="canonical" href="https://Kvali.dev/product/ui-kits/neumorphism-ui/">
      <!--  Social tags -->
      <meta name="keywords" content="ქალაქობანა, kalakobana, khalakhobana, qalaqobana">
      <meta name="description" content="KvaliDev ქალაქობანა">
      <!-- Schema.org markup for Google+ -->
      <meta itemprop="name" content="ქალაქობანა">
      <meta itemprop="description" content="KvaliDev ქალაქობანა">
      <meta itemprop="image" content="https://cdn.discordapp.com/emojis/817491907529015308.png?v=1">
      <!-- Twitter Card data -->
      <meta name="twitter:card" content="product">
      <meta name="twitter:site" content="@Kvali">
      <meta name="twitter:title" content="ქალაქობანა">
      <meta name="twitter:description" content="KvaliDev ქალაქობანა">
      <meta name="twitter:creator" content="@Kvali">
      <meta name="twitter:image" content="https://cdn.discordapp.com/emojis/817491907529015308.png?v=1">
      <!-- Open Graph data -->
      <meta property="fb:app_id" content="214738555737136">
      <meta property="og:title" content="ქალაქობანა">
      <meta property="og:type" content="article">
      <meta property="og:url" content="https://demo.Kvali.dev/neumorphism-ui/">
      <meta property="og:image" content="https://cdn.discordapp.com/emojis/817491907529015308.png?v=1">
      <meta property="og:description" content="KvaliDev ქალაქობანა">
      <meta property="og:site_name" content="Kvali">
      <!-- Favicon -->
      <link rel="apple-touch-icon" sizes="120x120" href="https://cdn.discordapp.com/emojis/817491907529015308.png?v=1">
      <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.discordapp.com/emojis/817491907529015308.png?v=1">
      <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.discordapp.com/emojis/817491907529015308.png?v=1">
      <link rel="manifest" href="./assets/img/favicon/site.webmanifest">
      <link rel="mask-icon" href="https://cdn.discordapp.com/emojis/817491907529015308.png?v=1" color="#ffffff">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="theme-color" content="#ffffff">
      <!-- Fontawesome -->
      <link type="text/css" href="./vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
      <!-- Pixel CSS -->
      <link type="text/css" href="./css/neumorphism.css" rel="stylesheet">
      <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
      <link rel="stylesheet" href="./css/style.css">
   </head>
   <style>
      input {
      ::placeholder{color:#fff}
      :-ms-input-placeholder {color:#fff}
      ::-ms-input-placeholder {color:#fff}
      }
   </style>
   <style>
      .button {
      position: absolute;
      left: 50%;
      top: 58%;
      width: 100px;
      }
     
      .hide {
        display: none;
      }
     
   </style>
   <body>
      <br>
      <br>
      <br>
      <br>
      <!-- input table -->
     <form method="POST" enctype="multipart/form-data" action="" id="gameForm" autocomplete="off">
      <div class="mb-5 center">

        <?php if(count($errors)): ?>
          <div class="alert alert-danger mb-3" role="alert">
            <ul>
              <?php foreach($errors as $error): ?>
                <li><?=$error?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif ?>
        <h4 class="mb-3" style="text-align:center;" id="letter">არჩეული ასო-ბგერაა: <?php echo $letter?></h4>
         <table class="table shadow-soft rounded">
            <tbody>
               <tr>
                  <th class="border-0" style="text-align:center; <?php if(isset($errors['city'])){    echo 'color:red;'; }?>" scope="col">ქალაქი</th>
                  <th class="border-0" style="text-align:center; <?php if(isset($errors['country'])){ echo 'color:red;'; }?>" scope="col">ქვეყანა</th>
                  <th class="border-0" style="text-align:center; <?php if(isset($errors['animal'])){  echo 'color:red;'; }?>" scope="col">ცხოველი</th>
                  <th class="border-0" style="text-align:center; <?php if(isset($errors['bird'])){    echo 'color:red;'; }?>" scope="col">ფრინველი</th>
                  <th class="border-0" style="text-align:center; <?php if(isset($errors['plant'])){   echo 'color:red;'; }?>" scope="col">მცენარე</th>
                  <th class="border-0" style="text-align:center; <?php if(isset($errors['thing'])){   echo 'color:red;'; }?>" scope="col">ნივთი</th>
                  <th class="border-0" style="text-align:center; <?php if(isset($errors['movie'])){   echo 'color:red;'; }?>" scope="col">ფილმი</th>
               </tr>
               <tr>
                  <td>
                     <input type="text" name="city"    class="form-control" value="">
                  </td>
                  <td>
                     <input type="text" name="country" class="form-control" value="">
                  </td>
                  <td>
                     <input type="text" name="animal"  class="form-control" value="">
                  </td>
                  <td>
                     <input type="text" name="bird"    class="form-control" value="">
                  </td>
                  <td>
                     <input type="text" name="plant"   class="form-control" value="">
                  </td>
                  <td>
                     <input type="text" name="thing"   class="form-control" value="">
                  </td>
                  <td>
                     <input type="text" name="movie"   class="form-control" value="">
                  </td>
                 <td class="hide">
                     <input type="hidden" name="done" class="form-control" value="1">
                    <input type="hidden" name="free" class="form-control" value="1">
                   <input type="hidden" name="result" id="inputResult" class="form-control" value="0">
                  </td>
               </tr>
            </tbody>
         </table>

              <br>
          <button type="submit" id="doneBTN" class="btn btn-primary text-success">მოვრჩი</button>
      </div>

      <!-- end of the table -->
</form>
      <header class="header-global">
         <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-transparent headroom--not-bottom headroom--pinned headroom--top">
            <div class="container position-relative">
               <a class="navbar-brand shadow-soft py-2 px-3 rounded border border-light mr-lg-4" href="/">
               <img class="navbar-brand-dark" src="./assets/img/brand/dark.svg" alt="Logo light">
               <img class="navbar-brand-light" src="./assets/img/brand/dark.svg" alt="Logo dark">
               </a>
               <div class="navbar-collapse collapse" id="navbar_global">
                  <div class="navbar-collapse-header">
                     <div class="row">
                        <div class="col-6 collapse-brand">
                           <a href="./index.php" class="navbar-brand shadow-soft py-2 px-3 rounded border border-light">
                           <img src="./assets/img/brand/dark.svg" alt="Kvali logo">
                           </a>
                        </div>
                        <div class="col-6 collapse-close">
                           <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                     </div>
                  </div>
               </div>
               <button class="navbar-toggler ml-2" type="button" data-toggle="collapse"
                  data-target="#navbar_global" aria-controls="navbar_global"
                  aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div>
                  <style>
                     .avatar {
                     width: 50px;
                     height: 50px;
                     border-radius: 50%;
                     }
                     .ProfilePic {
                     position: absolute;
                     left: 85%;
                     top: 5%;
                     }
                  </style>
                  <img src="discordo.png" alt="Avatar" class="avatar ProfilePic">
               </div>

               
<!--                <div class="btn-container">
                  <button  class="button black btn btn-primary wallet" id="Wallet" ></button>
                  <div class="menu MenuPosition">
                      <div class="first-row">
                        <h2>ფული</h2>
                      </div>
                      <div class="second-row">
                        <div class="second-row-item black btn btn-primary">
                            <p>500🪙</p>
                            <p>3 ლარი</p>
                        </div>
                        <div class="second-row-item black btn btn-primary">
                            <p>1000🪙</p>
                            <p>7 ლარი</p>
                        </div>
                        <div class="second-row-item black btn btn-primary">
                            <p>1500🪙</p>
                            <p>10 ლარი</p>
                        </div>
                      </div>
                      <div class="third-row">
                        <h2 class="black btn btn-primary">უყურე ვიდეოს $50-ისთვის</h2>
                      </div>
                      <div class="fourth-row">
                        <h3 id="cancel" class="black btn btn-primary">გაუქმება</h3>
                      </div>
                  </div>
               </div> -->


            </div>
         </nav>
      </header>

      <main>
         <div class="container mt-3">
         </div>
      </main>
      <!-- Core -->
      <script src="./vendor/jquery/dist/jquery.min.js"></script>
      <script src="./vendor/popper.js/dist/umd/popper.min.js"></script>
      <script src="./vendor/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="./vendor/headroom.js/dist/headroom.min.js"></script>
      <!-- Vendor JS -->
      <script src="./vendor/onscreen/dist/on-screen.umd.min.js"></script>
      <script src="./vendor/nouislider/distribute/nouislider.min.js"></script>
      <script src="./vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <script src="./vendor/waypoints/lib/jquery.waypoints.min.js"></script>
      <script src="./vendor/jarallax/dist/jarallax.min.js"></script>
      <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>
      <script src="./vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
      <script src="./vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
      <script src="./vendor/prismjs/prism.js"></script>
      <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
      <!-- Neumorphism JS -->
      <script src="./assets/js/neumorphism.js"></script>
      <!-- sweetalert -->
      <script src="./js/sweetalert2.all.js"></script>
      <script src="./js/sweetalert2.all.min.js"></script>
      <script src="./js/sweetalert2.js"></script>
      <script src="./js/sweetalert2.min.js"></script>
      <!-- my js -->
      <script src="./script.js"></script>
      <script src="./index.js"></script>
      <script src="./Results.js"></script>


     
     <script>
      setInterval(function () {
        $.ajax({
          url: '/users/ajax.php?func=checkUserIfDone',
          dataType: 'json',
          success: function(res) {
            if(res.done){
              $('#inputResult').val(1)
              $('#gameForm').submit();
            }
          }
        })
      }, 1000);

       // $.ajax({
       //      url: '/users/ajax.php?func=getLetter',
       //      dataType: 'json',
       //      success: function(res) {
       //          $('').html(e.letter);
       //        })
       //      }
       //    })
     </script>








     
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "104093298906110");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
   </body>
</html>