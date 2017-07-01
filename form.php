<!--Host this file on a server-->
<html>
<body>
    <?php
        #$varRegistration    = check_input($_POST['formRegistration'], "");
        $name_first         = check_input($_POST['name_first']);
        $name_middle        = check_input($_POST['name_middle']);
        $name_last          = check_input($_POST['name_last']);
        $name               = $name_first . ' ' . $name_middle . ' ' . $name_last;    
        
        $address_street     = check_input($_POST['address_street']);
        $address_city       = check_input($_POST['address_city']);
        $address_zip        = check_input($_POST['address_zip']);
        $address            = $address_street . ' ' . $address_city . ' ' . $address_zip;        
            
        $phone              = check_input($_POST['phone']);
        $email              = check_input($_POST['email']);
        $w_num              = '#' . check_input($_POST['w_num']);
        #$major              = check_input($_POST['major']);
        #$minor              = check_input($_POST['minor']);
        $rank               = $_POST['rank'];    
    
        $conn = mysqli_connect("localhost:3306", "root", "TossTheDice12", "form_local");

        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO members (name, email, w_num, rank, phone, address)
        VALUES ('$name_first', '$email', '$w_num', '$rank', '$phone', '$address')";

        if (mysqli_query($conn, $sql)) 
        {
            echo "New record created successfully";
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>
    
    <?php 
    function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>
</html>

