<?php
	include ('connection.php');

	$query = 'MATCH path=(m: Movie {released: 1998})<--(p: Person) RETURN path, m';
	$result = $connection->sendCypherQuery($query)->getResult();
	$movies = $result->get('m');

	echo '<h1>Movie Information</h1>';
	foreach ($movies as $movie) {
		echo '<h4>' . $movie->getProperty('title') . '</h4>';

		$actors = $movie->getRelationships('ACTED_IN');

		echo 'Actors: ';
		foreach ($actors as $actor) {
			echo $actor->getStartNode()->getProperty('name') . ", " ;
		}

		$directors = $movie->getRelationships('DIRECTED');

		echo '</br>Directors: ';
		foreach ($directors as $director) {
			echo $director->getStartNode()->getProperty('name') . ", " ;
		}

		$writers = $movie->getRelationships('WROTE');

		echo '</br>Writers: ';
		foreach ($writers as $writer) {
			echo $writer->getStartNode()->getProperty('name') . ", " ;
		}

		$producers = $movie->getRelationships('PRODUCED');

		echo '</br>Producers: ';
		foreach ($producers as $producer) {
			echo $producer->getStartNode()->getProperty('name') . ", " ;
		}

		echo '<br/>';
	}
?>
