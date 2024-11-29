<?php
include 'header.php';
?>

<main class="main__showApp">
    <div>
        <h2>Medicamentos agregados</h2>
    <table class="table">
        <thead class="bg-info">
            <tr>
                <th class="col">Nombre Medicamento</th>
                <th class="col">Descripcion</th>
                <th class="col">Dosis</th>
                <th class="col">Frecuencia</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../config/conexion.php';
                $sql = $conn->query(' select * from Medicamentos ');
                while ($datos = $sql->fetch_object()){ ?>
                        <tr>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->descripcion ?></td>
                            <td><?= $datos->dosis ?></td>
                            <td><?= $datos->frecuencia ?></td>
                            <td>
                                <a href="" class="btn btn-small btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
</svg></a>
                                <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
              <?php  }
            ?>
            
        </tbody>
    </table>
    </div>
</main>

<?php
include 'footer.php';
?>