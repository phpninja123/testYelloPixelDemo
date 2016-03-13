<?php
require_once("FetchRecords.php");
function callDB()
{
    $option = $_REQUEST['operation'];
    $table  = $_REQUEST['target'];
    $selectSQL = '';
    $loadSql = '';
    $newSql = '';
    $updateSql = '';
    $name = '';
    $id = '';
    $param = '';
    switch ($table) {
        case 2:
            $tableName = 'project_info';
            if ($option == 'read') {
                $loadSql = "select p.ID,p.IMAGE_PATH, c.Name,p.CREATED, p.UPDATED from project_info p inner join category c on p.IMAGE_CATEGORY = c.ID where p.DELETED=0 and c.DELETED=0";
            }
            if ($option == 'select') {
                $id        = $_REQUEST['RecId'];
                $selectSQL = "select p.ID,p.IMAGE_PATH, c.NAME from project_info p inner join category c on p.IMAGE_CATEGORY = c.ID where p.ID = $id";
            }
            if ($option == 'new') {
                $param  = $_REQUEST['name'];
                $newSql = "insert into project_info (IMAGE_CATEGORY, IMAGE_PATH, PORTFOLIO_IMAGE) VALUES ((select ID from category where NAME= '$param[0]' and DELETED = 0),'$param[1]', '$param[2]')";
            }
            if ($option == 'update') {
                $param = $_REQUEST['name'];
                $id    = $_REQUEST['id'];
                if (empty($param[1])) {
                    $updateSql = "update project_info set IMAGE_CATEGORY = (select ID from category where Name='$param[0]' and DELETED = 0),PORTFOLIO_IMAGE = '$param[2]', UPDATED = now() where ID = $id and DELETED=0";
                } else {
                    $updateSql = "update project_info set IMAGE_CATEGORY = (select ID from category where Name='$param[0]' and DELETED = 0), IMAGE_PATH = '$param[1]',PORTFOLIO_IMAGE = '$param[2]', UPDATED = now() where ID = $id and DELETED=0";
                }
            }
            break;
        case 4:
            $tableName = 'slider';
            if ($option == 'read') {
                $loadSql = "select * from slider where DELETED = 0";
            }
            if ($option == 'select') {
                $id        = $_REQUEST['RecId'];
                $selectSQL = "select * from slider where ID=$id";
            }
            if ($option == 'new') {
                $param  = $_REQUEST['name'];
                $newSql = "insert into slider ( IMAGE_PATH) VALUES ('$param[0]')";
                //print_r($newSql); 		
            }
            if ($option == 'update') {
                $param = $_REQUEST['name'];
                $id    = $_REQUEST['id'];
                if (empty($param[0])) {
                    $updateSql = "update slider set  UPDATED = now() where  ID = $id and DELETED= 0 ";
                } else {
                    $updateSql = "update slider set IMAGE_PATH = '$param[0]' , UPDATED = now() where  ID = $id and DELETED= 0 ";
                }
            }
            break;
    }
    switch ($option) {
        case "read":
            //callread();
            echo json_encode(readRecords($loadSql));
            break;
        case "select":
            echo json_encode(readRecords($selectSQL));
            break;
        case "update":
            //$date = now();
            //echo($date);
            updateRecords($updateSql);
            if ($table == 2) {
                echo "<script>window.location = 'portfolio.php';</script>";
            } else if ($table == 4) {
                echo "<script>window.location = 'slider.php';</script>";
            }
            break;
        case "delete":
            $id  = $_REQUEST['RecId'];
            $sql = "update $tableName set DELETED = 1 where ID=$id ";
            echo deleteRecords($sql);
            /*if ($table == 2) {
                echo "<script>window.location = 'portfolio.php';</script>";
            } else if ($table == 4) {
                echo "<script>window.location = 'slider.php';</script>";
            }*/
            break;
        case "new":
            WriteRecords($newSql);
            if ($table == 2) {
                echo "<script>window.location = 'portfolio.php';</script>";
            } else if ($table == 4) {
                echo "<script>window.location = 'slider.php';</script>";
            }
            break;
    }
}
callDB();
?>