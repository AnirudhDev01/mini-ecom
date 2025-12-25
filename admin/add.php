<?php include 'includes/header.php'; ?>
     <!-- Register Form Section -->
    <section>
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="card">
              <div class="card-body">
                <h3>Add New Product</h3>
                <form method="post" action="code.php" enctype="multipart/form-data" >
                  <div class="mb-3">
                    <label for="prod_name">Product Name: </label>
                    <input
                      type="text"
                      name="prod_name"
                      id=""
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="prod_price">Price: </label>
                    <input
                      type="text"
                      name="prod_price"
                      id=""
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="prod_description">Description: </label>
                  <textarea name="prod_description" id="" class="form-control"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="prod_img">Image: </label>
                    <input
                      type="file"
                      name="prod_img"
                      id=""
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100" name="add_prod_btn">
                      Add Product
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Register Form Section -->
<?php include 'includes/footer.php'?>
