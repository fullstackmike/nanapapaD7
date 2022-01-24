<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php 
global $base_url;
include_once("simplehtmldom_1_5/simple_html_dom.php");
print "<div class='hp_image_thumbnail'>";
if ($output != "") {
	//print $output; 
	$html = str_get_html($output);
	foreach($html->find('img[class=flickr-photo-img]') as $element) {
		print l('<img src="'.$element->src.'" width="150" height="150">','node/'.$row->nid,array("html"=>1));
		break;
	}
} else {
	$temparray = explode("src=", $output);
	//print $output;
	//array_shift($temparray);
	//print_r($row->field_body);
	if (count($row->field_body)) {
		$html = str_get_html($row->field_body[0]['raw']['value']);
		foreach($html->find('img[class=gallery2]') as $element) {
			print '<img src="'.$element->src.'" width="150" height="150">';
			break;
		}
	}
}
print "</div>";
?>
