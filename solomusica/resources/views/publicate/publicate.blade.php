<!DOCTYPE html>
<html>
  <head>
		<link rel="shortcut icon" href="{{ asset('img/log.ico') }}" />
    <meta charset="utf-8">
    <title>Publicar</title>
  </head>
  @include('publicate.components.linkHeader')
  <body>
    {{-- @include('partials.nav_1') --}}



    <div class="container">

    <div class="row">
      <section>
          <div class="wizard">
            <!-- MENU DE PASOS-->
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab"> 1 </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">2
                            </span>
                        </a>
                    </li>


                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">3
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
              <!-- FIN MENU DE PASOS-->

              {!! Form::open(['route' => 'publicar.store', 'method' => 'POST', 'files' => true]) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="tab-content">

										@include('publicate.step1')


                      <div class="tab-pane" role="tabpanel" id="step2">
                          <div class="col-md-12">
                                <h3 class="">Paso 1: Descripción de tu aviso</h3><hr>
                          </div>
                      <div class="col-md-6">
                              <div class="form-group">

                                <label for="">Titulo:</label>
                                <input type="text" name="name" value="" class="form-control" required><br>
                                <label for="">Precio:</label><br>
                                <input type="number" name="price" value="" class="form-control"><br>
                                <label for="">Cantidad:</label><br>
                                <input type="number" name="quantity" value="" class="form-control"><br>
                                </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">

                                <label for="">Región:</label><br>
                                <select class="form-control" name="region" id="region">
                                  <option value="0" selected disabled>Seleccione la región</option>
                                      @foreach ($regions as $region)
                                      <option value="{{$region['id']}}">{{$region['name']}}</option>
                                      @endforeach



                                </select><br><label for="">Comuna:</label>
                                <select class="form-control" name="sector" id="sector">
                                  <option value="0" selected="true" disabled="true">Seleccione la comuna</option>
                                </select><br>
                                <label for="">Descripción</label><br>
                                <textarea name="description" rows="6" cols="80" class="form-control"></textarea>
                              </div>
                      </div>
                      <div class="col-md-12">
                      <button type="button" class="f-right btn btn-primary next-step">Continue</button>
                      <button onclick="location.reload()" type="button" class="f-right m-10 btn btn-danger">Cancel</button>
                      <br/><br/><br/><br/> </div>
                      </div>

                      <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="col-md-12">
                              <h3 class="">Paso 2: Elija 5 imagenes y un video</h3><hr>
                        </div>

                          <div class="col-md-12">
                                  <div class="form-group">

                                    <input id="file-es" name="images[]" type="file" multiple="true">
                                  </div>

                          </div>
                          <div class="col-md-12" id="columna-botones">
                              <button type="submit" class="f-right btn btn-primary next-step">Publica</button>
                             <button onclick="location.reload();" type="button" class="f-right m-10 btn btn-danger">Cancel</button>
                                     <br/><br/><br/><br/> </div>
                        </div>

                      <div class="clearfix"></div>
                  </div>
              {!! Form::close() !!}

          </div>


      </section>
     </div>
  </div>
  @include('publicate.components.linkFooter')

  <script type="text/javascript">

  $('#file-es').fileinput({
      language: 'es',
      uploadUrl: '#',
      showUpload:false,
      uploadAsync: false,
      maxFileCount:5,
      allowedFileExtensions: ['jpg', 'png'],
      fileActionSettings: {
      'showZoom': true,
      'indicatorNew': '&nbsp;',
      'showUpload':false

},


  });


  </script>


  </body>
</html>
