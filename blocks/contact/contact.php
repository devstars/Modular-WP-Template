<?php

/**
 * Block Contact
 */
?>

<?php
$content = get_field("content");
$fields = get_field("additional_fields");
$settings = get_field("settings");

//mapa form details
//mapa

$cols = 0;
if($settings["map"]) $cols++;
if($settings["form"]) $cols++;
if($settings["details"]) $cols++;

if($cols > 1 ){
    include("layout-2cols.php");
}else{
    include("layout-1col.php");
}
?>

<?php
$block_name = str_replace("acf/", "", $block['name']);
$file_js = $block_name . ".js";

wp_enqueue_script('contact-js', BLOCKS_URI . "/" . $block_name . "/" . "contact.js", array('jquery'), filemtime(BLOCKS . "/" . $block_name . "/" . "contact.js"), false);
wp_localize_script('contact-js', 'latLng', array(
    'lat' => 51.518600,
    'lng' => -0.142290,
));

if($settings["map"]) :
    ?>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=<?= Configuration::$google_map_api_key ?>&callback=window.map.init"></script> 
    <?php
endif;    