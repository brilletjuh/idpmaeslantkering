<?php
$windPage = file_get_contents("http://www.knmi.nl/nederland-nu/weer/waarnemingen");
$DOM = new DOMDocument();
libxml_use_internal_errors(true);
$DOM->loadHTML($windPage);
libxml_clear_errors();
$finder = new DomXPath($DOM);
$nodes = $finder->query("(//td[contains(text(), 'Rotterdam')])//following-sibling::*[6]/text()");
foreach ($nodes as $node) {
    echo $node->nodeValue;
}