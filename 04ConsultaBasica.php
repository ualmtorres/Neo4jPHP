<?php
	include('connection.php');

  $query = 'MATCH (m: Movie {released: 1998}) RETURN m';
  $result = $connection->sendCypherQuery($query)->getResult();

  foreach ($result->getNodes() as $node){
    echo ($node->getProperty('title')) . '</br>';
  }
?>
