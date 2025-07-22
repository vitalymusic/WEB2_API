<?= $this->extend('shop/layout') ?>

<?= $this->section('content') ?>
  <div class="text-center">
  <h1>Welcome to MyShop</h1>
  <p>Discover the best deals on our platform!</p>
</div>
<style>
    #cartSidebar {
      width: 400px;
      position: fixed;
      top: 0;
      right: -400px;
      height: 100%;
      background-color: white;
      border-left: 1px solid #ddd;
      box-shadow: -2px 0 5px rgba(0,0,0,0.2);
      z-index: 1050;

      transition: right 0.3s ease-in-out;
    }
    #cartSidebar.show {
      right: 0;
    }

</style>
<div class="row m-4 ">
  <!-- Example Product Cards -->
  <?php foreach ($products as $product): ?>
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="<?= base_url('uploads/' . $product['image']) ?>" class="card-img-top" alt="<?= esc($product['name']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= esc($product['name']) ?></h5>
          <p class="card-text">€<?= number_format($product['price'], 2) ?></p>
          <a href="/product/<?= $product['id'] ?>" class="btn btn-primary">Skatīt</a>
          <a href="" class="btn btn-secondary insertToCartBtn" data-name="<?= esc($product['name']) ?>" data-price="<?= number_format($product['price'], 2) ?>" data-id="<?= $product['id'] ?>" id="">Nopirkt</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>



<!-- Login page -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to MyShop</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="customerForm">
        <div class="modal-body">
          <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
          <?php endif; ?>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Login</button>
          <p class="text-center mt-2 small">Don't have an account? <a href="<?= base_url('register') ?>">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Login page -->


<!-- Groza panelis -->
<div id="cartSidebar">
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
          <h5>Cart</h5>
          <button class="btn-close" id="closeCartBtn"></button>
        </div>
        <div class="p-3" id="cartItems">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <td>Nosaukums</td>
                    <td>Cena</td>
                    <td>Skaits</td>
                    <td>Summa</td>
                  </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="p-3 border-top">
          <strong>Kopā par visām precēm: $<span id="cartTotal">0.00</span></strong>
        </div>
</div>


<!-- Groza panelis -->

<script>
   var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));

  function showUserLogin(){
      loginModal.show();
  }


// formas apstrāde


$('#customerForm').submit((e)=>{
  e.preventDefault();
  data = $('#customerForm').serialize();
  $.post('<?= base_url('veikals/login')?>',data,function(data){
    console.log(data);
    if(data.message=="success"){
      loginModal.hide();
    }
  });


})
</script>



<script>
  $(document).ready(()=>{
    $('#closeCartBtn').click(()=>{
      $('#cartSidebar').removeClass('show');
    })
    $('#showCartBtn').click((e)=>{
      e.preventDefault();
      $('#cartSidebar').addClass('show');
    })


    $('.insertToCartBtn').click((e)=>{
       e.preventDefault();
      let data = {
        id: e.target.dataset.id,
        name: e.target.dataset.name,
        price: e.target.dataset.price,
        quantity:1
      }

      addNewItem(data);
    })


  })


</script>

<script>

  let cart = JSON.parse(window.localStorage.getItem("cart"));
  updateCart();
  function updateCart(){

          $('#cartItems tbody').html("");
          let total = 0;
    cart.forEach((item,i)=>{
            total+=item.price*item.quantity;
          $('#cartItems tbody').append(`
            <tr>
              <td>${item.name}</td>
              <td>${item.price}</td>
              <td>${item.quantity}</td>
              <td>${(item.price*item.quantity).toFixed(2)}</td>
            <tr>
          
          
          `)
    })
    $('#cartTotal').text(total.toFixed(2));
    window.localStorage.setItem('cart',JSON.stringify(cart));
  }

  function addNewItem(data){
      let result = cart.findIndex((item)=>{
            if(item.id == data.id){
              return item
            }
        })
        if(result!= -1){
          cart[result].quantity ++;
           updateCart();
        }else{
           cart.push(data);
            updateCart();
        }
  }

  function removeItem(id){

  }



  // grozs
  

  // 1. Nospiežot pogu, masīvā tiek pievienots elements ar produkta Id, Nosaukumu un cenu.
  // 2. Pirms ievitot masīvā šo elementu pārbauda vai nav jau tāds un ja ir tad palielināt skaitu. 
  // 3. Saskaitīt visu elementu summu







</script>


<?= $this->endSection() ?>