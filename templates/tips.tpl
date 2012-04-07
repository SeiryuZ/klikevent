{include file="header.tpl" title="Klikevent.com" jquery="true" tips=true }

<div class="section ">
    <h1> Tips </h1>
    <div class="row">
    </div>
</div>

<div class="row text-center">
    <div class="span12 ">
        <div class="tabbable ">
            <ul class="nav nav-tabs">
                <li class="active other "><a href="#umum" data-toggle="tab">Umum</a></li>
                <li class=" "><a href="#pemilik-event" data-toggle="tab">Pemilik Event</a></li>
                <li class="other "><a href="#feedback" data-toggle="tab">Feedback</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row add-min-height add-bottom text-center">
  <div class="row">
    <div class="tab-content">

      <!-- TAB FOR umum -->
      <div class="tab-pane active" id="umum">
        <div class="span6 offset3">
          <div class="alert alert-info">
            <a class="close" data-dismiss="alert">x</a>
            <h3 class="alert-heading">Perhatian!</h3>
            Input dengan tanda * harus diisi
          </div>
          <form class="form-horizontal" action="process-tips-anon.php" method="POST">
            <fieldset>
              <div id="legend" class="">
                <legend class="">Form tips ini untuk Siapapun yang ingin memberikan tips ke KlikEvent</legend>
              </div>
              <div class="control-group">
                <label class="control-label error"  for="input01">Nama</label>
                <div class="controls">
                  <input type="text" name="nama" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label error"  for="input01">Email</label>
                <div class="controls">
                  <input type="text" name="email" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">    
                <label class="control-label">Tips *</label>
                <div class="controls">
                  <textarea class="input-xlarge" name="content" rows="10"></textarea>
                </div>
              </div>
            </fieldset> 
            <button class="btn-large btn-primary" >Submit</button>
          </form>
        </div>
      </div>

      <!-- TAB FOR umum -->
      <div class="tab-pane" id="pemilik-event">
        <div class="span6 offset3">

          <div class="alert alert-info">
            <a class="close" data-dismiss="alert">x</a>
            <h3 class="alert-heading">Perhatian!</h3>
            Input dengan tanda * harus diisi
          </div>

          <form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">Form tips ini untuk Pemilik Event yang ingin memberikan tips kepada KlikEvent</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label error" for="input01">Nama *</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Email *</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
        
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Nama Event *</label>
          <div class="controls">
            <input type="text" placeholder="" class="input-xlarge">
            <p class="help-block">Maksimal 50 Karakter</p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Lokasi / Alamat *</label>
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
          <label class="control-label">Kategori *</label>     
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
          <label class="control-label" for="input01">Tanggal *</label>
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
          <label class="control-label">Deskripsi Event *</label>


          <div class="controls">
            <textarea class="input-xlarge" rows="10"></textarea>
          </div>
        </div>

      </fieldset>
        <button class="btn-large btn-primary">Submit</button>
        
  </form>

        </div>
      </div>

      <!-- TAB FOR umum -->
      <div class="tab-pane" id="feedback">
        <div class="span6 offset3">
          <div class="alert alert-info">
            <a class="close" data-dismiss="alert">x</a>
            <h3 class="alert-heading">Perhatian!</h3>
            Input dengan tanda * harus diisi
          </div>
          <form class="form-horizontal" action="" method="POST">
            <fieldset>
              <div id="legend" class="">
                <legend class="">Form ini untuk Siapapun yang ingin memberikan feedback ke KlikEvent</legend>
              </div>
              <div class="control-group">
                <label class="control-label error" for="input01">Nama</label>
                <div class="controls">
                  <input type="text" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label error" for="input01">Email</label>
                <div class="controls">
                  <input type="text" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">    
                <label class="control-label">Feedback *</label>
                <div class="controls">
                  <textarea class="input-xlarge" rows="10"></textarea>
                </div>
              </div>
            </fieldset> 

          </form>
        </div>
      </div>

    </div>
  </div> 
</div>


<div class="clear-float"></div>
<hr/>
{include file="footer.tpl"}
