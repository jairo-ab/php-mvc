<h1 class="dash-title">Painel de Controle</h1>
<div class="row">
    <?php 
        if (isset($retorno)) { 
            $obj = json_decode($retorno);
            echo '<div class="alert alert-dismissible fade show ' . $obj->tipo . '" role="alert">' . $obj->msg . '</div>';
        } 
    ?>
    <div class="col-lg-6">
        <div class="stats stats-primary">
            <h3 class="stats-title">Usuários</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number"><?php echo (isset($usuarios)) ? $usuarios : '1'; ?></div>
                    <div class="stats-change">
                        <!-- <span class="stats-percentage">+17.5%</span> -->
                        <span class="stats-timeframe">usuários registrados</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="stats stats-info">
            <h3 class="stats-title">Posts</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number"><?php echo (isset($posts)) ? $posts : '0'; ?></div>
                    <div class="stats-change">
                        <!-- <span class="stats-percentage">+17.5%</span> -->
                        <span class="stats-timeframe">postagens</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>