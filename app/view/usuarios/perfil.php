<main role="main" class="flex-shrink-0">
	<div class="container">
		<h1 class="mt-5">Perfil</h1>

		<div class="card bg-dark" style="width: 18rem;">
			<img class="card-img-top" src="<?php if (isset($usuario->avatar)) { echo $usuario->avatar; } else { echo AVATAR_DEFAULT; } ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?php if (isset($usuario->apelido)) { echo $usuario->apelido; } ?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?php if (isset($usuario->role)) { echo $usuario->role; } ?></h6>
				<p class="card-text"><?php if (isset($usuario->bio)) { echo $usuario->bio; } ?></p>
				<p class="card-text"><small class="text-muted">Registrado em: <?php if (isset($usuario->cadastro)) { echo $usuario->cadastro; } ?></small></p>
				<a href="<?php echo URL . 'usuarios/editar/' . htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Editar</a>
				<a href="<?php echo URL . 'usuarios/apagar/' . htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Apagar</a>
			</div>
		</div>

	</div>
</main>