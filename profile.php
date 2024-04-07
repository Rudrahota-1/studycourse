<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Add any CSS stylesheets or external stylesheets here -->
    <style>
        /* Example styles */
        .profile {
            text-align: center;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-details {
            margin-bottom: 20px;
        }
        .edit-profile-link {
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <div class="profile-picture">
                <?php
                    $profile_picture_path = "path_to_profile_picture.jpg"; // Replace with the actual path to the user's profile picture
                    echo "<img src='$profile_picture_path' alt='Profile Picture'>";
                ?>
            </div>
            <div class="profile-details">
                <p><strong>Name:</strong> Rudra Narayan Hota</p>
                <p><strong>Email:</strong> rudranarayanhota9897@gmail.com</p>
                <!-- You can add more details as needed -->
            </div>
            <a href="edit_profile.php" class="edit-profile-link">Edit Profile</a>
        </div>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>
