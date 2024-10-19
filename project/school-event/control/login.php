<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/panaghiusa/model/database.php');

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['password'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("SELECT * FROM users WHERE (name = ? OR userId = ?) AND pass = ?");
    $stmt->bind_param("sss", $user, $user, $pass); // Bind the user input to the statement
    $stmt->execute(); // Execute the statement
    $result = $stmt->get_result(); // Get the result

    if ($loginRow = $result->fetch_assoc()) {
        // User authenticated, set session variables
        $_SESSION['user'] = $loginRow['name'];
        $_SESSION['libId'] = $loginRow['userId'];

        // Check if the user is a regular user and log attendance
        if ($loginRow['account'] === 'user') {
            $name = $loginRow['name'];
            $userId = $loginRow['userId'];

            header("Location: view/user/user.php");
            
        } else {
            // Redirect based on account level for non-regular users
            switch ($loginRow['account']) {
                case "developer":
                    header("Location: ../developer/dev.php");
                    break;
                case "admin":
                    header("Location: view/admin/admin.php");
                    break;
                default:
                    // Handle unknown account levels
                    echo "Unknown account level. Please contact the administrator.";
            }
        }
    } else {
        // Login failed
        echo "<script>alert('Login Failed, Please Check your Login Credentials');</script>";
    }

    // Close the main statement and the connection
    $stmt->close();
    $conn->close();
}
?>