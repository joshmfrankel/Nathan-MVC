<?php

    /**
     * SITE STATUS
     * DEV - PRODUCTION
     *
     * This will do the following when in PRODUCTION mode
     * Use combined / minified css files
     * Use combined / minified js files
     * Suppress PHP errors and log them
     */
    define('SITE_STATUS', 'DEV');

     ///////////////////////////////
    // Basic Directory Constants //
     ///////////////////////////////

    define("SITE_ROOT", "");

     /////////////////////
    // DIRECTORY PATHS //
     /////////////////////

    define('APP_DIR', 			'app/');
    define('CORE_DIR', 			'app/core/');
    define('CONTROLLER_DIR', 	'app/controllers/');
    define('VIEWS_DIR', 		'app/views/');
    define('MODELS_DIR', 		'app/models/');
    define('TEMPLATE_DIR', 		'app/templates/');

    //////////////////////
    // ENABLED FEATURES //
    //////////////////////
    define('HTML5_ENABLED', 	TRUE);
    define('JQUERY_ENABLED',	TRUE);
    define('MODERNIZR_ENABLED', TRUE);

    ////////////////
    // SEO CONFIG //
    ////////////////
    define('SITE_NAME', 'A Simple MVC Framework');
    define('SITE_DESC', 'A fork of the Nathan Simple MVC framework.  The goal is to extend upon the base functionality.');

    /**
     * GOOGLE specific settings
     */
    define('GOOGLE_TRACKING', 'UA-xxxxx-xx');
