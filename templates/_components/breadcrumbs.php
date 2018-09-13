<?php if($_SERVER['REQUEST_URI'] !== '/'): ?>
    <div class="breadcrumbs">
        <?php

        // This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
        function breadcrumbs($home = 'Home') {
            // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
            $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        
            // This will build our "base URL" ... Also accounts for HTTPS :)
            $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        
            // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
            $breadcrumbs = Array("<a href=\"$base\" class=\"breadcrumbs__crumb\" role=\"button\">$home</a>");
        
            // Find out the index for the last value in our path array
            $keys = array_keys($path);
            $last = end($keys);
        
            // Build the rest of the breadcrumbs
            foreach ($path AS $x => $crumb) {
                // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
                $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));
        
                // If we are not on the last index, then display an <a> tag
                if ($x != $last)
                    $breadcrumbs[] = "<a href=\"$base$crumb\" class=\"breadcrumbs__crumb\" role=\"button\">$title</a>";
                // Otherwise, just display the title (minus)
                else
                    $breadcrumbs[] = ucwords(str_replace("-"," ",$title));
            }
        
            // Build our temporary array (pieces of bread) into one big string :)
            return implode($breadcrumbs);
        }
        
        ?>
        
        <?php
            echo breadcrumbs();
        ?>
    </div>
<?php endif; ?>