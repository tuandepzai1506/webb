<?php
    include 'connect.php';
    $id = isset($_GET['id']) ? $_GET['id'] : null ;

       $sql= "SELECT * FROM product_detail WHERE product_id='$id'";
       $result = $conn->query($sql);
       
       if ($result->num_rows > 0) {
        
         while($row = $result->fetch_assoc()) {
        echo "
           <div class='col d-flex justify-content-center '>
                
                  <div class = 'card' style='width: 70%  min-width:450px'>
                    <div class='image-card' style='min-height:460px'>
                        <img src='image/{$row['product_img']}' class='card-img-top ' alt=''/>
                    </div>
                    <div class='card-body'>
                        <p class='card-text fw-bold'style='min-height:50px'>{$row['product_name']}</p>
                        <p class='card-text fw-light'>{$row['product_description']}</p>
                        <p class='card-text fw-bold text-danger'>{$row['product_cost']} VNĐ</p>
                        <div class='input-group w-25'>
                            <button class=' btn btn-outline-secondary' type='button' onclick='changeQuantity(-1)'>-</button>
                            <input id='quantity' name='quantity' class='form-control text-center' value='1' min='1'>
                            <a></a><button class='btn btn-outline-secondary' type='button' onclick='changeQuantity(1)'>+</button>
                            </div>
                            <script>
                                function changeQuantity(amount) {
                                const input = document.getElementById('quantity');
                                let value = parseInt(input.value) || 1;
                                value += amount;
                                if (value < 1) value = 1;
                                input.value = value;
                                }
                            </script>
                            <a class='btn btn-primary bg-danger' role='button' href='#'>
                                  Mua ngay    
                            </a>
                    </div>
                  </div>
                   
              </div>
                 ";
         }
        }
       ?>