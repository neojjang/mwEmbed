<?php

/**
* Simple tool for packing mwEmbed with license from an up-to-date source
*/

// Parse the request for a preset package:
if( !isset( $_GET['name'] ) ){
	die( 'Please supply a package name' );
}

$versionString = '1.1x';

$licenseHeader = '/**
 * @license
 * mwEmbed
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * 
 * @copyright (C) 2010 Kaltura 
 * @author Michael Dale ( michael.dale at kaltura.com )
 * 
 * @url http://www.kaltura.org/project/HTML5_Video_Media_JavaScript_Library
 *
 * Libraries used carry code license in headers
 */';

$packageName = $_GET['name'];

// This class list is used to create a static files in the html5 player package
$html5PlayerClassList = array(
	// Core library ( includes core components and loader)
 	'mwEmbed',

	// Core Abstract player and skin
	'mw.EmbedPlayer',
	'mw.PlayerControlBuilder',	
	'j.fn.hoverIntent',

	// jquery ui and ui-slider
	'j.ui',
	'j.ui.slider',

	// Player Skins
	'mw.PlayerSkinKskin',
	'mw.PlayerSkinMvpcf',	

	// Embed Libraries
	'mw.EmbedPlayerNative',
	'mw.EmbedPlayerJava',
	'mw.EmbedPlayerVlc',
	'mw.EmbedPlayerKplayer',
	'mw.EmbedPlayerGeneric',

	// jQuery plugin's used by Embed library
	'j.cookie',

	// TimedText Module
	'mw.TimedText',	
	'j.fn.menu',
);
$html5PlayerStyleList = array( 
	// Separate all the style sheets for path preservation 
	// ( normally the script-loader serves absolute or relative paths
	//  based on the scriptLoader location ) 
	'mw.style.jqueryUiRedmond',
	'mw.style.mwCommon',
	'mw.style.EmbedPlayer',
	'mw.style.PlayerSkinMvpcf',
	'mw.style.PlayerSkinKskin',
	'mw.style.TimedText',
	'mw.style.jquerymenu',
);

// Switch among requested packages:
switch( $packageName ) {
	case 'kaltura-html5player-widget':
		pakageClassList( $packageName,  $html5PlayerClassList,  $html5PlayerStyleList );
	break;
	default:
		print "Package Name was not valid";
	exit();
}

