<?php
$title = "Todo Site";
require_once("./pages/partials/header.par.php");
?>
<title>Todo Site</title>
<link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
   <main>
      <div class="container">
         <div class="header">
            <span id="signin">Sign In</span>
            <span id="signup">Sign Up</span>
         </div>
         <hr>
         <div id="content">
            <form action="./includes/signIn.inc.php" method="post">
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
               </div>
               <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="email" class="form-control" name="password" id="password" placeholder="">
               </div>
               <div class="d-grid gap-2">
                  <button class="btn btn-primary" style="font-weight: 500;" type="button" name="signIn">Sign In</button>
               </div>
            </form>
         </div>
      </div>
   </main>
   <script src="./assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
   <script src="./assets/Vendor/fontawesome/js/all.min.js"></script>
   <script>
      let signInBtn = document.getElementById("signin");
      let signUpBtn = document.getElementById("signup");
      let content = document.getElementById("content")

      signInBtn.classList.add("focus");

      signUpBtn.addEventListener("click", (e) => {
         // signInBtn.classList.toggle("focus");
         // signUpBtn.classList.toggle("focus");
         signUpBtn.className ="focus"
         signInBtn.className = "non-focus"

         content.innerHTML = `<form action="./includes/signUp.inc.php" method="post">
               <div class="mb-3">
               <label for="name" class="form-label">Name & Surname</label>
               <input type="email" class="form-control" name="usernme" id="email" placeholder="">
            </div>
            <div class="mb-3">
               <label for="name" class="form-label">Email</label>
               <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Password</label>
               <input type="email" class="form-control" name="password" id="password" placeholder="">
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Confirm Password</label>
               <input type="email" class="form-control" name="password_confirm" id="password" placeholder="">
            </div>
            <div class="d-grid gap-2">
               <button class="btn btn-primary" style="font-weight: 500;" name="signUp" type="button">Sign Up</button>
            </div>
            </form>`
      })
      signInBtn.addEventListener("click", (e) => {
         // signInBtn.classList.toggle("focus");
         // signUpBtn.classList.toggle("focus");
         signUpBtn.className ="non-focus"
         signInBtn.className = "focus"
         content.innerHTML = `
               <form action="./includes/signIn.inc.php" method="post">
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
               </div>
               <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="email" class="form-control" name="password" id="password" placeholder="">
               </div>
               <div class="d-grid gap-2">
                  <button class="btn btn-primary" style="font-weight: 500;" type="button" name="signIn">Sign In</button>
               </div>
            </form>`
      })
   </script>
</body>

</html>
