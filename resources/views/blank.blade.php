<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CoreUI CSS -->
  <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
  <title>CoreUI</title>
</head>
<body class="c-app">
  <div class="c-sidebar c-sidebar-dark c-sidebar-md-show">

    <button class="c-header-toggler" type="button"> <span class="c-header-toggler-icon"></span> </button>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-title">Nav Title</li>
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="#">
          <i class="c-sidebar-nav-icon cil-speedometer"></i>
          Nav item </a>
      </li>
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="#">
          <i class="c-sidebar-nav-icon cil-speedometer"></i>
          With badge
          <span class="badge badge-primary">NEW</span>
        </a>
      </li>
      <li class="c-sidebar-nav-item nav-dropdown">
        <a class="c-sidebar-nav-link nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon cil-puzzle"></i>
          Nav dropdown
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="#">
              <i class="c-sidebar-nav-icon cil-puzzle"></i>
              Nav dropdown item
            </a>
          </li>
          <li class="c-sidebar-nav-item"> <a class="c-sidebar-nav-link" href="#">
            <i class="c-sidebar-nav-icon cil-puzzle"></i>
            Nav dropdown item
          </a>
          </li>
        </ul>
      </li> <li class="c-sidebar-nav-item mt-auto">
        <a class="c-sidebar-nav-link c-sidebar-nav-link-success" href="https://coreui.io">
          <i class="c-sidebar-nav-icon cil-cloud-download"></i>
          Download CoreUI
        </a>
      </li>
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link c-sidebar-nav-link-danger" href="https://coreui.io/pro/">
          <i class="c-sidebar-nav-icon cil-layers"></i>
          Try CoreUI <strong>PRO</strong>
        </a>
      </li>
    </ul>
    <button class="c-sidebar-minimizer c-brand-minimizer" type="button"></button>
  </div>


  <header class="c-header c-header-light px-3">
    <a class="c-header-brand" href="#">CoreUI</a>
    <button class="c-header-toggler" type="button"> <span class="c-header-toggler-icon"></span> </button>
    <ul class="c-header-nav">
      <li class="c-header-nav-item active"> <a class="c-header-nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li> <li class="c-header-nav-item"> <a class="c-header-nav-link" href="#">Features</a> </li> <li class="c-header-nav-item"> <a class="c-header-nav-link" href="#">Pricing</a> </li> <li class="c-header-nav-item"> <a class="c-header-nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> </li>
    </ul>
  </header>

  <!-- Optional JavaScript -->
  <!-- Popper.js first, then CoreUI JS -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>
</html>