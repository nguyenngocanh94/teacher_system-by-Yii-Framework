<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Teacher System Website',
    'theme'=> 'default',
    // preloading 'log' component
    'preload' => array('log', 'bootstrap'),
    // autoloading model and component classes
    'aliases' => array(
                'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'),
                'vendor.twbs.bootstrap.dist' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'bootstrap.behaviors.*',
        'bootstrap.components.*',
        'bootstrap.form.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*',
        'application.modules.poll.models.*',
        'application.modules.poll.components.*',
    ),
    'behaviors' => array(
        'runEnd' => array(
            'class' => 'application.components.WebApplicationEndBehavior',
        ),
    ),
    'modules' => array(
    // uncomment for using admin modules    
        /*
        'admin' => array(
            'baseUrl' => '/admin',
            'layout' => 'admin.views.layouts.main',
            'appLayout' => 'admin.views.layout.main',
        ),
        */
      'poll' => array(
         // Force users to vote before seeing results
         'forceVote' => FALSE,
         // Restrict anonymous votes by IP address,
         // otherwise it's tied only to user_id 
         'ipRestrict' => TRUE,
         // Allow guests to cancel their votes
         // if ipRestrict is enabled
         'allowGuestCancel' => TRUE,
         
       ),
        'name' => array(
          'baseUrl' =>'/name',
          'layout' => 'name.views.layouts.main0',
          'appLayout' => 'name.views.layouts.main0',
          ),
    // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array('bootstrap.gii',),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        
        'authManager'=>array(
         'class' => 'CDbAuthManager',
         'connectionID' => 'db',
         'defaultRoles' => array('guest'),
     ),
        
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi', 
            'cdnUrl'=>"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5",

        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'showScriptName'=>false,    
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */

        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
