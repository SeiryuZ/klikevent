{include file="header.tpl" title="Klikevent.com" jquery="true" tips=true }

<div class="row">
<div class="span6 offset3">

<div class="alert alert-info">
    <a class="close" data-dismiss="alert">x</a>
    <h3 class="alert-heading">Perhatian!</h3>
    Semua input harus di isi untuk dapat di proses
</div>
  <form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">Enter Your Tips!</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label error" for="input01">Nama</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
     
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Email</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
        
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Nama Event</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block">Maksimal 50 Karakter</p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Lokasi / Alamat</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label">Kategori</label>     
          <div class="controls">
            <select class="input-xlarge">
      <option>Enter</option>
      <option>Your</option>
      <option>Options</option>
      <option>Here!</option></select>
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge">
      <option>Enter</option>
      <option>Your</option>
      <option>Options</option>
      <option>Here!</option></select>
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge">
      <option>Enter</option>
      <option>Your</option>
      <option>Options</option>
      <option>Here!</option></select>
          </div>

        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Tanggal</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">    
          <label class="control-label">Foto / Poster</label>

          <!-- File Upload --> 
          <div class="controls">
            <input class="input-file" id="fileInput" type="file">
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Deskripsi Event</label>


          <div class="controls">
            <textarea class="input-xlarge" rows="10"></textarea>
          </div>
        </div>

      </fieldset>
        <button class="btn-large btn-primary">Submit</button>
        
  </form>
</div>
</div>
<div class="clear-float"></dov>
<hr/>
{include file="footer.tpl"}
