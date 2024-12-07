<?php
include '../config/conexion.php';
include 'header.php';
?>

<main class="main__showApp">
    <div>
        <!-- Tabla de medicamentos -->
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th class="col">Nombre</th>
                    <th class="col">Descripción</th>
                    <th class="col">Dosis</th>
                    <th class="col">Frecuencia</th>
                    <th class="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $conn->query('SELECT * FROM Medicamentos');
                
                if ($sql && $sql->num_rows > 0) {
                    while ($med = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($med->nombre) ?></td>
                            <td><?= htmlspecialchars($med->descripcion) ?></td>
                            <td><?= htmlspecialchars($med->dosis) ?></td>
                            <td><?= htmlspecialchars($med->frecuencia) ?></td>
                            <td>
                                <a href="#" class="btn btn-small btn-primary">Editar</a>
                                <a href="#" class="btn btn-small btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron medicamentos en la base de datos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include 'footer.php';
?>
