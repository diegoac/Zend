<?php
 // Filename: /module/Blog/config/module.config.php

return array(

	'db' => array(
         'driver'         => 'Pdo',
         'username'       => 'SECRET_USERNAME',  //edit this
         'password'       => 'SECRET_PASSWORD',  //edit this
         'dsn'            => 'mysql:dbname=blog;host=localhost',
         'driver_options' => array(
             \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
         )
     ),

	'service_manager' => array(
         'factories' => array(
         	//a new Service that listens to the name Blog\Service\PostServiceInterface
         	//and points to our own implementation which is Blog\Service\PostService
         	//O serviço pode ser colocado em invokables, dado que não precisa de dependências.

             //'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
         	'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
         	'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
         	'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory'
         )
     ),

	'view_manager' => array(
         'template_path_stack' => array(
             __DIR__ . '/../view',
         ),
    ),


    'controllers' => array(
    	//invokables: São classes que podem ser invocadas sem qualquer argumento.
    	//Foi substituída por 'factories'.
        /*'invokables' => array( 
            'Blog\Controller\List' => 'Blog\Controller\ListController'
        )*/
        'factories' => array(
             'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
         )

    ),
    // This lines opens the configuration for the RouteManager
    'router' => array(
        // Open configuration for all possible routes
        'routes' => array(
            // Define a new route called "post"
            'post' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as url
                    'route'    => '/blog', // resultado: url = http://zf-ezee-tutorial.com/blog 

                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Blog\Controller\List',
                        'action'     => 'index',
                    )


                )
            )
        )
    ),

);
?>