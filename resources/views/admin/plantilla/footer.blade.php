@if (Auth::check())
<p>&nbsp</p>
<footer>
      <div class="p-3 mb-3 bg-footer text-white">
        <div class="row text-center">
          <div class="col-sm-4">
            <img src="{{asset('recursos/images/ubi.svg')}}" width="70" height="70" alt="">
            <p>&nbsp</p>
             <h6>Tuluá, Valle del Cauca,<br>
              Calle 50 No. 42-161 <br>Bodega 22 Parque Industrial</h6>
            <hr class="atr">
          </div>
          <div class="col-sm-4">
             <img src="{{asset('recursos/images/email.svg')}}" width="70" height="70" alt="">
             <p>&nbsp</p>
             <h6>info&#64;emcomunitel.com</h6>
             <hr class="atr">
          </div>
          <div class="col-sm-4">
            <img src="{{asset('recursos/images/tele.svg')}}" width="70" height="70" alt="">
            <p>&nbsp</p>
            <h6>+57 2 2249181</h6> 
            <hr class="atr">

          </div>
        </div>
      </div>
    </footer>
@endif    