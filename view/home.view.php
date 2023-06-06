<?php ob_start() ?>

<div>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam iste ullam quos hic quidem voluptates eligendi veritatis aliquid vel consequuntur? Dicta iure deleniti exercitationem earum voluptatum sequi ullam quia aspernatur.
    </p>
</div>

<?php

$title = "Bienvenue";
$content = ob_get_clean();
require_once "base.html.php"; 

?>