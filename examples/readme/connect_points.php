<?php

/**
 * connect_points.php
 *
 * This file contains an example for readme visualization.
 *
 * @author	J. Xavier Atero
 */

require realpath(__DIR__ . '/../..' . '/vendor/autoload.php');;

use b1t\svg\SVGSVGElement;
use b1t\svg\SVGPoint;
use b1t\svgf\SVGFElement;
use b1t\svgf\SVGFConnector;
use b1t\svgf\lib\SVGFMarker;

// create svg document
$dom_doc_svg = new \DOMDocument('1.0', 'utf-8');
$svg_svg = new SVGSVGElement($dom_doc_svg);
$svg_svg->setWidth('200px');
$svg_svg->setHeight('50px');
$svg_svg->setViewBox('0 0 200 50');
$svg_svg->setVersion('1.1');
$svg_svg->setAttribute('xmlns','http://www.w3.org/2000/svg');

// create defs
$svg_defs = SVGFElement::defs($dom_doc_svg,'marker');

// create markers
$svg_marker_arrow_start = SVGFMarker::markerArrowStart($dom_doc_svg,'marker_arrow_start','path_arrow_start','#861a22');
$svg_marker_arrow_end = SVGFMarker::markerArrowEnd($dom_doc_svg,'marker_arrow_end','path_arrow_end','#861a22');
$svg_marker_cicrle = SVGFMarker::markerCircle($dom_doc_svg,'marker_circle','circle','#861a22');

$svg_defs->appendChild($svg_marker_arrow_start);
$svg_defs->appendChild($svg_marker_arrow_end);
$svg_defs->appendChild($svg_marker_cicrle);

// create points
$point_start_1 = SVGFElement::point(10,10);
$point_end_1 = SVGFElement::point(40,40);

$point_start_2 = SVGFElement::point(60,40);
$point_end_2 = SVGFElement::point(90,10);

$point_start_3 = SVGFElement::point(125,40);
$point_end_3 = SVGFElement::point(125,10);

$point_start_4 = SVGFElement::point(160,25);
$point_end_4 = SVGFElement::point(190,25);

// create connectors
$svg_connector_1 = SVGFConnector::points($dom_doc_svg,$point_start_1,$point_end_1,'#861a22','1px','connector_1','marker_circle','marker_arrow_end');
$svg_connector_2 = SVGFConnector::points($dom_doc_svg,$point_start_2,$point_end_2,'#861a22','1px','connector_2','marker_arrow_start','marker_arrow_end');
$svg_connector_3 = SVGFConnector::points($dom_doc_svg,$point_start_3,$point_end_3,'#861a22','1px','connector_3','marker_arrow_end','marker_arrow_end');
$svg_connector_4 = SVGFConnector::points($dom_doc_svg,$point_start_4,$point_end_4,'#861a22','1px','connector_4',null,'marker_circle');

$svg_svg->appendChild($svg_defs);
$svg_svg->appendChild($svg_connector_1);
$svg_svg->appendChild($svg_connector_2);
$svg_svg->appendChild($svg_connector_3);
$svg_svg->appendChild($svg_connector_4);

$txt_svg = $dom_doc_svg->saveXML();

echo $txt_svg;