<?php
// Include database connection file
include '../db.php';

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $nama = mysqli_real_escape_string($conn, $_POST['name']); // 'name' field should map to 'nama' in DB
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate that the passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
        exit;
    }

    // Check if the email or username already exists in the database
    $email_check_query = "SELECT * FROM users WHERE email = ?";
    $username_check_query = "SELECT * FROM users WHERE username = ?";

    // Prepare and execute the email check query
    if ($email_stmt = $conn->prepare($email_check_query)) {
        $email_stmt->bind_param("s", $email);
        $email_stmt->execute();
        $email_result = $email_stmt->get_result();

        // Prepare and execute the username check query
        if ($username_stmt = $conn->prepare($username_check_query)) {
            $username_stmt->bind_param("s", $username);
            $username_stmt->execute();
            $username_result = $username_stmt->get_result();

            // If either email or username already exists, show an error message
            if ($email_result->num_rows > 0) {
                echo "<script>alert('Email is already used!');</script>";
                exit;
            } elseif ($username_result->num_rows > 0) {
                echo "<script>alert('Username is already taken!');</script>";
                exit;
            }

            // If no duplicates, continue with registration
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL query to insert new user data
            $sql = "INSERT INTO users (nama, username, email, password) VALUES (?, ?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                // Bind the parameters to the prepared statement
                $stmt->bind_param("ssss", $nama, $username, $email, $hashed_password);

                // Execute the query
                if ($stmt->execute()) {
                    // Get the last inserted ID
                    $last_inserted_id = $conn->insert_id;

                    // Format the user ID as 'us001', 'us002', etc.
                    $formatted_id = 'us' . str_pad($last_inserted_id, 3, '0', STR_PAD_LEFT);

                    // Update the user record with the formatted ID
                    $update_sql = "UPDATE users SET id_user = ? WHERE id_user = ?";
                    if ($update_stmt = $conn->prepare($update_sql)) {
                        // Bind the parameters for updating the id_user
                        $update_stmt->bind_param("si", $formatted_id, $last_inserted_id);

                        // Execute the update query
                        if ($update_stmt->execute()) {
                            // Show success message with JavaScript redirect
                            echo "<script>
                                    alert('Registration successful! You will be redirected to the login page.');
                                    setTimeout(function(){
                                        window.location.href = 'login_user.php';
                                    }, 2000); // Redirect after 2 seconds
                                  </script>";
                        } else {
                            echo "Error updating ID: " . $update_stmt->error;
                        }

                        // Close the update statement
                        $update_stmt->close();
                    }
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Error: Could not prepare query.";
            }

            // Close the username check statement
            $username_stmt->close();
        }
        // Close the email check statement
        $email_stmt->close();
    }

    // Close database connection
    $conn->close();
}
?>
