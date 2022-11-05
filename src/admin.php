<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../dist/css/customcss/admin.css" />
   
     
    <title>Login</title>
  </head>

  <body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa fa-user-o"> </span>Quick Food</h2>
        </div>
    
        <div class="sidebar-menu">
            <ul>
                <li><a href="../index.php" class="active"><span class="fa fa-home"></span><span>Home</span></a></li>
                <li><a href="admin_page.php"><span class="fa fa-tasks"></span><span>Add Food </span></a></li>
                <li><a href="admin_update.php"><span class="fa fa-person"></span><span>Update Food</span></a></li>
                
            </ul>
        </div>
    </div>

    <div class="content">
        <main>
            <main>
                <div class="cards">
                     <div class="card-single">
                         <div>
                             <h2>2.000.000</h2>
                             <small>sales</small>
                         </div>
                         <div>
                             <span class="fa fa-money-bill"></span>
                         </div>
                     </div>
                
                     <div class="card-single">
                         <div>
                             <h2>+30</h2>
                             <small>Stock</small>
                         </div>
                         <div>
                             <span class="fa fa-shopping-cart"></span>
                         </div>
                     </div>
                
                
                    
                     <div class="card-single">
                         <div>
                         <h2>2k</h2>
                         <small>Customer</small>
                         </div>
                         <div>
                         <span class="fa fa-person"></span>
                     </div>
                
                 </div>
                </div>

            <div class="composant">
                <div class="ventes">
                    <div class="case">
                        <div class="header-case">
                            <h2>List of order</h2>
                            <!--<button class="button">view all <span class="fa fa-arrow-right"></span></button> -->
                        </div>
                        <div class="body-case">
                            <div class="tableau">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Order ID</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Asif</td>
                                            <td>21</td>
                                            <td><span class="status-produit color-one"></span>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>Saif</td>
                                            <td>87</td>
                                            <td><span class="status-produit color-two"></span>In Progress</td>
                                        </tr>
                                        <tr>
                                            <td>Rafa</td>
                                            <td>192</td>
                                            <td><span class="status-produit color-three"></span>Done</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
            
              
            
            
            </div>
        </main>
  </body>
</html>
