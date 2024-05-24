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
<body>
<?php
$query = 'SELECT * FROM users';

$res = my_query($query);

echo '<table border="1">';
echo '<tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Username</th>
        <th>Type ID</th>
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
    <td>' . htmlspecialchars($v['type_id']) . '</td>
  </tr>';;
}
echo '</table>';
?>
</body>
<?php
include ("../pages/footer.php");
?>