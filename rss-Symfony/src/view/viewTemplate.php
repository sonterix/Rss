<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <title>News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="templatemo">
    <meta charset="UTF-8">

    <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS Bootstrap & Custom -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="public/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
    <link href="public/css/styleTemplatemo.css" rel="stylesheet" type="text/css">
</head>
<body>

  <nav class="navbar navbar-default" role="navigation">    
    <div class="container">
      <div class="row">
       
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-2 col-sm-2 col-xs-12">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand"><img src="public/images/templatemo_logo.png" alt="news"></a>
          </div>
        </div>        
        
        <div class="col-md-10 col-sm-10 col-xs-12">
          <div class="navbar-collapse collapse menu">          
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/"><i class="fa fa-home"></i>NEWS</a></li>
              <li><a href="/login"><i class="fa fa-user"></i>
                <?php if ($request->getSession()->has('logged', true)) {
                  echo 'Cabinet';
                } else {
                  echo 'Log/Reg';  
                }
                ?>
              </a></li>
              <li><a href="/contact"><i class="fa fa-envelope"></i>Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
   
    <section>
        <div class="container">
            <div class="row"><br>
                <?php include $contentView; ?>
            </div>
        </div>
    </section>
<!--
  <footer>
    <div class="container">        
      <div class="row">
        <div class="col col-md-6 col-sm-6 col-xs-6 col-xxs">
          <img src="public/images/templatemo_logo.png" alt="news">
          <div id="templatemo_copyright">
            Nick Bukovskiy © 2017 <a href="#">Soft Group</a>
          </div>
        </div>        
        <div class="col col-md-6 col-sm-6 col-xs-6 col-xxs">           
        </div>
      </div> 
    </div>
  </footer>
-->
  <!-- JavaScripts -->
  <script src="public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>