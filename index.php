<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Chef-e-Teria</title>
  </head>
  <body data-spy="scroll" data-target="#main-nav" id="home">
    <nav
      class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"
      id="main-nav"
    >
      <div class="container">
        <a href="#" class="navbar-brand ">Chef-e-Teria</a>
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>

            <li class="nav-item">
              <a href="#explore-head-section" class="nav-link">Explore</a>
            </li>

            <li class="nav-item mr-3">
              <a href="customer/customer-signin.php" class="nav-link"><i class="fas fa-lock mr-1"></i>Customer</a>
            </li>

            <li class="nav-item">
              <a href="chef/chef-signin.php" class="nav-link"><i class="fas fa-lock mr-1"></i>Chef</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- HOME SECTION -->

    <header id="home-section">
      <div class="dark-overlay">
        <div class="home-inner container">
          <div class="row justify-content-center">
            
            <div class="d-none col-lg-8 d-lg-block">
              <h1 class="display-4">
                Build <strong>Profile</strong> And Gain Revenue
                <strong>Profits</strong>
              </h1>
              <div class="d-flex">
                <div class="p-4 align-self-start">
                  <i class="fas fa-check fa-2x"></i>
                </div>
                <div class="p-4 align-self-end">
                  Lorem ipsum dolor sit amet consectetur adipisicin g elit.
                  Sequi illum voluptatem molestias accusamus? Saepe, quasi.
                </div>
              </div>

              <div class="d-flex">
                <div class="p-4 align-self-start">
                  <i class="fas fa-check fa-2x"></i>
                </div>
                <div class="p-4 align-self-end">
                  Lorem ipsum dolor sit amet consectetur adipisicin g elit.
                  Sequi illum voluptatem molestias accusamus? Saepe, quasi.
                </div>
              </div>

              <div class="d-flex">
                <div class="p-4 align-self-start">
                  <i class="fas fa-check fa-2x"></i>
                </div>
                <div class="p-4 align-self-end">
                  Lorem ipsum dolor sit amet consectetur adipisicin g elit.
                  Sequi illum voluptatem molestias accusamus? Saepe, quasi.
                </div>
              </div>
            </div>


          
          </div>
          <form action="post">
          <div class="row justify-content-center mb-3">
                
                <a href="customer/customer-signin.php" class="btn btn-outline-light" name="scu">Sign Up As Customer</a>
            </div>
            <div class="row justify-content-center">
                <a href="chef/chef-signin.php" class="btn btn-outline-light" name="sch">Sign Up As Chef</a>
            </div>

          </form>
            
        </div>
      </div>
    </header>

    <!-- EXPLORE HEAD -->
    <section id="explore-head-section">
      <div class="container">
        <div class="row">
          <div class="col text-center py-5">
            <h1 class="display-4">Explore</h1>
            <p class="lead">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero
              recusandae harum dignissimos accusantium, ipsa autem illum rerum
              animi voluptate cum!
            </p>
            <a href="#" class="btn btn-outline-light">Find Out More</a>
          </div>
        </div>
      </div>
    </section>

    <!-- EXPLORE SECTION -->
    <section id="explore-section" class="bg-light text-muted py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img
              src="images/img-2.jpg"
              alt=""
              class="img-fluid mb-3 rounded-circle"
            />
          </div>
          <div class="col-md-6">
            <h3>Explore & Connect</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia
              eveniet tempore repellendus omnis cupiditate accusantium nihil
              minima nulla. Nemo, ipsum.
            </p>
            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Similique aspernatur a dicta sequi nemo harum.
                </p>
              </div>
            </div>

            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Similique aspernatur a dicta sequi nemo harum.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- CREATE SECTION -->
    <section id="create-section" class=" py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 order-2">
            <img
              src="images/img-3.jpg"
              alt=""
              class="img-fluid mb-3 rounded-circle"
            />
          </div>
          <div class="col-md-6 order-1">
            <h3>Create Your Passion</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia
              eveniet tempore repellendus omnis cupiditate accusantium nihil
              minima nulla. Nemo, ipsum.
            </p>
            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Similique aspernatur a dicta sequi nemo harum.
                </p>
              </div>
            </div>

            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Similique aspernatur a dicta sequi nemo harum.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SHARE SECTION -->
    <section id="share-section" class="bg-light text-muted py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img
              src="images/img-4.jpg"
              alt=""
              class="img-fluid mb-3 rounded-circle"
            />
          </div>
          <div class="col-md-6">
            <h3>Share What You Create</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia
              eveniet tempore repellendus omnis cupiditate accusantium nihil
              minima nulla. Nemo, ipsum.
            </p>
            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Similique aspernatur a dicta sequi nemo harum.
                </p>
              </div>
            </div>

            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Similique aspernatur a dicta sequi nemo harum.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->

    <footer id="main-footer" class="bg-danger">
      <div class="container">
        <div class="row">
          <div class="col text-center py-4">
            <h3>Chef-e-Teria</h3>
            <p>Copyright &copy; <span id="year"></span></p>
            <button
              class="btn btn-outline-light"
              data-toggle="modal"
              data-target="#contactModal"
            >
              Contact Us
            </button>
          </div>
        </div>
      </div>
    </footer>

    <!-- CONTACT MODAL-->
    <div class="modal fade text-dark" id="contactModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Contact Us</h5>
            <button class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" />
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" />
              </div>

              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger btn-block">Submit</button>
          </div>
        </div>
      </div>
    </div>


    ?>











    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
      integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
      crossorigin="anonymous"
    ></script>

    <script>
      $("#year").text(new Date().getFullYear());

      //Init ScrollSpy

      $("body").scrollspy({ target: "#main-nav" });

      //Add smooth scrolling
      $("#main-nav a").on("click", function(event) {
        if (this.hash !== "") {
          //Prevent default behaviour
          event.preventDefault();

          //Store hash
          const hash = this.hash;

          //Animate smooth hash

          $("html, body").animate(
            {
              scrollTop: $(hash).offset().top
            },
            900,
            function() {
              //Add hash to URL after scroll
              window.location.hash = hash;
            }
          );
        }
      });
    </script>
  </body>
</html>
