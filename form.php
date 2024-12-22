<?php
include(" connect.php ");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="brainster icon" href="./Images/Logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Brainster-Vane Milevski</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/e2d4b2d900.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="d-flex justify-content-between flex-column form bg-warning">
    <!-- NAVBAR -->

    <nav class="navbar bg-warning p-0 navbar-expand-lg fixed-top">
      <div class="container-fluid p-4">
        <a
          class="navbar-brand d-flex justify-content-center flex-column align-items-center"
          href="./index.html"
          ><img src="./Images/Logo.png" class="logo-width" alt="Logo" />
          <span class="text-uppercase fw-bold logo-text">brainster</span></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
          data-bs-theme="dark"
        >
          <div class="offcanvas-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a
                  class="nav-link active fw-bold"
                  aria-current="page"
                  href="https://brainster.co/marketing/"
                  target="_blank"
                  >Академија за маркетинг</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active fw-bold"
                  aria-current="page"
                  href="https://brainster.co/full-stack/"
                  target="_blank"
                  >Академија за програмирање</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active fw-bold"
                  aria-current="page"
                  href="https://brainster.co/data-science/"
                  target="_blank"
                  >Академија за data science</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active fw-bold"
                  aria-current="page"
                  href="https://brainster.co/graphic-design/"
                  target="_blank"
                  >Академија за дизајн</a
                >
              </li>
              <li>
                <a href="./form.html" target="_blank"
                  ><button type="button" class="btn btn-danger fw-bold btn-ul">
                    Вработи наш студент
                  </button></a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- NAVBAR -->

    <!--  -->

    <!-- FORM -->

    <div class="containerfluid form-container align-self-center">
      <h1 class="text-center fw-bold mb-5">Вработи студенти</h1>

      <div class="container">
        <form
          class="row gx-3 gy-3 needs-validation"
          action="connect.php"
          method="post"
          novalidate
        >
          <div class="col-lg-6">
            <label for="imePrezime" class="form-label">
              <span class="fw-bold">Име и презиме</span>
            </label>

            <input
              type="text"
              class="form-control fst-italic p-3"
              id="fullName"
              placeholder="Вашето име и презиме"
              name="fullName"
              required
            />
            <div class="valid-feedback">Се е во ред!</div>
            <div class="invalid-feedback">Ве молиме внесете податоци!</div>
          </div>
          <div class="col-lg-6">
            <label for="validationCustom02" class="form-label"
              ><span class="fw-bold">Име на компанија</span></label
            >

            <input
              type="text"
              class="form-control fst-italic p-3"
              id="companyName"
              name="companyName"
              placeholder="Име на вашата компанија"
              required
            />
            <div class="valid-feedback">Се е во ред!</div>
            <div class="invalid-feedback">Ве молиме внесете податоци!</div>
          </div>
          <div class="col-lg-6">
            <label for="email" class="form-label">
              <span class="fw-bold">Контакт имејл</span>
            </label>

            <input
              type="email"
              class="form-control fst-italic p-3"
              id="email"
              name="email"
              placeholder="Контакт имејл на вашата компанија"
              required
            />
            <div class="valid-feedback">Се е во ред!</div>
            <div class="invalid-feedback">Ве молиме внесете податоци!</div>
          </div>
          <div class="col-lg-6">
            <label for="number" class="form-label">
              <span class="fw-bold">Контакт телефон</span>
            </label>

            <input
              type="tel"
              class="form-control fst-italic p-3"
              id="number"
              name="number"
              placeholder="Контакт телефон на вашата комоанија"
              pattern="[0-9]{3} [0-9]{3} [0-9]{4}"
              maxlength="12"
              required
            />
            <div class="valid-feedback">Се е во ред!</div>
            <div class="invalid-feedback">Ве молиме внесете податоци!</div>
          </div>
          <div class="col-lg-6">
            <label for="student" class="form-label fw-bold"
              >Тип на студенти</label
            >
            <select
              class="form-select fw-bold p-3"
              id="student"
              name="student"
              required
            >
              <option value selected disabled class="fw-bold">
                Изберете тип на студент
              </option>
              <option value="marketing" class="fw-bold">
                Студенти од маркетинг
              </option>
              <option value="coding" class="fw-bold">
                Студенти од програмирање
              </option>
              <option value="data-science" class="fw-bold">
                Студенти од data science
              </option>
              <option value="design" class="fw-bold">
                Студенти од data дизајн
              </option>
            </select>

            <div class="invalid-feedback">
              Ве молиме изберете валиден инпут!
            </div>
          </div>

          <div class="col-lg-6 d-flex align-self-end">
            <button class="btn btn-danger w-100 s-btn p-3" type="submit">
              Испрати
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- FORM -->

    <!--  -->

    <!-- FOOTER -->
    <div class="footer text-center bg-dark text-light fw-bold py-4 mt-5">
      Изработено со ❤️ од студентите на Brainster
    </div>
    <!-- FOOTER -->

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (() => {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.from(forms).forEach((form) => {
          form.addEventListener(
            "submit",
            (event) => {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
