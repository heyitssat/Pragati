<?php
session_start();
?>
<?php
//create_cat.php
include 'connect.php';
include 'header_test.php';
//echo $_SERVER['REQUEST_METHOD'];
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    //the user is not signed in
    echo 'Sorry, you have to be <a href="/forum/signin.php">signed in</a> to create a category.';
}
else
{
    //the user is signed in
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    //the form hasn't been posted yet, display it
    echo "<form method='post' action=''>
        Category name: <input type='text' name='cat_name' />
        <br>Category description: <br><textarea name='cat_description' /></textarea><br>
        <input type='submit' class='submit_button' value='Add category' />
     </form>";
}
 else
{   
    //the form has been posted, so save it
    $category_name= mysqli_real_escape_string($con,$_POST['cat_name']);
    $category_description=mysqli_real_escape_string($con,$_POST['cat_description']);
        $sql = "INSERT INTO categories(cat_name, cat_description)
              VALUES('$category_name', '$category_description')";
    $result = mysqli_query($con,$sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error($con);
    }
    else
    {
        echo 'New category successfully added.';
    }
}
}
include 'footer.php';
?>