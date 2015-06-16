<?php
	include ('connection.php');

	$query = 'MATCH (m: Movie {released: 1998})<-[r:ACTED_IN]-(p: Person) RETURN p, r, m';
	$result = $connection->sendCypherQuery($query)->getResult();
	$movies = $result->get('m');

	echo '<h1>Cast by Movie</h1>';
	foreach ($movies as $movie) {
		echo $movie->getProperty('title') . '<br/>';

		foreach ($movie->getInboundRelationships() as $rel) {
			echo $rel->getStartNode()->getProperty('name') . ", " ;
		}

		echo '<br/>';
	}
?>
