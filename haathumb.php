<?php

/*
	haaThumb is "simplest" way to call the timthumb script
	via htaccess rewrite rules or web.config rewrite rules.

	Based on work done by Ben Gillbanks and Mark Maunder
	Based on work done by Tim McDaniels and Darren Hoyt
	http://code.google.com/p/timthumb/

	GNU General Public License, version 2
	http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

	Edited by SeRosiS, still being edited really.

	Version 1.0
*/
	error_reporting(0);

	$data = explode('/',$_GET['var']);

	$filter = '&f=';

	$size = explode('x',$data[0]);
	if ($size[0]>0) $width='&w='.$size[0];
	if ($size[1]>0) $height='&h='.$size[1];

	if (in_array('quality'     ,$data)){
	    $key = array_search('quality',$data);
	    $key++;
	    if (is_numeric($data[$key])) $quality='&q='.$data[$key];
	}
	if (in_array('fit',$data))			$zc ='&zc=0';
	if (in_array('cropped',$data))		$zc ='&zc=1';
	if (in_array('bordered',$data))		$zc ='&zc=2';
	if (in_array('aspect',$data))		$zc ='&zc=3';
	if (in_array('center',$data))		$a ='&a=c';
	if (in_array('top',$data))			$a ='&a=t';
	if (in_array('top-right',$data))	$a ='&a=tr';
	if (in_array('top-left',$data))		$a ='&a=tl';
	if (in_array('bottom',$data))		$a ='&a=b';
	if (in_array('bottom-right',$data))	$a ='&a=br';
	if (in_array('bottom-left',$data))	$a ='&a=bl';
	if (in_array('left',$data))			$a ='&a=l';
	if (in_array('right',$data))		$a ='&a=r';
	if (in_array('invert',$data))		$filter.='1|';
	if (in_array('grayscale',$data))	$filter.='2|';
	if (in_array('brightness',$data)){
	    $key = array_search('brightness',$data);
	    $key++;
	    if (is_numeric($data[$key])) $filter.='3,'.$data[$key].'|';
	}
	if (in_array('contrast'     ,$data)){
	    $key = array_search('contrast',$data);
	    $key++;
	    if (is_numeric($data[$key])) $filter.='4,'.$data[$key].'|';
	}
	if (in_array('colorize'     ,$data)){
	    $key = array_search('colorize',$data);
	    $key++;
	    $rgba = explode('.',$data[$key]);
	    if ($rgba[0]>255)$rgba[0]=255;
	    if ($rgba[1]>255)$rgba[1]=255;
	    if ($rgba[2]>255)$rgba[2]=255;
	    if (count($rgba)==3) $rgba[3]=127;
	    if (count($rgba)==4 && $rgba[3]>127)$rgba[3]=127;
	    if (count($rgba) == 4 && is_numeric($rgba[0]) && is_numeric($rgba[1]) && is_numeric($rgba[2]) && is_numeric($rgba[3]))    $filter.='5,'.implode(',',$rgba).'|';
	}
	if (in_array('edge-detect',$data))	$filter.='6|';
	if (in_array('emboss',$data))		$filter.='7|';
	if (in_array('gaussian',$data))		$filter.='8|';
	if (in_array('selective',$data))	$filter.='9|';
	if (in_array('mean',$data))			$filter.='10|';
	if (in_array('smooth',$data)){
	    $key = array_search('smooth',$data);
	    $key++;
	    if (is_numeric($data[$key])) $filter.='11,'.$data[$key].'|';
	}
	if (in_array('pixelate',$data)){
	    $key = array_search('pixelate',$data);
	    $key++;
	    $pix = explode('.',$data[$key]);
	    if ($pix[1]>1)$pix[1]=1;
	    if (count($pix)==1) $pix[1]=0;
	    if (count($pix) == 2 && is_numeric($pix[0]) && is_numeric($pix[1])) $filter.='12,'.implode(',',$pix).'|';
	}
	if (in_array('sharpen',$data))		$sharpen='&s=1';
	if (in_array('canvas-color',$data)){
	    $key = array_search('canvas-color',$data);
	    $key++;
	    if(preg_match('/^[a-f0-9]{6}$/i',$data[$key])) $canvasColor='&cc='.$data[$key];
	}
	if (in_array('canvas-trans'	,$data))$canvasTrans ='&ct=1';
	// if (in_array('conservative',$data))	$progressive = '&progressive=0';
	// if (in_array('progressive',$data))	$progressive = '&progressive=1';
	$filter= trim($filter,'|');
	if ($filter=='&f=') $filter=null;

	$source = explode('/src/',$_GET['var']);

	$ttString='&src='.$source[1].$width.$height.$quality.$zc.$a.$filter.$sharpen.$canvasColor.$canvasTrans;
	$ttString= trim($ttString,'&');
	$ttArray = array();
	parse_str($ttString, $ttArray);

	$_GET=$ttArray;

	// echo $ttString.'<br /><br />';
	// print_r ($ttArray); echo '<br /><br />';
	// I used this to debug my work
	
	include('timthumb.php');
?>
