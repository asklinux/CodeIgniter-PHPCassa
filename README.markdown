CodeIgniter-PHPCassa is an implementation of PHPCassa for CodeIgniter.
You can find the latest version of PHPCassa at http://www.github.com/hoan/phpcassa
NOTE:	This is just a placeholder, I havn't started the development on this library
		just yet but plan to do so in the next couple of days.

The intended usage is below:

$this->load->library('cassandra');

$this->cassandra->get('users',$key);
$this->cassandra->insert('users','user@domain.com',array(
														'first_name' => 'Ian',
														'last_name'	 => 'Livingstone',
														'password'	 => 'Some Encrypted String',
														'passkey'	 => 'Some Randomly Generated String'
													));

Then in your cassandra.php configuration file you'll add the node list and ports

$cassandra['nodes'][] = array(
							'hostname' 	=> '54.32.1.54',
							'port'		=> '9000'
						);
$cassandra['nodes'][] = array(
							'hostname'	=> 'cassandra-node-54',
							'port'		=> '4322'
						);
