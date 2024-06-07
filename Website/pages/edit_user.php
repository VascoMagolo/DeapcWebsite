<?php
session_start();
include ("../pages/header.php");
include ("../pages/nav.php");
include ("../scripts/getdata.php");

try {
    include ("../scripts/liga_db.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
    exit();
}

if (!isset($_GET['id'])) {
    echo "User ID is missing.";
    exit();
}

$userId = intval($_GET['id']);
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$res = $stmt->get_result();

$user = $res->fetch_assoc();
if (!$user) {
    echo "User not found.";
    exit();
}
?>
<head>
    <link rel="stylesheet" href="../css/edit_user.css">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<form action="../scripts/update_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">

    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" maxlength="30" value="<?php echo htmlspecialchars($user['firstname']); ?>" required><br><br>

    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" maxlength="30" value="<?php echo htmlspecialchars($user['lastname']); ?>" required><br><br>

    <label for="username">Usarname:</label><br>
    <input type="text" id="username" name="username" maxlength="30" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>

    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" min="0" max="255" value="<?php echo htmlspecialchars($user['age']); ?>" required><br><br>

    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" maxlength="50" value="<?php echo htmlspecialchars($user['address']); ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" maxlength="254" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

    <label for="type_id">Type User:</label><br>
    <select name="type_id" id="type_id">
        <?php
        $query = "SELECT * FROM types_users";
        $res = my_query($query);
        foreach ($res as $v) {
            $selected = $user['type_id'] == $v['id'] ? 'selected' : '';
            echo "<option value='{$v['id']}' $selected>{$v['name']}</option>";
        }
        ?>
    </select>
    <button type="submit">Edit</button>
</form>

</body>
<?php
include ("../pages/footer.php");
?>
