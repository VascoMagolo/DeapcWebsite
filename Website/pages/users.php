<?php
session_start();
include ("../pages/header.php");
include ("../pages/nav.php");
include ("../scripts/getdata.php");
try {
    include ("../scripts/liga_db.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
}

?>
<head>
  <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>
<body>
<?php
$query = 'SELECT users.*, types_users.name FROM users JOIN types_users ON users.type_id=types_users.id';

$res = my_query($query);
echo '<div class="u_table">';
echo '<table border="1">';
echo '<tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Username</th>
        <th>Type</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>';

foreach($res as $v)
{
  echo '<tr>
  <td>' . htmlspecialchars($v['id']) . '</td>
  <td>' . htmlspecialchars($v['firstname']) . '</td>
  <td>' . htmlspecialchars($v['lastname']) . '</td>
  <td>' . htmlspecialchars($v['age']) . '</td>
  <td>' . htmlspecialchars($v['email']) . '</td>
  <td>' . htmlspecialchars($v['username']) . '</td>
  <td>' . htmlspecialchars($v['name']) . '</td>
  <td><a href="edit_user.php?id=' . htmlspecialchars($v['id']) . '">Edit</a></td>
  <td><a href="../scripts/delete_register.php?id=' . htmlspecialchars($v['id']) . '&t=users">X</a></td>
  </tr>';
}
echo '</table>';
echo '</div>';
?>
</body>
<?php
include ("../pages/footer.php");
?>