
<?php
  include("expensemanagement/session.php");

//session_start();

// if(!isset($_SESSION['loggedin'])){
//   header('Location: login.php');
// }
// else{
//     echo '<script>alert("Logged in Sucessfully!")</script>';
// }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Splitwise Cashflow Minimization, A Capstone Project Under Prof. Govinda K! Let's Make your Contris' Easier!</title>
    <link rel="icon" type="image/x-icon" href="/assets/splogofavicon.png">
</head>

<body>
    <div class="offcanvas offcanvas-start" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Create New Groups</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
        <div class="form-group">
        <div class="container col-md border border-success" style="background-color: rgba(66, 231, 171, 0.641) ;">
        <form action="groups.php" method="post" class="needs-validation" novalidate>
                <label for="gname">Group Name:</label>
                <input type="text" class="form-control" id="gname" placeholder="Enter your Name" name="gname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <br>
                <label for="gadmin">Group Admin:</label>
                <input class="form-control" type="text" placeholder="Admin" name="gadmin" value="<?php echo $username ; ?>" required>    
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            <br>
           <div class="text-center"> <button class="btn btn-primary text-center" type="submit" name="submit">Create</button></div>
           <br>
                <p> <?php if(isset($_SESSION['connected'])) echo $_SESSION['msg'];?></p>
           <br>
            </div>
        </form> 
</div>
</div>
<br>
<div class="offcanvas-header">
            <h1 class="offcanvas-title">Add Member</h1>
           
        </div>
        <div class="offcanvas-body">
        <div class="form-group">
        <div class="container col-md border border-success" style="background-color: rgba(66, 231, 171, 0.641) ;">
        <form action="members.php" method="post" class="needs-validation" novalidate>
        <label for="group">Group</label>
            <select class="form-control form-control-sm" name="group"required>
            <option>Select Group</option>
            </select>
                <br>
                <label for="members">Users</label>
                <select class="form-control form-control-sm" name="member"required>
            <option>Select User</option>
            </select>
            <br>
           <div class="text-center"> <button class="btn btn-primary text-center" type="submit" name="submit">Add Member</button></div>
           <br>
                <p> <?php if(isset($_SESSION['connected'])) echo $_SESSION['msg'];?></p>
           <br>
            </div>
        </form> 
</div>
</div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: rgb(10, 111, 79);">
        <a class="navbar-brand" href="#index.php"><img src="assets/splogo.png" alt="logo" class="rounded-circle"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="expensemanagement/login.php">Login</a>
                <a class="nav-item nav-link" href="expensemanagement/register.php">Signup</a>
                <a class="nav-item nav-link" href="expensemanagement/logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div><br></div>
    <div class=" col-md">
        <nav aria-label="breadcrumb " id="bc">
            <ol class="breadcrumb bg-warning row">
           <li class="col-md-10"><h3>Hello <?php echo $username ; ?>!           
          </h3></li>
            <li class= "col-md-2"> <a href="algo/path.php"><button type="button" class="btn btn-dark">View Transaction Path</button></a></li>
            </ol>
        </nav>
        <div class="row ">
            <div class="col-sm-3 ">
                <div class="card ">
                    <div class="card-body ">
                        <h5 class="card-title ">Total Expense</h5>
                        <p class="card-text ">Expense of this Month is<b> <?php

$sql = "SELECT SUM(expense) as Total_Expense FROM expenses WHERE user_id = '$userid'";
$result = $con->query($sql);
foreach($result as $results){
    foreach($results as $key => $val){
        $val=(int)$val;
        $ival= $val;
        echo "$key: $ival"." ₹";
    }
} ?></b> </p>
                        <a href="expensemanagement/manage_expense.php" class="btn btn-primary ">View Statement</a>


                    </div>
                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="card ">
                    <div class="card-body ">
                        <h5 class="card-title ">New Groups</h5>
                        <p class="card-text ">Create New group!</p>
                        <button class="btn btn-primary" id="sideb" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">Create Group</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="card ">
                    <div class="card-body ">
                        <h5 class="card-title ">Manage your Expenses </h5>
                        <p class="card-text ">Visit Expense Management System</p>
                        <a href="expensemanagement/" class="btn btn-primary ">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="card ">
                    <div class="card-body ">
                        <h5 class="card-title ">The Split</h5>
                        
                        <p class="card-text "><b><?php $sql = "SELECT COUNT(uid)
FROM members
WHERE members.gid=5;";
$result = $con->query($sql); $ival=0; $ival2=0; foreach($result as $results){
    foreach($results as $key => $val){
        $val=(int)$val;
        $ival= $val;
        
    }
}
$sql = "SELECT SUM(expenses.expense)
FROM members
INNER JOIN expenses ON members.uid = expenses.user_id
WHERE members.gid=5;";
$result = $con->query($sql); $ival2=0; foreach($result as $results){
    foreach($results as $key => $val){
        $val=(int)$val;
        $ival2= $val;
        
    }
} echo $ival2/$ival." ₹";
 ?></b> would be your share of expense.</p>
 <p class="card-text ">Total Spend  of the Group is <b><?php echo $ival2. " ₹"?></b></p>
                        <a href="# " class="btn btn-primary ">Pay Now!</a>
                        

                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg">
                <span>Recent Activity</h4></span>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Paurush has paid<b> ₹ 765</b> towards Groceries</li>
                    <li class="list-group-item">Krishna has paid<b> ₹ 608</b> towards Laundry</li>
                    <li class="list-group-item">Jatin has paid<b> ₹ 783</b> towards Cleaning</li>
                    <li class="list-group-item">Saahil has paid<b> ₹ 408</b> towards Water Bills</li>
                    <li class="list-group-item">You as paid<b> ₹ 2408</b> towards Wlectricity Bills</li>
                </ul>
            </div>

            <div class="col-lg-6">
                <span>Latest Payments</span>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">A payment of <b> ₹ 765 is made by you</b></li>
                    <li class="list-group-item">A payment of <b> ₹ 652 is made by you</b></li>
                    <li class="list-group-item">A payment of <b> ₹ 246 is made by you</b></li>
                    <li class="list-group-item">A payment of <b> ₹ 952 is made by you</b></li>
                    <li class="list-group-item">A payment of <b> ₹ 542 is made by you</b></li>
                </ul>
            </div>
        </div>
        <div>
            <hr>
            <hr>
            <hr>
            <hr>
        </div>
        <div class="col-lg">
            <span>Upcoming Payments</span>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <b> ₹ 952 is to be made in 3 days</b> </li>
                <li class="list-group-item"><b> ₹ 632 is to be made in 4 days</b></li>
                <li class="list-group-item"><b> ₹ 497 is to be made in 5 days</b> </li>
                <li class="list-group-item"><b> ₹ 357 is to be made in 6 days </b></li>
                <li class="list-group-item"><b> ₹ 983 is to be made in 7 days </b></li>
            </ul>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
    </div>
</body>

</html>