<!DOCTYPE html>
<html>
<head>
<title>Hi, I'm Shai!</title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: pink;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
  background: white;
}

.header h1 {
  font-size: 50px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>
<script>
//  a little alert box before people see my website
alert("Whoa, you're heading into new territory!");
</script>

<div class="header">
  <h1>Hi, I'm Shai!</h1>
  <p>Take a quick look at my website. Or stare at it. I don't know.</p>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="resources1.html">Resources</a>
  <a href="guests.php">Show Form Entries</a>
  <a href="#" style="float:right">Link</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>SOME TIDBITS ABOUT ME</h2>
      <h5>Read this and get to know me, January 2023</h5>
      <div class="fakeimg" style="height:550px;">
        <img id="tidbitsImage" src="gamerShai.jpg" style="height:500px">
      </div>
      <p>I'm just a simple Pasayeño studying at Asia Pacific College as a frustrated Game Development student!</p>
      <p>I've been a scholar student all my life; without scholarships I'd be as good as dead!</p>
      <p>I'm a dayfly!</p>
      <p>I'm a math nerd! Here, have a random number: </p>
      <p id = "math"></p>
      <script>
        document.getElementById("math").innerHTML = Math.random();
      </script>
      <button onclick="document.getElementById('math').innerHTML = getRndInteger(1,10)">Click Me to Get a Random Number Again</button>
      <p id = "math"></p>
      <script>
        function getRndInteger(min, max) {
          return Math.floor(Math.random() * (max - min + 1) ) + min;
        }
      </script>
    </div>
    <div class="card">
      <h2>SOME MORE TIDBITS ABOUT ME</h2>
      <h5>Read more of this and get to know more about me, January 2023</h5>
      <div class="fakeimg" style="height:350px;">
        <img id="tidbitsImage" src="friendShai.jpg" style="height:300px">
      </div>
      <p>I really like hanging out with my friends!</p>
      <p>I really value quality time with people!</p>
      <p>I have so much love and power for a small body of mine!</p>
      <p>I have sensory, emotional, and mental issues.</p>
    </div>
    <div class="card">
      <h2>FILL OUT THIS FORM!</h2>
      <h5>Please fill out this form, February 2023</h5>
      <div class="fakeimg" style="height:350px;">
        <img id="tidbitsImage" src="thumbsUpShai.jpg" style="height:300px">
      </div>
      <p>Look at this neat form!</p>
        <?php
            // define variables and set to empty values
            $nameErr = $emailErr = $genderErr = $websiteErr = "";
            $name = $email = $gender = $comment = $website = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }
    
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }
        
                if (empty($_POST["website"])) {
                    $website = "";
                } else {
                    $website = test_input($_POST["website"]);
                    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                        $websiteErr = "Invalid URL";
                    }
                }

                if (empty($_POST["comment"])) {
                    $comment = "";
                } else {
                    $comment = test_input($_POST["comment"]);
                }

                if (empty($_POST["gender"])) {
                    $genderErr = "Gender is required";
                } else {
                    $gender = test_input($_POST["gender"]);
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <h2>PHP Form Validation Example</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Website: <input type="text" name="website" value="<?php echo $website;?>">
        <span class="error"><?php echo $websiteErr;?></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">  
        </form>

        <?php
            echo "<h2>Your Input:</h2>";
            echo $name;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $website;
            echo "<br>";
            echo $comment;
            echo "<br>";
            echo $gender;
        ?>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
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

          // sql to create table
          //$sql = "CREATE TABLE cmvaldez_MyGuests (
          //  name VARCHAR(30) NOT NULL,
          //  email VARCHAR(50) NOT NULL,
          //  website VARCHAR(30),
          //  comment TEXT(500),
          //  gender VARCHAR(10) NOT NULL
          //  )";
            
          //if ($conn->query($sql) === TRUE) {
          //  echo "Table cmvaldez_MyGuests created successfully";
          //} else {
          //  echo "Error creating table: " . $conn->error;
          //}
          
          $sql = "INSERT INTO cmvaldez_MyGuests (name, email, website, comment, gender)
          VALUES ('$name', '$email', '$website', '$comment', '$gender')";
          
          if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $conn->close();
        }
        ?>        
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:435px;">
          <!-- a button to show cool_shai.png -->
         <button onclick="document.getElementById('myImage').src='cool_shai.png'">Click here for Cool Shai</button>
         <img id="myImage" src="picture.png" style="width:350px;height:350px">
         <!-- a button to show sleepy shai picture -->
         <button onclick="document.getElementById('myImage').src='picture.png'">Click here for Sleepy Shai</button>
      </div>
      <p>I'm a twenty-year-old all rounder, year round. Jack of all trades, mastering all but none.</p>
      <p id="facts"></p>
      <script>
        const person = {
          firstName: "Cheyenne",
          lastName: "Valdez",
          city: "Pasay",
          age: 20,
        };
      document.getElementById("facts").innerHTML = "Basic facts: " + person.firstName + " " + person.lastName + ", " + person.city + ", " + person.age;
      </script>
    </div>
    <div class="card">
      <h3>Cool, Recent Pictures of Mine!</h3>
      <div class="fakeimg"><p><img id="recentImage" src="badmintonShai.jpg" style="width:300px;height:300px"></p></div>
      <div class="fakeimg"><p><img id="recentImage" src="bar.jpg" style="width:300px;height:300px"></p></div>
      <div class="fakeimg"><p><img id="recentImage" src="dogShai.jpg" style="width:300px"></p></div>
    </div>
  </div>
</div>

<div class="footer">
  <h2>© Asia Pacific College 2023. All Rights Reserved</h2>
</div>

</body>
</html>