// Get the entire string from the deployed version:
function pakageClassList($packageName, $html5PlayerClassList, $html5PlayerStyleList ){
	global $versionString, $licenseHeader;
	
	$zip = new ZipArchive();
	$filename = './' . $packageName . '.' . $versionString . '.zip';
	
	
	$rootFileFolder = 'kaltura-html5player-widget';	
	
	// 	Remove the old zip if present
	if( is_file( $filename ) ){
		if( !unlink( $filename ) ){
			exit( "error could not remove old package: " . $packageName . '.zip');
		}
	}

	if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    	exit("cannot open <$filename>\n");
	}

	define( 'SCRIPTLOADER_MEDIAWIKI', true);
	define( 'DO_MAINTENANCE', true);

	// change to the mwEmbed Directory	
	chdir( '../mwEmbed/' );

	// Load the script loader:
	require_once( 'jsScriptLoader.php' );

	// Load the no-mediawiki config ( we have a hybrid no-mediaWiki config setup )
	require_once( 'includes/noMediaWikiConfig.php' );

	// Override some values from no-mediawikiConfig
	global $wgUseMwEmbedLoaderModuleList, $wgUseGzip,
	$wgExtensionJavascriptModules, $IP, $wgScriptLoaderRelativeCss;

	// Use relative css for the package
	$wgScriptLoaderRelativeCss = true;

	$IP = realpath( dirname( __FILE__ ) . '/../mwEmbed' ) ;

	$wgUseMwEmbedLoaderModuleList = false;

	// Disable gzip for package
	$wgUseGzip = false;
	$wgExtensionJavascriptModules = array(
		'EmbedPlayer' => 'modules/EmbedPlayer',
		'TimedText'	=> 'modules/TimedText'
	);



	/*******************
	* CSS 
	*******************/
	// Clear out the script Loader for css build out
	$myScriptLoader = new jsScriptLoader();
	
	$_GET['class'] = implode(',', $html5PlayerStyleList);
	$_GET['format'] = 'css';
	ob_start();
	// Run jsScriptLoader action:
	if( !$myScriptLoader->outputFromCache() ){
		$myScriptLoader->doScriptLoader();
	}
	$scriptOutput = ob_get_clean();

	//Output combined css
	//file_put_contents( '../mwEmbed/mwEmbed-player-static.css', $scriptOutput );

	$zip->addFromString( $rootFileFolder. "/mwEmbed-player-static.css", $scriptOutput);

	/*******************
	* JS
	*******************/
	$_GET['format'] = 'js';
	// Get the combined javascript: ( setup the packaged class list )
	$_GET['class'] = implode(',', $html5PlayerClassList);
	$myScriptLoader = new jsScriptLoader();

	ob_start();
	// Run jsScriptLoader action:
	if( !$myScriptLoader->outputFromCache() ){
		$myScriptLoader->doScriptLoader();
	}

	$scriptOutput = ob_get_clean();
	
	// Add the license header: 
	$scriptOutput = $licenseHeader . "\n" . $scriptOutput;
	
	// Register the css classes ( static builds inlcude the css explicity )
	$scriptOutput.= "\n" . implode('=1;', $html5PlayerStyleList) . "=1;\n";

	// Disable local usage of cortado ( GPL package in MIT set) 
	$scriptOutput.= "\n mw.setConfig( 'relativeCortadoAppletPath', false );\n";
	
	// Output the static package to zip file
	//file_put_contents( '../mwEmbed/mwEmbed-player-static.js', $scriptOutput );
	$zip->addFromString( $rootFileFolder. "/mwEmbed-player-static.js", $scriptOutput);

	//Start with everything in the package name folder 
	$packageTemplateDir = realpath( dirname( __FILE__ ) . "/$packageName" );
	if( is_dir( $packageTemplateDir ) ) {
		$objects = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $packageTemplateDir ), RecursiveIteratorIterator::SELF_FIRST );
		foreach( $objects as $path => $object ) {
			if( strpos( $path, '.svn' ) == 0 ) {
				if( is_file( $path )){
					$targetZipPath = str_replace( $packageTemplateDir, '', $path );							
					$zip->addFile( $path, $rootFileFolder . $targetZipPath );
				}
			}
		}
	} else {
		die( "could not find pacakge directory template for $packageName ");
	}
	
	// Add the jQuery: libraries/jquery/jquery-1.4.2.js
	$zip->addFile( '../mwEmbed/libraries/jquery/jquery-1.4.2.min.js', $rootFileFolder . '/jquery-1.4.2.min.js' );
	
	// Loop over the directories if we find an "image", "swf", or "jar" add it with full path
	$objects = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( '../mwEmbed/' ), RecursiveIteratorIterator::SELF_FIRST );
	foreach( $objects as $path => $object ){
		$ext = substr($path, strrpos( $path, '.' )+1 );		
		$isValidModule = false;
		foreach( $wgExtensionJavascriptModules as $moduleName => $modulePath ){
			if( strpos( $path, $modulePath ) !== false ){
				$isValidModule = true;
			}
		}
		if( !	$isValidModule 
				&& strpos( $path, 'libraries/jquery/'  ) === false 
				&& strpos( $path, 'skins/common/'  ) === false 
				&& strpos( $path, 'mwEmbed.js' ) === false 
				&& strpos( $path, 'languages/') === false ) {
			//Skip the module not in module list nor is it a jquery asset
			continue;
		}		
		if( $ext == 'swf' || $ext == 'js' || $ext == 'gif' || 
			$ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'txt'){
			$targetZipPath = str_replace( '../mwEmbed', '', $path);		
			$zip->addFile( $path, $rootFileFolder . $targetZipPath );
		}
	}
	$zip->close(); 
	
	// unzip the file
	$zip->open(  dirname( __FILE__ ) . "/" . $filename );
	
	chdir( dirname( __FILE__ ) .  "/" );
	// remove the host zip file
	unlink( $filename );
	$zipDir = 'temp' . time() ;
	// PHP zip SUCKS! (windows 7 can't read the zip file ) unzip and zip via command line :(	
	@$zip->extractTo(  dirname( __FILE__ ) .  "/" .  $zipDir );
	$zip->close(); 
	
	chdir( dirname( __FILE__ ) .  "/" . $zipDir );	
	// Run a shell compress ( also has weird syntax ) 
	$zipCmd = "zip -r $packageName $packageName";		
	exec( $zipCmd );
	// Go back to package directory
	chdir( dirname( __FILE__ ) );
	// move the zip file: 
	rename( $zipDir .'/'. $packageName . '.zip', $filename );
	// remove the temporary directory
	recursiveDelete( $zipDir );
	

	
	$zip->open(  dirname( __FILE__ ) . "/" . $filename );
	// Overide the script-loder header
	header("Content-Type: text/html");

 	if( $zip->status == 0){
			$stats= "<pre>";
			$stats.= "numfiles: " . $zip->numFiles . "\n";
			$stats.= "status:" . $zip->getStatusString() . "\n";
			for($i = 0; $i < $zip->numFiles; $i++)
			{  
				$fileStat = $zip->statIndex($i) ;
				$stats.= 'File: ' 
					. formatBytes( $fileStat['comp_size'] ) 
					. ', ' . formatBytes( $fileStat['size'] )
					. ' :: ' . $zip->getNameIndex($i) . " \n";
			}
			$stats.= "</pre>";

		echo 'Download <a href="'. $packageName . '.' . $versionString .'.zip">' . $packageName. '.' . $versionString . '.zip</a> ( ' . 
			formatBytes( filesize( dirname( __FILE__ ) . "/" . $filename  ) ). ' )<br />';
		echo $stats;
	} else { 
		echo "Error: " . $zip->getStatusString(); 
	}
}
function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
  
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
  
    $bytes /= pow(1024, $pow);
  
    return round($bytes, $precision) . ' ' . $units[$pow];
} 
function recursiveDelete( $str ){
	if(is_file($str)){
		return @unlink($str);
	}
	else if( is_dir( $str ) ) {
		$scan = glob(rtrim($str,'/').'/*');
		foreach($scan as $index=>$path){
			recursiveDelete($path);
		}
		return @rmdir($str);
	}
}
?>
	