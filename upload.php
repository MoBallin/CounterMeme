<?php
  session_start();

  $currentUser = preg_replace('#[^a-z0-9]#i', '', strtolower($_SESSION['username']));

  // Upload submitted files
  if(isset($_FILES['files'])) {
    $names = $_FILES['files']['name'];
    $tmpNames = $_FILES['files']['tmp_name'];
    for($i = 0; $i < count($tmpNames); $i++) {
      $newname = preg_replace("/[\s]/", "_", $names[$i]);
      $newname = preg_replace('#[^a-z0-9_\!\$\-\,\.]#i', '', $newname);
      $counter = 1;
      if(file_exists('/path/to/storage/' . $currentUser . '/' . $newname)) {
        $path_parts = pathinfo($newname);
        while(file_exists('/path/to/storage/' . $currentUser . '/' . $path_parts['filename'] . '_' . $counter . '.' . $path_parts['extension'])) {
          $counter++;
        }
        $newname = $path_parts['filename'] . '_' . $counter . '.' . $path_parts['extension'];
      }
      if(move_uploaded_file($tmpNames[$i], '/path/to/storage/' . $currentUser . '/' . $newname)) {
        $_SESSION['confirmation'] = 'The files have been uploaded.';
      } else {
        $_SESSION['error'] = 'Sorry, there was an error uploading your file.';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Counter Meme</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
      // Loading bars
      function uploadFile() {
        document.getElementById('uploadField').classList.toggle('hide');
        document.getElementById('uploadHeader').innerHTML = 'Uploading Files, Please Wait<div style="font-size:18px;font-style:italic">refreshing the page will cancel remaining uploads</div>';
        var allfiles = document.getElementById('file');
        var length = allfiles.files.length;
        for(var i = 0; i < length; i++) {
          var formData = new FormData();
          var file = allfiles.files[i];
          formData.append('file', file);
          var ajax = new XMLHttpRequest();
          (function(elId) {
            document.getElementById('loadingbars').innerHTML += '<div class="fileLoading">' + allfiles.files[i].name + '</div><div class="pbc"><div class="pb stripes animate" id="file_' + elId + '_progress"></div></div>';
            ajax.upload.addEventListener('progress', function (event) {
              confirmLeave();
              var percent = Math.round((event.loaded / event.total) * 100) + '%';
              document.getElementById('file_' + elId + '_progress').style.width = percent;
              document.getElementById('file_' + elId + '_progress').innerHTML = '&nbsp' + percent;
            }, false);
            ajax.addEventListener('load', function (event) {
              document.getElementById('file_' + elId + '_progress').className = 'complete';
            }, false);
          })(i);
          ajax.open('POST', 'upload.php');
          ajax.send(formData);
        }
      };

      // Alert message if uploads are still in progress
      function confirmLeave() {
        window.onbeforeunload = function() {
          var msg = confirm("There are unfinished uploads, are you sure you want to leave?");
          if(msg == true) {
            return true;
          } else {
            return false;
          }
        };
      };
    </script>
  </head>
  <body>
    <?php
      if(isset($_SESSION['confirmation'])) {
        echo '<div id="confirm_msg">' . $_SESSION['confirmation'] . '</div>';
        unset($_SESSION['confirmation']);
      }
      if(isset($_SESSION['error'])) {
        echo '<div id="error_msg">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
      }
    ?>

    <form id="uploadForm" class="content" method="post" enctype="multipart/form-data" style="top:0px">
      <div id="uploadHeader"class="sectionTitle">
        Upload Files
      </div>
      <div id="uploadField">
        <input type="file" name="files[]" id="file" class="uploadBox" multiple><br>
        <div style="margin-top:6px;font-size:18px;">
          <i>or drag and drop files into the upload box!</i><br>
        </div>
        <button class="button" type="submit" name="upload" value="Upload File" onclick="uploadFile()" style="margin-top:30px;width:120px">Upload</button>
      </div>
      <div id="loadingbars"></div>
    </form>
  </body>
</html>
