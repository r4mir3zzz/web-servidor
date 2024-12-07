<?php
include 'header.php';
?>

<main class="main__showApp">
    <div>
        <!-- Notificaciones de medicamentos -->
        <?php
        include '../config/conexion.php';

        // Consulta para obtener medicamentos próximos
        $sql_medicamentos = $conn->query("
            SELECT * FROM Medicamentos 
            WHERE horario >= CURTIME() 
            AND fecha = CURDATE() 
            ORDER BY horario ASC 
            LIMIT 3
        ");

        if ($sql_medicamentos->num_rows > 0) { ?>
            <div class="alert alert-warning">
                <h4>Próximos Medicamentos:</h4>
                <ul>
                    <?php while ($med = $sql_medicamentos->fetch_object()) { ?>
                        <li><strong><?= $med->horario ?></strong>: Tomar <?= $med->dosis ?> de <?= $med->nombre ?>.</li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <!-- tabla de medicamentos -->
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th class="col">Nombre</th>
                    <th class="col">Descripción</th>
                    <th class="col">Dosis</th>
                    <th class="col">Frecuencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //mostrar todos los medicamentos
                $sql = $conn->query('SELECT * FROM Medicamentos');
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->descripcion ?></td>
                        <td><?= $datos->dosis ?></td>
                        <td><?= $datos->frecuencia ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include 'footer.php';
?>