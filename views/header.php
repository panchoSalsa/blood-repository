<nav style="padding-top: 80px; background-color: #fcfcfc" class="navbar navbar-default">
  <div class="container">

    <div class="navbar-header">
      <div style="text-align:center">
        <!-- <img style="max-width:225px; margin-top: -70px;" -->
        <img style="margin-top: -70px"
           src="/images/UCI_mindlogo.jpg">
      </div>

      <!-- 
      how to create navbar button on collapse
      source=https://codepen.io/j_holtslander/pen/doQggE
      -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
         <li><a href="index.php">Home</a></li>
         <li><a href="search-by-patient-id.php">Search By Patient ID</a></li>
         <li><a href="add-blood-sample.php">Add Blood Sample</a></li>
         <li><a href="search-vials-by-blood-sample-id.php">Search Vials By Blood Sample ID</a></li>
<!--          <li><a href="index.php">Browse</a></li> -->
<!--          <li><a id="logout" style="cursor: pointer;">Logout</a></li> -->
        <li><a href="https://login.uci.edu/ucinetid/webauth_logout">Logout</a></li>
        </ul>
<!--         <button id="logout" type="button">Log Out</button> -->
      </div>

    </div>

  </div>
</nav>