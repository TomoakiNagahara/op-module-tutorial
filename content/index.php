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

//	Set meta root.
$endpoint = OP()->Unit()->Router()->EndPoint();
$tutorial = dirname($endpoint);
$develop  = dirname($tutorial);
RootPath('tutorial', $tutorial);
RootPath('develop',  $develop);

//	Set layout template files.
$layout = OP()->Config('layout');
$layout['name'] = OP()->Config('develop')['layout'] ?? 'flexbox';
$layout['path']['menu']['top']  = realpath("./top.phtml");
$layout['path']['menu']['left'] = realpath("./left2.phtml");
OP()->Config('layout', $layout);

//	Set yes/no hash.
if( $hash = OP()->Request('hash') ){
	OP()->Session()->Set($hash, true);
}

//	Get URL Args.
$args = OP()->Unit()->Router()->Args();
$type = isset($args[1]) ? strtolower($args[0] ?? ''): null;

//	Branch page.
switch( $type ){
	//	...
	case 'required':
		$path = "Required/$args[1].phtml";
		break;

	//	...
	case 'core':
		$path = "asset:/{$type}/tutorial/$args[1].phtml";
		break;

	//	...
	case 'unit':
	case 'module':
	case 'layout':
		if( $args[2] ?? null ){
			$path = "asset:/{$type}/$args[1]/tutorial/$args[2].phtml";
		}
		break;

	//	...
	default:
	$path = 'index.phtml';
}

/* I'll leave the code here because git diff is stupid.
//	Branch page.
if( empty($args) ){
	$path = 'index.phtml';
}else{
	$path = $args[0] .'/index.phtml';

	//	Set yes/no hash.
	if( $hash = OP()->Request('hash') ){
		OP()->Session()->Set($hash, true);
	}
}
*/

//	...
if( $path ?? null ){
	OP::Template($path);
}

//	...
OP::Unit()->WebPack()->Auto('tutorial.js','tutorial.css');
OP::Unit()->WebPack()->Auto("asset:/webpack/css/syntax.css");
OP::Unit()->WebPack()->Auto('develop:/webpack/markdown.*');

//	...
$marked    = OP::isLocalhost() ? OP::URL('develop:/vender/marked.js')    : '//cdn.jsdelivr.net/npm/marked/marked.min.js';
$highlight = OP::isLocalhost() ? OP::URL('develop:/vender/highlight.js') : '//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js';

?>
<script src="<?= $marked    ?>"></script>
<script src="<?= $highlight ?>"></script>
