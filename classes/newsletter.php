<?php
class newsletter {
    
    function __construct() {
        
    }
    
    public function afegir($nom,$cognom,$correu,$ip){
        require_once 'connexio.php';
        $bd = new connexio();
        
        $sql = "INSERT INTO newsletter (nom,cognoms,correu,ip) VALUES ('$nom','$cognom','$correu','$ip')";
        if ($bd->query($sql)) {
            return $bd->insert_id;
        } else {
            return 0;
        }
            
        $bd->close();
    }
    
    public function llistar(){
        require_once 'connexio.php';
        $bd = new connexio();
        
        $sql = "SELECT * FROM newsletter";
        $n = $bd->query($sql);
        $i=1;
        while ($news = $n->fetch_array(MYSQLI_ASSOC)) {
          echo '<tr>';
          echo "<td>".$i."</td>";
          echo "<td>".utf8_encode($news['nom'])."</td>";
          echo "<td>".utf8_encode($news['cognoms'])."</td>";
          echo "<td>".$news['correu']."</td>";
          echo "</tr>";
          $i++;
        }
    }
    
}
