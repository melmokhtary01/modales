
<?php
    require 'conexion.php';
    echo "<style>";
   include 'estilo.css';
   echo "</style>";
    $sql=$connection->prepare("SELECT * FROM persona");
    $sql->execute();

    $resultado= $sql->fetchAll(PDO::FETCH_OBJ);
   
?>

<?php include 'header.php'; ?>

  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
                <h3>Ggestion de Usuarios</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>USUARIO</th>
                    <th>EMAIL</th>
                    <th colspan=2>ACTION</th>
                </tr>
              
                <?php foreach($resultado as $persona): ?>
                <tr>
                    <td><?= $persona->id; ?></td>
                    <td><?= $persona->usuario;  ?></td>
                    <td><?= $persona->email; ?></td>
                    <td><a href="edit.php?id=<?= $persona->id ?>" class="btn btn-info">Edit</a></td>
                    <td><a href='#myModal' class='btn btn-danger' data-toggle='modal'>Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a href="delete.php?id=<?= $persona->id?>" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>     
       
<?php include 'footer.php'; ?>