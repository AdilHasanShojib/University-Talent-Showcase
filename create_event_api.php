<?php

function query($query) {

    $res = false;
    if(!$connection = mysqli_connect('localhost', 'root', '', 'talent_showcase'))
    {
        die('unable to connect!');
    }

    $result = mysqli_query($connection, $query);

    if (!is_bool($result))
    {
        if (mysqli_num_rows($result) > 0 ) 
        {
            while ( $row = mysqli_fetch_assoc($result)) 
            {
                $res[] = $row;
            }
        }
    }

    return $res;
}

if (count($_POST) > 0) 
{
    $info = [];
    $info['data_type'] = $_POST['data_type'];

    if ($_POST['data_type'] == 'save')
    {
        $image = "";

        //var_dump($_FILES['image']['name']); // Debugging output
            // check for an image
        if (!empty($_FILES['image']['name']))
        {
            $allowed = ['image/jpeg', 'image/jpg', 'image/png'];

            if (in_array($_FILES['image']['type'], $allowed ))
            {
                $folder = "uploads/";

                if (!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                }

                $path = $folder . time() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $path);
                $image = $path;
            }

            $title = addslashes($_POST['title']);
            $description = addslashes($_POST['description']);
            $image = $image;
            $start_date = addslashes($_POST['start_date']); // YYYY-MM-DD
            $start_time = addslashes($_POST['start_time']); // HH:MM
            $end_date = addslashes($_POST['end_date']); // YYYY-MM-DD
            $end_time = addslashes($_POST['end_time']); // HH:MM

            // Combine date and time to make a datetime string
            $start_datetime = $start_date . ' ' . $start_time . ':00'; // YYYY-MM-DD HH:MM:SS
            $end_datetime = $end_date . ' ' . $end_time . ':00'; // YYYY-MM-DD HH:MM:SS
            
            $query = "INSERT INTO event (title, description, image, start_time, end_time) VALUES ('$title', '$description', '$image', '$start_datetime', '$end_datetime')";
            $result = query($query);
            $info['data'] = "Record was saved!";
        }

        echo json_encode($info);
    }
}

?>
