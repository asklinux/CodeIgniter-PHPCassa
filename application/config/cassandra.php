<?php
/*
*	CodeIgniter-Cassandra Configuration File
*	Implemented by Ian Livingstone (http://www.ianlivingstone.ca)
*	Uses PHPCassa a direct port of Pycassa (http://github.com/hoan/phpcassa)
*/

/*
*	List of Cassandra Nodes
*	To add a node, just add another array element
*
*	Example:
*	$cassandra['nodes'][] = array(
*								'hostname' 	=> '134.56.33.41',
*								'port'		=> '9000'
*							);
*/
$cassandra['nodes'] = array();
$cassandra['nodes'][] = array(
							'hostname' 	=> 'localhost',
							'port'		=> '9000'
						);

/*
*	List of Columns Familys
*	Specify all columns family here 
*
*	Example:
*	$cassandra['columns'][] = array(
*								'keyspace' 		=> 'Keyspace1',
*								'name'			=> 'Users',
*								'supercolumn'	=> true
*/
$cassandra['columns'] = array();
$cassandra['columns'][] = array(
							'keyspace'		=> 'ProjectOne',
							'name'			=> 'Users',
							'supercolumn'	=> false
						);
