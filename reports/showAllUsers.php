<?php

require('../test_connection.php');

function raport_cheltuieli_json($expense_name) {

    return $suma;
}

$result = mysqli_query($db, "SELECT * FROM users") or die('Error');

$reptype = $_GET['reptype'];
$dataFromQuery = $_GET['data'];
$type = $_GET['type'];

switch ($reptype) {
    case 'raport_avg_expense_price':

        $result = mysqli_query($db, "SELECT * FROM expenses where expense ='$dataFromQuery'") or die('Error');
        $suma = 0;
        $aparitions = 0;
        while ($row = mysqli_fetch_array($result)) {

            $cost = $row['cost'];
            $suma += $cost;
            $aparitions++;
        }
        $value = $suma / $aparitions;


        switch ($type) {


            case 'json':
                $response['expense_name'] = $dataFromQuery;
                $response['expense_avg_cost'] = $value;
                $response['aparitions'] = $aparitions;
                $data = json_encode($response);
                break;
            case 'xml':
                $data = '<collection>';

                $data .= "<expense>";
                $data .= "<name>" . $dataFromQuery . "</name>";
                $data .= "<average_cost>" . $value . "</average_cost>";
                $data .= "<aparitions>" . $aparitions . "</aparitions>";
                $data .= "</expense>";

                $data .= '</collection>';
                break;
            case 'html':
                $data = '<html></html>';
                $data .= '<p>Expense: ' . $dataFromQuery . '</p>';
                $data .= '<p>Average cost : ' . $value . '</p>';
                $data .= '<p>Aparitions: ' . $aparitions . '</p>';

                $data .= '<head></head>';
                break;
            default:
        }
        break;


    case 'raport_user':

        $result = mysqli_query($db, "SELECT id FROM users where username ='$dataFromQuery'") or die('Error');
        while ($row = mysqli_fetch_array($result)) {
            $myid = $row['id'];
        }

        // avg expense cost, total expenses, personal expenses, group expenses

        $result = mysqli_query($db, "SELECT * FROM expenses where user_id ='$myid'") or die('Error');
        $sum = 0;
        $buyings = 0;
        $sum_group = 0;
        $sum_personal = 0;
        while ($row = mysqli_fetch_array($result)) {


            $cost = $row['cost'];
            $group_id = $row['group_id'];
            $sum += $cost;
            if ($group_id == 0)
                $sum_group += $cost;
            else
                $sum_personal += $cost;



            $buyings++;
        }
        $value = $sum / $buyings;



        switch ($type) {


            case 'json':
                $response['username'] = $dataFromQuery;
                $response['expense_avg_cost'] = $value;
                $response['total_expenses'] = $buyings;
                $response['total_money'] = $sum;
                $response['group_expenses'] = $sum_group;
                $response['solo_expenses'] = $sum_personal;

                $data = json_encode($response);
                break;
            case 'xml':
                $data = '<collection>';

                $data .= "<user>";
                $data .= "<username>" . $dataFromQuery . "</username>";
                $data .= "<expense_avg_cost>" . $value . "</expense_avg_cost>";
                $data .= "<total_expenses>" . $buyings . "</total_expenses>";
                $data .= "<total_money>" . $sum . "</total_money>";
                $data .= "<group_expenses>" . $sum_group . "</group_expenses>";
                $data .= "<solo_expenses>" . $sum_personal . "</solo_expenses>";
                $data .= "</user>";

                $data .= '</collection>';
                break;
            case 'html':
                $data = '<html></html>';
                $data .= '<p> Username: ' . $dataFromQuery . '</p>';
                $data .= '<p>Average cost : ' . $value . '</p>';
                $data .= '<p>Total Expenses: ' . $buyings . '</p>';
                $data .= '<p>Total Money: ' . $sum . '</p>';
                $data .= '<p>Group Expenses: ' . $sum_group . '</p>';
                $data .= '<p>Solo Expenses: ' . $sum_personal . '</p>';

                $data .= '<head></head>';
                break;
            default:
        }
        break;
}


$fp = fopen('results.' . $type, 'w');
fwrite($fp, $data);
fclose($fp);
?>

