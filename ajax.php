<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#cat_id").change(function()
                {
                    //get selected parent option 
                    var cat_id = $("#cat_id").val();
                    //alert(admin_id);
                    $.ajax(
                            {
                                type: "GET",
                                url: "names.php?cat_id=" + cat_id,
                                success: function(data)
                                {
                                    $("#names").html(data);
                                    
                                }
                            });
                });
                $("#ser_id").change(function()
                {
                    //get selected parent option 
                    var cat_id = $("#ser_id").val();
                    //alert(admin_id);
                    $.ajax(
                            {
                                type: "GET",
                                url: "pro.php?ser_id=" + ser_id,
                                success: function(data)
                                {
                                    $("#pro").html(data);
                                    
                                }
                            });
                });

            });
        </script>
<?php 
$conn = mysqli_connect("localhost","root","","mls");

$result = mysqli_query($conn, "SELECT * FROM category");
while($row = mysqli_fetch_array($result)){
	$userSet[] = $row;
}
?>        
    </head>
    <body>        
        <h2>Select User</h2>
        <form action="ajax.php" method="post">
            <select name='cat_id' id='cat_id'>
                <option value=""></option>
                <?php
                foreach ($userSet as $key => $value) {
                    echo "<option value='{$value['cat_id']}'>{$value['cat_id']}</option>";
                }
                ?>
            </select>
            <select id="names"></select>
        </form> 
    </body>
</html>    
