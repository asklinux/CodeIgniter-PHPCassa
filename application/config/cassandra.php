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
*   Read Consistency Levels (from cassandra.thrift):
*   0   => Not supported, because it doesn't make sense.
*   1   =>  Will return the record returned by the first node to respond. 
*           A consistency check is always done in a background thread to fix
*           any consistency issues when ConsistencyLevel.ONE is used. This means subsequent
*           calls will have correct data even if the initial read gets an older value.
*           (This is called 'read repair'.)
*   2   => Will query all storage nodes and return the record with the most recent timestamp
*          once it has at least a majority of replicas reported. Again, the remaining replicas
*          will be checked in the background.
*   5   => Not yet supported, but we plan to eventually.
*
*   Write Consistency Levels (from cassandra.thrift)
*   0   => Ensure nothing. A write happens asynchronously in background
*   1   => Ensure that the write has been written to at least 1 node's commit
*          log and memory table before responding to the client.
*   2   => Ensure that the write has been written to <ReplicationFactor> / 2 + 1 
*           nodes before responding to the client.
*   5   => Ensure that the write is written to <code>&lt;ReplicationFactor&gt;</code>
*           nodes before responding to the client.
*
*	Example:
*	$cassandra['columns'][] = array(
*								'keyspace' 		            => 'Keyspace1',
*								'name'			            => 'Users',
*								'supercolumn'	            => true
*                               'column_type'               => 'UTF8String',
*                               'subcolumn_type'            => null,
                                'read_consistency_level'    => 1,
                                'write_consistency_level'   => 1
                                   );
*/
$cassandra['columns'] = array();
$cassandra['columns'][] = array(
							'keyspace'		            => 'ProjectOne',
							'name'			            => 'Users',
							'supercolumn'	            => false,
                            'column_type'               => 'UTF8String',
                            'subcolumn_type'            => null,
                            'read_consistency_level'    => 1,
                            'write_consistency_level'   => 1
						);
