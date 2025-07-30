<?php
/**	op-module-tutorial:/content/index.php
 *
 * @created    2025-07-21
 * @version    1.0
 * @package    op-module-tutorial
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	namespace
 *
 */
namespace OP;

//	...
$endpoint = OP()->Unit()->Router()->EndPoint();
$tutorial = dirname($endpoint);
$develop  = dirname($tutorial);
RootPath('tutorial', $tutorial);
RootPath('develop',  $develop);

//	...
$layout = OP()->Config('layout');
$layout['name'] = OP()->Config('develop')['layout'] ?? 'flexbox';
$layout['path']['menu']['top']  = realpath("./top.phtml");
$layout['path']['menu']['left'] = realpath("./left.phtml");
OP()->Config('layout', $layout);

//	...
$args = OP()->Unit()->Router()->Args();

//	...
if( empty($args) ){
	$path = 'index.phtml';
}else{
	$path = $args[0] .'/index.phtml';
}

//	...
OP::Template($path);

//	...
OP::Unit()->WebPack()->Auto('index.css');
