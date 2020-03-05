<main role="main" class="flex-shrink-0">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-6">
				<h1 class="mt-5">Cadastro</h1>
				<?php 
					if (isset($retorno)) { 
						$obj = json_decode($retorno);
						echo '<div class="alert alert-dismissible fade show ' . $obj->tipo . ' " role="alert">' . $obj->msg . '</div>';
					} 
				?>
				<form method="post" action="<?php echo URL; ?>usuarios/confirma">
					<div class="form-group">
						<label for="nome">Nome completo</label>
						<input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
					</div>
					<div class="form-group">
						<label for="apelido">Apelido</label>
						<input name="apelido" type="text" class="form-control" id="apelido" placeholder="Login" required>
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" required>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail" required>
						<small id="emailHelp" class="form-text text-muted">Nós não compartilhamos seu e-mail com ninguem.</small>
					</div>
					<button id="cadastrar" name="cadastrar" type="submit" class="btn btn-dark">Cadastrar</button>
				</form>
			</div>
		</div>
	</div>
</main>