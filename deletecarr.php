 
 include 'connection.php'
 <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['carcode']}</td>";
            echo "<td>{$row['brandname']}</td>";
            echo "<td>{$row['modelname']}</td>";
            echo "<td>{$row['color']}</td>";
            echo "<td>{$row['registeration_no']}</td>";
            echo "<td>{$row['fuel_type']}</td>";
            echo "<td>{$row['seating_capacity']}</td>";
            echo "<td>";
          }
          else
          {
            echo"no car";
          }