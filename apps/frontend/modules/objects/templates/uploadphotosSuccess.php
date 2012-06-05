<?php use_javascript('http://bp.yahooapis.com/2.4.21/browserplus-min.js') ?> 
<?php use_javascript('plupload/js/plupload.js') ?> 
<?php use_javascript('plupload/js/plupload.gears.js') ?> 
<?php use_javascript('plupload/js/plupload.silverlight.js') ?> 
<?php use_javascript('plupload/js/plupload.flash.js') ?> 
<?php use_javascript('plupload/js/plupload.browserplus.js') ?> 
<?php use_javascript('plupload/js/plupload.html4.js') ?> 
<?php use_javascript('plupload/js/plupload.html5.js') ?> 


<div id="brand_logo" class="app_icon_box">
    <?php if(!is_null($photos)): ?>
        Загружено <?php echo count($photos) ?> фото
<!--        <img src="/photos/<?php echo $sf_request->getParameter('id') ?>/<?php // echo $file ?>" alt="" />-->
    <?php endif; ?>
</div>

<div id="container">
    <div id="filelist">No runtime found.</div>
    <br />
    <button id="pickfiles" class="btn btn-primary">Выбрать фото</button>
    <button id="uploadfiles" class="btn btn-success">Загрузить</button>
</div>    

<br />


<script type="text/javascript">

var uploader = new plupload.Uploader({
	runtimes : 'gears,html5,flash,silverlight,browserplus',
	browse_button : 'pickfiles',
	container: 'container',
	max_file_size : '10mb',
	url : '<?php echo url_for('@photo_upload?id=' . $sf_request->getParameter('id')) ?>',
	resize : false, //{width : 300, height : 75, quality : 100},
	flash_swf_url : '/js/plupload/js/plupload.flash.swf',
	silverlight_xap_url : '/js/plupload/js/plupload.silverlight.xap',
	filters : [
		{title : "Image files", extensions : "jpg,gif,png,jpeg"}
	]
});

uploader.bind('Init', function(up, params) {
        if(plu('continue')) {
            plu('continue').style.display = 'none';
        }
	plu('filelist').innerHTML = "";
});

uploader.bind('FilesAdded', function(up, files) {
        var files_count = files.length;
        if(files_count == 1) {
            for (var i in files) {
                    plu('filelist').innerHTML += '<div id="' + files[i].id + '">' + files[i].name + ' (' + plupload.formatSize(files[i].size) + ') <b></b></div>';
            }
            
            plu('uploadfiles').style.display = 'inline-block';
            
        } else {
            alert('Sorry but you can upload maximum 1 files');
        }
});

uploader.bind('UploadProgress', function(up, file) {
	plu(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});

plu('uploadfiles').onclick = function() {
	uploader.start();
	return false;
};

uploader.bind('FileUploaded', function(up, file, info) {
        $('#' + file.id).fadeOut(300, function(){
            $(this).remove();
        });
        
        if(JSON.parse(info.response)) {
        
            var r = JSON.parse(info.response);
        
            if(r.error.code != 333) {
                alert(r.error.message);
            } else {
                
                $('#brand_logo').html('<div class="loader"></div>');
                
                var src= '/photos/<?php echo $sf_request->getParameter('id') ?>/' + r.filename;
                
                $('<img />').attr({ src: src, alt: ''}).load(function(){
                    $('#brand_logo').html($(this));  
                });                
                
                
                if(plu('continue')) {
                    plu('continue').style.display = 'inline-block';
                }
            }
            
            
            uploader.refresh();
            
        } 

});

uploader.init();
</script>

