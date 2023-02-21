<!DOCTYPE html>
<html lang="en">
<head>
<title>Shai's Form Entries!</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: pink;
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
}

.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

.sidenav a:hover {
  background-color: #ddd;
  color: black;
}

.content {
  margin-left: 200px;
  padding-left: 20px;
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="index.php">Go Back to My Profile</a>
</div>

<div class="content">
  <h2>Shai's Form Entries!</h2>
  <p>Look at all the people who signed up on my website's form.</p>
  <p>
  <?php
          $servername = "Remote Server 1";
          $username = "webprogmi211";
          $password = "j@zzyAngle30";
          $dbname = "webprogmi211";
          
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT name, email, website, comment, gender FROM cmvaldez_MyGuests";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<br> Name: " . $row["name"]. " - Email: " . $row["email"]. " - Website: " . $row["website"].
              " - Comment: " . $row["comment"]. " - Gender: " . $row["gender"]. "<br>";
            }
          } else {
            echo "0 results";
          }
          $conn->close();  
  ?>
</p>
</div>

</body>
</html>