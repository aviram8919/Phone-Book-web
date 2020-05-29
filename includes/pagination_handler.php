<?php
$query = "SELECT * FROM newcontact";
$result = $conn->query($query);

//starting of pagination code.............................

$results_per_page = 4;  //Define how many results to show per page

//Find out the number of results stored in database
$sql = "SELECT * FROM newcontact";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);



//determine no of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

//determine which page number the visitor is currently on

if(!isset($_GET['page'])) {
    $page = 1;
}else{
    $page = $_GET['page'];
}

//determine the sql Limit starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

//retrieve selected results from database and display them on page
$sql = "SELECT * FROM newcontact LIMIT " .$this_page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn, $sql);

//ending of pagination code............................................................

?>
