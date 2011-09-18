<?php
$menu = array();
foreach (glob('articles/*.html') as $file) {
  $name = substr(basename($file, '.html'), 3);
  $menu[$name]= array(
    mb_convert_case(str_replace('-', ' ', $name), MB_CASE_TITLE),
    $file,
    $name == 'about' ? '.' : $name,
  );
}
$uri = basename($_SERVER['REQUEST_URI']);
$active_menu_item = !empty($menu[$uri]) ? $uri : 'about';
$content = file_get_contents($menu[$active_menu_item][1]);
?><!doctype html>
<!--[if lt IE 7 ]> <html lang="en-us" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-us" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-us" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-us" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-us" class="no-js"> <!--<![endif]-->

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
  <meta charset="utf-8">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <title>Fairytale of the Forbidden Flower</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <!-- The Columnal Grid (1140px wide base, load first), Type and image presets, and mobile stylesheet -->
	<link rel="stylesheet" href="css/columnal.css" type="text/css" media="screen" />

<!-- Fixes for IE -->
	<!--[if lt IE 9]>
    	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<![endif]-->

<!-- use "fixed-984px-ie.css" or "fixed-960px-ie.css for a 984px or 960px fixed width for IE6 and 7 -->
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/fixed-984px-ie.css" type="text/css" media="screen" />
	<![endif]-->

<!-- Fixes for IE6, only needed if IE 6 will be supported - width must match 984px or 960px of css file used above -->
<!-- Use .imagescale to fix IE6 issues with full-column width images (class must be added to any image wider than the column it is placed into) -->
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="css/ie6-984px.css" type="text/css" media="screen" />
	<![endif]-->
<!-- End fixes for IE -->

<!-- Customizations here --> 
    <link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" />

<!-- Page build tools - only needed while creating a site, remove when launching - Gray box colors and page debugging tools -->
    <link rel="stylesheet" href="css/build.css" type="text/css" media="screen" />

    <link href='http://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
</head>

<body><div class="container"><div class="row">

  <div class="col_4 clearleft"><nav><ul>
     <?foreach($menu as $name => $item):?>
        <li<?=$active_menu_item==$name ? ' class="active"' : ''?>>
          <a href="<?=$item[2]?>" title="<?=$item[0]?>"><?=$item[0]?></a>
        </li>
     <?endforeach?>
  </ul></nav></div>

  
  
  <div class="col_8 omega">

    <header>
      <span class="title">Fairytale of the Forbidden Flower</span><br />
      <span class="description">A magical concert fairytale.</span>
    </header>
    
    <h1><?=$menu[$active_menu_item][0]?></h1>
    <article>
      <?=$content?>
    </article>
  </div>

</div></div></body>
</html>
