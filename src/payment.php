<?php require_once "./nav.php"  ?>
<?php 
session_start();

    require_once "../Database/Connection.php";
    require_once "./testQuery.php";
    $query = new TestQuery(Connection::make());
    $pendingTransaction = $query->fetchPendingConfirmTransaction($_SESSION["email"]);
    $transaction = $query->fetchConfirmTransaction($_SESSION["email"]);
    //  print_r($pending) ;
?>
<body class="px-11  ">

<div class="  ">

<div>
    <h1 class=" text-2xl font-semibold font-serif ">Pending: </h1> 
    <div class="flex justify-center ">
        <table class="table-auto w-4/5 drop-shadow-sm ">
            <thead class=" bg-gray-300 border-1 border-gray-400 text-white font-semibold " >
                <tr class=" text-xl font-semibold  ">
                <th>Name</th>
                <th>tranjaction Id</th>
                <th>Address</th>
                <th>Product</th>
                </tr>
            </thead>
            <tbody class="">
                <?php foreach($pendingTransaction as $payment): ?>
                    <tr class="border border-gray-200 ">
                    <td class="px-7 py-2 mx-5"><?php echo $payment['Name'] ?></td>
                    <td class="px-7 py-2 mx-5"> <?php echo $payment['TRANSACTIONID']?>  </td>
                    <td class="px-7 py-2 mx-5"><?php echo $payment['Address'] ?></td>
                    <td class="px-7 py-2 mx-5"><?php echo $payment['Product'] ?></td>
                    </tr>
                <?php endforeach ?>
                
            </tbody>
        </table>
    </div>
</div>

<div>
    <div>
    <h1 class=" text-2xl font-semibold font-serif ">Confirm: </h1> 

    <div class="flex justify-center">
        <table class="table-auto w-4/5 drop-shadow-sm">
            <thead class=" bg-gray-50 border-2 border-gray-200 text-black font-semibold " >
                <tr class="">
                <th>Name</th>
                <th>tranjaction Id</th>
                <th>Address</th>
                <th>Product</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($transaction as $payment): ?>
                    <tr>
                    <td class="px-7 py-2 mx-5"><?php echo $payment['Name'] ?></td>
                    <td class="px-7 py-2 mx-5"> <?php echo $payment['TRANSACTIONID']?>  </td>
                    <td class="px-7 py-2 mx-5"><?php echo $payment['Address'] ?></td>
                    <td class="px-7 py-2 mx-5"><?php echo $payment['Product'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>



    </div>



       
</div>
</div>






</body>
