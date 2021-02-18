<?php
        require 'conexion.php';
        $message ='';
        if(isset($_POST['usuario'])  && ($_POST['email'])){
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];

            echo $usuario.'-'.$email;
            //entonces lo inserto en la tabla de persona
            $sql="INSERT INTO persona (usuario, email) VALUES (:usuario, :email)";
            $sentencia=$connection->prepare($sql);
            if($sentencia->execute([':usuario' => $usuario, ':email' => $email])){
                $message= "Data inserted succesfully";
                header("Location: ./");
            }else{
                $message ="Data not inserted";
            }

        }
    ?>

<?php include 'header.php'; ?>
    
     <div class="container">
         <div class="card mt-5">
            <div class="card-header">
                <h2>Create person</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alet alert-success">
                        <?php echo $message ?>
                    </div>
                <?php endif; ?>
                <form method="post" >
                    <div class="form-group">
                        <label for="name">usuario</label>
                        <input type="text" name="usuario" id="usuario" placeholder="usuario" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">create</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
        
     <?php include 'footer.php'; ?>