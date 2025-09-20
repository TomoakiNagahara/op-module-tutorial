
/**	op-module-tutorial:/content/tutorial.js
 *
 * @created    2025-09-18
 * @version    1.0
 * @package    op-module-tutorial
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

addEventListener("DOMContentLoaded", () => {
	let elem = document.querySelector('a.no');
	if( elem ){
		elem.addEventListener("click", (e) => {
			//	...
			e.preventDefault();
			//	...
			let elem = document.querySelector('#feedback');
			if( elem ){
				elem.style.display = 'block';
			}
		});
	}
});
