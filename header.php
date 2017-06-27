<DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
	<meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
		 rel = "stylesheet">
	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<TITLE>FabFlix Login</TITLE>
  <link rel=icon href="/images/UCI_mindlogo.jpg">

		<script>

		</script>

</HEAD>

<BODY>

  <nav style="padding-top: 80px; background-color: #fcfcfc" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" rel="home" href="index.jsp">
            <img style="max-width:225px; margin-top: -70px;"
                 src="/images/UCI_mindlogo.jpg">
        </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
       <li><a href="index.php">Home</a></li>
       <li><a href="idsearch.php">Search By ID</a></li>
       <li><a href="index.php">Add/Remove Samples</a></li>
       <li><a href="index.php">Browse</a></li>
			 <form class="navbar-form navbar-left" ACTION="/TomcatForm/Checkout.jsp" METHOD="POST">
	      </form>
       <form class="navbar-form navbar-right"
                  ACTION="index.php"
                  METHOD="POST">
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</nav>
</body>
 