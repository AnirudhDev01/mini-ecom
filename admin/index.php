<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <section>
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="card">
              <div class="card-body">
                <h3>Admin Login</h3>
                <form method="post" action="code.php">
                  <div class="mb-3">
                    <label for="email">Email: </label>
                    <input
                      type="email"
                      name="admin_email"
                      id=""
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="password">Password: </label>
                    <input
                      type="password"
                      name="admin_password"
                      id=""
                      class="form-control"
                      required
                    />
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100" name="admin_login_btn">
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
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
</body>
</html>