<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Confirmez votre adresse email</h2>

		<div>
			Veuillez cliquer sur le lien pour confirmer votre adresse email : {{ URL::to('user/confirm', array($token)) }}.<br/>
		</div>
	</body>
</html>