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

//	...
OP()->Unit()->WebPack()->Auto('develop:/webpack/markdown.*');

//	...
$marked    = OP::isLocalhost() ? OP::URL('develop:/vender/marked.js')    : '//cdn.jsdelivr.net/npm/marked/marked.min.js';
$highlight = OP::isLocalhost() ? OP::URL('develop:/vender/highlight.js') : '//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js';

?>
<script src="<?= $marked    ?>"></script>
<script src="<?= $highlight ?>"></script>
