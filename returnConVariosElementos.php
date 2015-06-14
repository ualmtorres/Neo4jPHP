<?php
	include('connection.php');

	$query = 'MATCH (m: Movie {released: 1998})<-[r:ACTED_IN]-(p: Person) RETURN p, r, m';
	$result = $connection->sendCypherQuery($query)->getResult();
	$actors = $result->get('p');
	$movies = $result->get('m');
	$relations = $result->get('r');

	echo '<h1>All the actors in 1998 movies</h1>';
	foreach ($actors as $actor) {
		echo 'Actor: ' . $actor->getProperty('name') . ' ' . $actor->getProperty('born') . '</br>';
	}

	echo '<h1>All the relations</h1>';
	foreach ($relations as $rel) {
		echo $rel->getStartNode()->getProperty('name') . ' acts in ' . 
			$rel->getEndNode()->getProperty('title') . '</br>';
	}
?>
