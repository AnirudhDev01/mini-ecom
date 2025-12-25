<?php include 'includes/header.php'?>
     <!-- Login Form Section -->
    <section>
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="card">
              <div class="card-body">
                <h3>Login</h3>
                <form method="post" action="code.php">
                  <div class="mb-3">
                    <label for="email">Email: </label>
                    <input
                      type="email"
                      name="email"
                      id=""
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="password">Password: </label>
                    <input
                      type="password"
                      name="password"
                      id=""
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100" name="login_btn">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Login Form Section -->
<?php include 'includes/footer.php'?>
