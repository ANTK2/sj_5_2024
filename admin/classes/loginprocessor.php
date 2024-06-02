<?php
session_start();
require_once 'Database.php';

class LoginProcessor {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function processLogin($name, $password) {
        $conn = $this->db->getConn();
        $stmt = $conn->prepare("SELECT password FROM account WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['name'] = $name;
                $_SESSION['loggedin'] = true;
                header("Location: ../index.php");
                exit();
            } else {
                echo "The password you entered was not valid.";
            }
        } else {
            echo "No account found with that name.";
        }

        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $loginProcessor = new LoginProcessor($db);
    $loginProcessor->processLogin($_POST['name'], $_POST['password']);
    $db->close();
} else {
    header("Location: ../login.php");
}
?>
