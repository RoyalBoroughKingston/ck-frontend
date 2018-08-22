<?php
    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
?>

<nav class="breadcrumbs">
    <a href="/" class="breadcrumbs__crumb">Home</a>

    <?php 
    	 
        $crumbs = explode("/",$_SERVER["REQUEST_URI"]);

        $linkPath = "";

        $numItems = count($crumbs);

        foreach($crumbs as $index => $crumb){
            if($index == 0) {
                continue;
            }

            $word = ucfirst($crumb);

        	if(++$index === $numItems) {
	            echo '<span class="breadcrumbs__crumb breadcrumbs__crumb--current">' . $word . '</span>';
        	} else {
                echo '<a href="' . $linkPath . $crumb . '" class="breadcrumbs__crumb">' . $word . '</a>';
                $linkPath = $linkPath . $crumb . '/';
            }
        }
    ?>
</nav>