<?php  require ('./inc/header.php'); ?>
<main>
    <h2>View your order</h2>

    <fieldset>
        <legend>Record</legend>
        <?php


        require './inc/database.php';
        $company_code = "DEMO";
        $sql = "SELECT * FROM `Order` order by ETA; ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        echo '<table>
                <tr>
                    <th>Company</th>
                    <th>User</th>
                    <th>Mode</th>
                    <th>Order</th>
                    <th>Dest</th>
                    <th>ETA</th>
                    <th>Action</th>
                </tr>';

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                            <td>' . $row['company_code']  . '</td>
                            <td>' . $row['username']  . '</td>
                            <td>' . $row['Mode']  . '</td>
                            <td>' . $row['Order']  . '</td>
                            <td>' . $row['Dest']  . '</td>
                            <td>' . $row['ETA']  . '</td>
                            <td style="display: flex; justify-content: space-between;">

                                <form action= "doc_view.php" method="POST">
                                    <button type="submit" name="doc_view" value=' . $row['Order']. ' class = "button" ><img src="img/document.svg" alt="doc_view" ></button>
                                </form>   
                                <form action= "edit.php" method="POST">
                                    <button type="submit" name="edit_order" value=' . $row['Order']. ' class = "button" ><img src="img/edit.svg" alt="edit" ></button>
                                </form>

                                <form action= "delete.php" method="POST">
                                    <button type="submit" name="delete_order" value=' . $row['Order']. ' class = "button" ><img src="img/delete.svg" alt="delete" ></button>
                                </form>

                            </td>
                        </tr>' ;
            }
        } else {
            echo '<tr><td>No records found.</td></tr>';
        }

        echo '</table>';
      
        ?>
    </fieldset>
</main>
<?php require ('./inc/footer.php'); ?>
