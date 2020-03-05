<main class="dash-content">
    <div class="container-fluid">
        <?php if (!isset($retorno)) { ?>
        <h1 class="dash-title">Nenhum usuário.</h1>
        <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="spur-card-title">Usuários</div>
                    </div>
                    <div class="card-body ">
                        <table class="table table-hover table-in-card">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Acesso</th>
                                    <th scope="col">Cadastro</th>
                                    <th scope="col">Validado</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($retorno as $usuario) { ?>
                                <tr>
                                    <th scope="row"><?php if (isset($usuario->id)) { echo $usuario->id; } ?></th>
                                    <td><?php if (isset($usuario->apelido)) { echo $usuario->apelido; } ?></td>
                                    <td><?php if (isset($usuario->email)) { echo $usuario->email; } ?></td>
                                    <td><?php if (isset($usuario->role)) { echo $usuario->role; } ?></td>
                                    <td class="timestamp"><?php if (isset($usuario->acesso)) { echo $usuario->acesso; } ?></td>
                                    <td class="timestamp"><?php if (isset($usuario->cadastro)) { echo $usuario->cadastro; } ?></td>
                                    <td><?php if (isset($usuario->validado) && $usuario->validado == true) { echo '<i class="fas fa-check" style="color:green"></i>'; } else { echo '<i class="fas fa-times" style="color:red"></i>'; } ?></td>
                                    <td>
                                        <a href="<?php echo URL . 'usuarios/editar/' . htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?php echo URL . 'usuarios/apagar/' . htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este usuário?');"> 
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</main>