<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
/*Router::connect(
    '/:slug/:data',
    array('controller' => 'vendor_classes', 'action' => 'lists'),
    array(
        'pass' => array('slug', 'data'),
    )
);
*/
/*Router::connect(
   '/seo/:slug',
   array('controller' => 'vendor_classes', 'action' => 'lists'),
   array(
       'pass' => array('slug')
   )
);*/
	Router::connect(
    '/gift/classes/:slug', 
    array('controller' => 'vendor_classes', 'action' => 'classes'),
    array(
        'pass' => array( 'slug'),
    )
);
	Router::connect(
    '/classes/:slug', 
    array('controller' => 'vendor_classes', 'action' => 'classes'),
    array(
        'pass' => array( 'slug'),
    )
);
 	Router::connect('/fun-and-recreation/**', array('controller' => 'vendor_classes', 'action' => 'lists'));
	Router::connect('/informative-and-motivational/**', array('controller' => 'vendor_classes', 'action' => 'lists'));
	Router::connect('/health-and-fitness/**', array('controller' => 'vendor_classes', 'action' => 'lists'));
	Router::connect('/kids-and-teens/**', array('controller' => 'vendor_classes', 'action' => 'lists'));
	Router::connect('/home-maintenance/**', array('controller' => 'vendor_classes', 'action' => 'lists'));
	Router::connect('/educational-and-skill-development/**', array('controller' => 'vendor_classes', 'action' => 'lists'));
	Router::connect('/class_providers/*', array('controller' => 'homes', 'action' => 'sellExpress'));
	Router::connect('/catalogue_for_organizers/*', array('controller' => 'homes', 'action' => 'arrange_class'));
	Router::connect('/gift/*', array('controller' => 'homes', 'action' => 'gift'));
	Router::connect('/about/*', array('controller' => 'homes', 'action' => 'about'));
	Router::connect('/terms-and-conditions/*', array('controller' => 'homes', 'action' => 'terms'));
	Router::connect('/faq/*', array('controller' => 'homes', 'action' => 'faq'));
	Router::connect('/privacy/*', array('controller' => 'homes', 'action' => 'privacy'));
	Router::connect('/services/*', array('controller' => 'homes', 'action' => 'services'));
	Router::connect('/partner_with_us/*', array('controller' => 'homes', 'action' => 'partner_with_us'));
	Router::connect('/reviews-and-testimonials/*', array('controller' => 'homes', 'action' => 'reviews_and_testimonials'));
	Router::connect('/', array('controller' => 'homes', 'action' => 'index', 'home'));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
