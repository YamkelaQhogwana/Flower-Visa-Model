<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/payments.css">

</head>
<body>

<div class="container">

    <form action="">

        <div class="row">

            <div class="col">

                <h3 class="title">BILLING ADDRESS</h3>

                <div class="inputBox">
                    <span>NAME</span>
                    <input type="text" placeholder="Yamkela Qhogwana" required>
                </div>
                <div class="inputBox">
                    <span>Email</span>
                    <input type="email" placeholder="yamkela.qhogwana2gmail.com" required>
                </div>
                <div class="inputBox">
                    <span>ADDRESS</span>
                    <input type="text" placeholder="17 FERERO STREET" required>
                </div>
                <div class="inputBox">
                    <span>CITY</span>
                    <input type="text" placeholder="JOHANNESBURG" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>PROVINCE</span>
                        <input type="text" placeholder="GAUTENG" required>
                    </div>
                    <div class="inputBox">
                        <span>POSTAL CODE</span>
                        <input type="text" placeholder="2091" required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">PAYMENT</h3>

                <div class="inputBox">
                    <span>VARDS ACCEPTED</span>
                    <img src="../images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>ACCOUNT HOLDER:</span>
                    <input type="text" placeholder="MISS YAMKELA QHOGWANA" required>
                </div>
                <div class="inputBox">
                    <span>CARD NUMBER</span>
                    <input type="number" placeholder="1111-2222-3333-4444" required>
                </div>
                <div class="inputBox">
                    <span>EXP MONTH</span>
                    <input type="text" placeholder="MARCH" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>EXP YEAR</span>
                        <input type="number" placeholder="2026" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" required>
                    </div>
                </div>

            </div>
    
        </div>

        <a href="done.php" class ="submit-btn">DONE</a>

    </form>

</div>    
    
</body>
</html>