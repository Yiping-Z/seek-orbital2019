<?php
    session_start();
    if (@$_SESSION["username"]) {
?>

<html>
  <head>
  	<style>
  	html {
  		background-size: cover;
  		
  	}

  	body {
  		font: 100% Georgia, "Times New Roman", Times, serif;
  		line-height: 1.4;
  		width: 100%;
  		margin: 0 auto;
  		padding-bottom: 20em;
        background: #f2f2f2;
  	}

  	h1, h2, h3 {
  		font-size: 2.4em;
  		font-weight: normal;
  		text-shadow: 0 1px 0 rgba(255, 255, 255, 0.75);
  		color: #333333;
  	}

  	h2 {
  		font-size: 1.4em;
  	}

  	/*micro-clearfix by Nicolas Gallagher http://nicolasgallagher.com/micro-clearfix-hack/*/
  	/* For modern browsers */
  	.cf:before, .cf:after {
  		content:"";
  		display:table;
  	}

  	.cf:after {
  		clear:both;
  	}

  	/* For IE 6/7 (trigger hasLayout) */
  	.cf {
  		zoom:1;
  	}
  	/*horizontal menu styles*/
  	nav {
  		background:  #bfbfbf;
  		height: 2.3em;
  	}
  	ul, li {
  		margin: 0;
  		padding: 0;
  		list-style: none;
  		float: left;
  	}
  	ul {
  		background: #a6a6a6;
  		height: 2em;
  		width: 100%;
  	}
  	li {
  		position: relative;
  	}
  	li a {
  		display: block;
  		line-height: 2em;
  		padding: 0 1em;
  		color: white;
  		text-decoration: none;
  	}
  	li a:hover, .topmenu li:hover > a {
  		background: #8c8c8c;
  		height: 2em;
  		padding-top: .3em;
  		position: relative;
  		top: -.3em;
  		border-radius: .3em .3em 0 0;
  	}
  	.current, a:hover.current, .topmenu li:hover a.current {
  		background:	 #8c8c8c;
  		color: #eee;
  		padding-top: .3em;
  		border-radius: .3em .3em 0 0;
  		position: relative;
  		top: -.3em;
  		border-bottom: .3em solid ##02A8D2;
  		cursor: default;
  	}
  	/*dropdown menu styles*/

  	ul.submenu {
  		float: none;
  		background: #0784A3;
  		width: auto;
  		height: auto;
  		position: absolute;
  		top: 2em;
  		left: -9000em;
  		max-height: 0;
  		-webkit-transition: max-height 0.5s ease-in-out;
  		-moz-transition: max-height 0.5s ease-in-out;
  		-o-transition: max-height 0.5s ease-in-out;
  		-ms-transition: max-height 0.5s ease-in-out;
  		transition: max-height 0.5s ease-in-out;
  	}

  	ul.submenu li {
  		float: none;
  	}

  	.topmenu li:hover ul {
  		left: 0;
  		max-height: 10em;
  	}

  	ul.submenu li a {
  		border-bottom: 1px solid white;
  		padding: .2em 1em;
  		white-space: nowrap;
  	}
  	ul.submenu li:last-child a {
  		border-bottom: none;
  	}
  	ul.submenu li a:hover {
  		background: #B4D9E3;
  		height: 2em;
  		padding-top: .2em;
  		top: 0;
  		border-radius: 0;
  	}
    table {
      border-collapse: collapse;
      width: 100%;
      color: #0784A3;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
    }
    th {
      color: #0784A3;
    }
    label {
      color: white;
      font-family: monospace;
      font-size: 30px;
    }
   tr: nth-child(even) {background-color: #0784A3}
  	</style>
  </head>
  <body>
  	<nav class="cf">
  		<nav class="cf">
  			<ul class="topmenu">
  				<li><a href="homepage.php"  class="current">Seek</a></li>
  				<li><a href="study.php" >Study</a>
  				</li>
  				<li><a href="sports.php">Sports</a>
  				</li>
  				<li><a href="roommie.php">Roommates</a>
  				</li>
             <li><a href=index.php onclick="return confirm('Are you sure you want to log out?')">Log out</a>
                 </li>
          <li>
            <form class = "myform" action = "homepage.php" method = "post">
          </form>
          </li>
             
  			</ul>
  		</nav>
  	</nav>
  	<?php
    if (isset($_POST['logout']))
    {
      session_destroy();
    }
    }
  ?>
  
        </body>
        </html>
        