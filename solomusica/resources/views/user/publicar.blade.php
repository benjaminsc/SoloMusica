<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/publicar.css')}}">
  <link rel="stylesheet" href="{{asset('img/index/fonts/style.css')}}">

  <body>

    <header>
        <nav >
            <ul>
                <a href="" class="uno" style="text-decoration:none;"><li><img src="img/publicar/logo.png" class="logo"><span class="solomusica">SoloMúsica</span></li></a>

                <li><a href="C:\xampp\htdocs\login/login.html"><span class="quinto"><i class="icon icon-user"></i></span>Mi cuenta</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">

    <div class="stepwizard col-md-offset-3">
        <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
          </div>
        </div>
      </div>

      <form role="form" action="" method="post" class="form">
        <div class="row setup-content" id="step-1">
          <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
              <h3> Step 1</h3>
              <div class="form-group">
                <label class="control-label">First Name</label>
                <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
              </div>
              <div class="form-group">
                <label class="control-label">Last Name</label>
                <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
              </div>
              <div class="form-group">
                <label class="control-label">Address</label>
                <textarea required="required" class="form-control" placeholder="Enter your address" ></textarea>
              </div>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
          </div>
        </div>
        <div class="row setup-content" id="step-2">
          <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
              <h3> Step 2</h3>
              <div class="form-group">
                <label class="control-label">Company Name</label>
                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
              </div>
              <div class="form-group">
                <label class="control-label">Company Address</label>
                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
              </div>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
          </div>
        </div>
        <div class="row setup-content" id="step-3">
          <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
              <h3> Step 3</h3>
              <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </form>

    </div>

    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src='js/publicar.js'>  </script>
  </body>
</html>
