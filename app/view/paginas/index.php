<main role="main" class="container h-100">
    <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="jumbotron-heading">PHP MVC SQLite Crud</h1>
            <p class="lead text-muted">
                Um exemplo simples de Crud(Create, Read, Update & Delete) usando a linguagem PHP e o Modelo MVC(Model - View - Controller) com o banco de dados SQLite3.
            </p>
            <p>
                <a href="<?php echo URL; ?>usuarios" class="btn btn-dark">Listar Usuários</a> 
            </p>
        </div>
    </div>
</main>

<?php 
    if (isset($retorno) && $retorno !== false) { 
        $obj = json_decode($retorno);
?>
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div style="position: absolute; bottom: 20px; left: 20px;">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="true" data-delay="7000">
            <div class="toast-header">
                <svg width="20" height="20" class="mr-2" viewBox="0 0 24 24">
                    <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z" fill="#ccc"></path>
                </svg>
                <strong class="mr-auto"><?php if (isset($this->cfg['site'])) { echo $this->cfg['site']; } else { echo 'PHP MVC'; } ?></strong>
                <small>agora</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body text-dark">
                <?php echo (isset($obj->msg)) ? $obj->msg : ''; ?>
            </div>
        </div>

    </div>
</div>
<?php } ?>


