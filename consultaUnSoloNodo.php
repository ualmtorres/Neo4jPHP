<?php
	include('connection.php');

	$query = 'MATCH (m: Movie {title: "When Harry Met Sally"})<-[:ACTED_IN]-(p:Person) RETURN m';
	$result = $connection->sendCypherQuery($query)->getResult();

	echo $result->getSingleNode()->getProperty('released');
?>