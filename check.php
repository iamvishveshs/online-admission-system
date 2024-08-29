<?php
            $query="SELECT * FROM `application_status` WHERE `user_id`='$id'";
            $result=mysqli_query($conn,$query);
            $check=mysqli_fetch_assoc($result);
            
            ?>
            