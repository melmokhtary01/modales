<?php
        require 'conexion.php';
        $id = $_GET['id'];
        $sql="SELECT * FROM persona WHERE id=:id";
       $sentencia=$connection->prepare($sql);
       $sentencia->execute([':id' => $id]);

       $resultado=$sentencia->fetch(PDO::FETCH_OBJ);

       if(isset($_POST['usuario'])  && isset($_POST['email'])){
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];

       
        //entonces lo inserto en la tabla de persona.
        $sql="UPDATE persona SET usuario=:usuario, email=:email WHERE id=:id ";
        $sentencia=$connection->prepare($sql);
        if($sentencia->execute([':usuario' => $usuario, ':email' => $email, ':id' => $id])){
            $message= "Data updated succesfully";
            header("Location: ./");
            
        }else{
            $message ="Data not Updated";
        }

    }

    ?>
  <?php include 'header.php'; ?>
    
     <div class="container">
         <div class="card mt-5">
            <div class="card-header">
                <h2>Update person</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alet alert-success">
                        <?php echo $message ?>
                    </div>
                <?php endif; ?>
                <form method="post" >
                    <div class="form-group">
                        <label for="usuario">usuario</label>
                        <input value="<?= $resultado->usuario; ?>" type="text" name="usuario" id="usuario" placeholder="usuario" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?= $resultado->email; ?>" type="text" name="email" id="email" placeholder="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
      
  <?php include 'footer.php'; ?>