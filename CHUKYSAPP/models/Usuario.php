<?php
    class Usuario extends Conectar{

        public function login(){
            $conectar = parent::conexion();
            parent::set_names();
        
            if(isset($_POST["logear"])){
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
        
                if(empty($correo) || empty($pass)){
                    header("Location:".conectar::ruta()."view/Login/indexpiola.php?m=2");
                    exit();
                } else {
                    $sql = "SELECT usu_id, usu_nom, usu_ape, rol_id, usu_pass FROM tm_usuario WHERE usu_correo=? and est=1;";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
        
                    if($resultado !== false && password_verify($pass, $resultado['usu_pass']) OR $pass==$resultado["usu_pass"]){
                        $_SESSION["usu_id"] = $resultado["usu_id"];
                        $_SESSION["usu_nom"] = $resultado["usu_nom"];
                        $_SESSION["usu_ape"] = $resultado["usu_ape"];
                        $_SESSION["rol_id"] = $resultado["rol_id"];
                        header("Location:".conectar::ruta()."view/Home/");
                        exit();
                    } else {
                        header("Location:".conectar::ruta()."view/Login/indexpiola.php?m=1");
                        exit();
                    }
                }
            }
        }
        
    
            public function registrar() {
                $conectar = parent::conexion();
                parent::set_names();
            
                
                $sql = "SELECT usu_id FROM tm_usuario WHERE usu_correo = ?";
                $sql = $conectar->prepare($sql);
            
                if (isset($_POST["registrar"])) {
                    $nom = $_POST["usu_nom"];
                    $ape = $_POST["usu_ape"];
                    $correo = $_POST["usu_correo"];
                    $pass = $_POST["usu_pass"];
                    $passenc = password_hash($pass, PASSWORD_BCRYPT); // Corregido aquí
                    $rol = 1;
            
                    if (empty($correo) or empty($pass)) {
                        header("Location:" . conectar::ruta() . "view/Login/indexpiola.php?m=2");
                        exit();
                    }
            
                   
                    $sql->bindValue(1, $correo);
                    $sql->execute();
                    $resultado = $sql->fetch();
            
                   
                    if (!$resultado) {
                     
                        $sql1 = "INSERT INTO tm_usuario (usu_id, usu_nom, usu_ape, usu_correo, usu_pass, rol_id, fecha_crea, fecha_modi, fecha_elim, est) VALUES (NULL,?,?,?,?,?,now(), NULL, NULL, '1');";
                        $sql1 = $conectar->prepare($sql1);
                        $sql1->bindValue(1, $nom);
                        $sql1->bindValue(2, $ape);
                        $sql1->bindValue(3, $correo);
                        $sql1->bindValue(4, $passenc);
                        $sql1->bindValue(5, $rol);
            
                        try {
                            $sql1->execute();
                            $filas_afectadas = $sql1->rowCount();
            
                            if ($filas_afectadas > 0) {
                                header("Location:" . conectar::ruta() . "view/Login/indexpiola.php?m=4");
                                exit();
                            } else {
                                header("Location:" . conectar::ruta() . "view/Login/indexpiola.php?m=5");
                                exit();
                            }
                        } catch (PDOException $e) {
                            
                            header("Location:" . conectar::ruta() . "view/Login/indexpiola.php?m=6");
                            exit();
                        }
                    } else {
                        header("Location:" . conectar::ruta() . "view/Login/indexpiola.php?m=3");
                        exit();
                    }
                }
            }
    
        

        public function insert_usuario($usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_usuario (usu_id, usu_nom, usu_ape, usu_correo, usu_pass, rol_id, fecha_crea, fecha_modi, fecha_elim, est) VALUES (NULL,?,?,?,?,?,now(), NULL, NULL, '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nom);
            $sql->bindValue(2, $usu_ape);
            $sql->bindValue(3, $usu_correo);
            $sql->bindValue(4, $usu_pass);
            $sql->bindValue(5, $rol_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_usuario($usu_id,$usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario set
                usu_nom = ?,
                usu_ape = ?,
                usu_correo = ?,
                usu_pass = ?,
                rol_id = ?
                WHERE
                usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nom);
            $sql->bindValue(2, $usu_ape);
            $sql->bindValue(3, $usu_correo);
            $sql->bindValue(4, $usu_pass);
            $sql->bindValue(5, $rol_id);
            $sql->bindValue(6, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario SET est='0' where usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where est='1'";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_x_rol(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where est=1 and rol_id=2";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_total_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) AS TOTAL FROM tm_ticket WHERE usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_usuario_totalabierto_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and tick_estado='Abierto'";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_usuario_totalcerrado_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and tick_estado='Cerrado'";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_usuario_grafico($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total
                FROM   tm_ticket  JOIN  
                    tm_categoria ON tm_ticket.cat_id = tm_categoria.cat_id  
                WHERE    
                tm_ticket.est = 1
                and tm_ticket.usu_id = ?
                GROUP BY 
                tm_categoria.cat_nom 
                ORDER BY total DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 

        public function update_usuario_pass($usu_id,$usu_pass){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    usu_pass = ? 
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_pass);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
    ?>
    