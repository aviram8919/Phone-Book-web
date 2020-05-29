<?php
require 'config/config.php';
require 'includes/pagination_handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/content.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
                <h4 class="text-center">Phone Book Record</h4>
                
                <form action="details.php" method="POST" class="form-inline p-3">
                    <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0" placeholder="Search" style="width:80%;">
                    <input type="submit" name="submit" value="search" class='btn btn-info btn-lg rounded-0" style="width:20%;'>
                </form>
            </div>
            
            <div class="col-md-5" style="position:relative;margin-top:-39px; margin-left:215px;">
                <div class="list-group" id="show-list">


                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
                <?php
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()) {
                            echo "<div class='accordion'>
                                    <div>
                                        <input type='checkbox' name='example_accordion' id='section1' class='accordion__input'>
                                        <label for='section1' class='accordion__label'>".$row['name']." </label>
                                    
                                        <div class='accordion__content'>
                                    
                                            <div class='flex_content'>
                                                ".$row['dob']." &nbsp;&nbsp;
                                                <a href='update.php?id=$row[id] & name=$row[name] & dob=$row[dob] & mobileno=$row[mobileno] & email=$row[email]' id='edit'>Edit</a>&nbsp;
                                                <a href='delete.php?id=$row[id]' onclick='return checkdelete()'>Remove</a>
                                            </div>
                                        
                                            <table style='width:100%' border:'1px solid black' margin-top:'10px'>
                                        
                                                <tr>
                                                    <td>
                                                        <img src='call_icon.png' alt='icon'> ".$row['mobileno']."
                                                    </td>

                                                    <td>
                                                        <img src='mail_icon.png' alt='icon'> ".$row['email']."
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div> ";
                            }
                        }
                    ?>
                        <?php
                            //display the links of the page

                            for($page=1;$page<=$number_of_pages;$page++){
                                echo '<div id="pagination">  <a id="anchor" href="practice.php?page=' . $page . '">' . $page . '</a> </div> ';
                            }
                        ?>
                        
                        <div id="Add_icon">
                            <a href="AddNewContact.php"><img src="circle.png" alt="icon"></a>
                        </div>
            </div>
        </div>
    </div>

    <script>
        function checkdelete(){
            return Confirm('Are you sure you want to delete the record');
        }
    </script>



    <script type="text/javascript">
            $(document).ready(function(){
                $("#search").keyup(function(){
                    var searchText = $(this).val();
                    if(searchText!=''){
                        $.ajax({
                            url:'action.php',
                            method:'post',
                            data:{query:searchText},
                            success:function(response){
                                $("#show-list").html(response);
                            }
                        });
                    }
                    else{
                        $("#show-list").html('');
                    }
                });
                $(document).on('click','a',function(){
                    $("#search").val($(this).text());
                    $("#show-list").html('');
                });
            });
    </script>
</body>
</html>