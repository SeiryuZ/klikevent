{include file="header.tpl" title="Klikevent.com" jquery="true" tips=true edit=true}

<div class="section ">
    <h1> Add Event </h1>
    <div class="row">
    </div>
</div>

<div class="row add-min-height add-bottom text-center">
  <div class="row">

  	<div class="span6 offset3">

          <div class="alert alert-info">
            <a class="close" data-dismiss="alert">x</a>
            <h3 class="alert-heading">Perhatian!</h3>
            Input dengan tanda * harus diisi
          </div>

          <form class="form-horizontal" action="process-tips-event-owner.php" method="POST"  enctype="multipart/form-data" >
    <fieldset id="form-event-owner">
      <div id="legend" class="">
        <legend class="">Form tips ini untuk Pemilik Event yang ingin memberikan tips kepada KlikEvent</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label error" for="input01">Nama *</label>
          <div class="controls">
            <input type="text" placeholder="" name="nama" class="input-xlarge">
            
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Email *</label>
          <div class="controls">
            <input type="text" placeholder="" name="email" class="input-xlarge">
        
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Nama Event *</label>
          <div class="controls">
            <input type="text" placeholder="" name="eventTitle" class="input-xlarge">
            <p class="help-block">Maksimal 50 Karakter</p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Lokasi / Alamat Event *</label>
          <div class="controls">
            <input type="text" placeholder="" name="location1" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" placeholder="" name="location2" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label">Kategori *</label>     
          <div class="controls">
            <select class="input-xlarge" name="category[]">
      <option>Paid</option>
      <option>Free</option>
    </select>
      
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge" name="category[]">
      <option>Day</option>
      <option>Night</option>
      <option>All Day</option>
</select>
          </div>

        </div><div class="control-group">     

          <!-- Select Basic -->
          <label class="control-label"></label>     
          <div class="controls">
            <select class="input-xlarge" name="category[]">
      <option>Art and Hobby</option>
      <option>Exhibition</option>
      <option>Education</option>
      <option>Others</option>
    </select>
          </div>

        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Tanggal *</label>
          <div class="controls">
            <input type="text" placeholder="" name="date1" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Deskripsi Pendek (Max 300 kata) *</label>


          <div class="controls">
            <textarea class="input-xlarge" id="eventShortDescription" name="eventShortDescription" rows="10"></textarea>
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Deskripsi Event *</label>


          <div class="controls">
            <textarea class="input-xlarge" id="eventDescription" name="eventDescription" rows="10"></textarea>
          </div>
        </div>
        <div class="control-group">    
          <label class="control-label">Foto / Poster </label>

          <!-- File Upload --> 
          <div class="controls">
            <input class="input-file" id="fileInput"  name="imgfile[]" type="file">
          </div>
        </div>
        <div class="add-bottom">
            <a onClick="javascript:addPhotoForm();">tambah foto</a>
        </div>
        
      </fieldset>
        <button class="btn-large btn-primary">Submit</button>
        
  </form>

        </div>
    </div>
</div>

<script type="text/javascript">
	CKEDITOR.replace( 'eventDescription' );
	CKEDITOR.replace( 'eventShortDescription' );
</script>

<hr/>
{include file="footer.tpl"}