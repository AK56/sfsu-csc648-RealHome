<?php

function mapThis($address, $state) {
    $place = 'Space+'.$address.'+'.$state;
    echo "<iframe frameborder = \"0\" style = \"border:0\"
    src = \"https://www.google.com/maps/embed/v1/place?key=AIzaSyDSHDXKPVag5jTyG3cKOBrLEzBTEhGxiyc
    &q=<?=$place;?>\">
    </iframe>";
}
?>