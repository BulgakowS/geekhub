<?php


class UploadFile
{
    public static function upload($request, $params = null)
    {
        
        if(!is_null($params) && is_array($params)) {
            $width = $params['width'];
            $height = $params['height'];
            
            $img = new sfImage($_FILES['file']['tmp_name'], $_FILES['file']['type']);
            
            if($width != $img->getWidth() || $height != $img->getHeight()) {
//                $result = array('error' => 'Your image size is incorrect.');
//                echo json_encode($request); die;
                
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Your image size is incorrect."}, "id" : "id"}');
            }
            
//            echo $img->getWidth();
//            echo $img->getHeight();
//            
//            echo '<pre>'; print_r($_FILES); exit;
        }
        
        $album = Doctrine_Core::getTable('Albums')->find($request->getParameter('id'));
        $code = $request->getParameter('code');
        $codeModel = Doctrine_Core::getTable('AccessCodes')->findOneByCode($code);
                                
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        $upload_code_path = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR. $code .DIRECTORY_SEPARATOR;
        
        $upload_full_path = $upload_code_path . 'albumID-'. $album->getId(); // .DIRECTORY_SEPARATOR;

        if(!is_dir($upload_code_path)) {
            mkdir($upload_code_path, 0777);           
        }        
        
        if(!is_dir($upload_full_path)) {
            mkdir($upload_full_path, 0777);           
        }
             
        // Settings
        //$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = $upload_full_path;
        
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        // 5 minutes execution time
        @set_time_limit(5 * 60);

        // Uncomment this one to fake upload time
        // usleep(5000);

        // Get parameters
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

        // Clean the fileName for security reasons
        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);
        
        //add thumb prefix
        $fileNameThumb = 'thumb_'.$fileName;
        $nonIpad3FileName = 'nonIpad3_' . $fileName;
        
        // Make sure the fileName is unique but only if chunking is disabled
        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
                $ext = strrpos($fileName, '.');
                $fileName_a = substr($fileName, 0, $ext);
                $fileName_b = substr($fileName, $ext);

                $count = 1;
                while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                        $count++;

                $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

        // Create target dir
        if (!file_exists($targetDir))
                @mkdir($targetDir);

        // Remove old temp files	
        if ($cleanupTargetDir && is_dir($targetDir) && ($dir = opendir($targetDir))) {
                while (($file = readdir($dir)) !== false) {
                        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                        // Remove temp file if it is older than the max age and is not the current file
                        if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                                @unlink($tmpfilePath);
                        }
                }

                closedir($dir);
        } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');


        // Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
                $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
                $contentType = $_SERVER["CONTENT_TYPE"];

        // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
                if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                        // Open temp file
                        $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                        if ($out) {
                                // Read binary input stream and append it to temp file
                                $in = fopen($_FILES['file']['tmp_name'], "rb");

                                if ($in) {
                                        while ($buff = fread($in, 4096))
                                                fwrite($out, $buff);
                                } else
                                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                                fclose($in);
                                fclose($out);
                                @unlink($_FILES['file']['tmp_name']);
                        } else
                                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
                } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
                // Open temp file
                $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                        // Read binary input stream and append it to temp file
                        $in = fopen("php://input", "rb");

                        if ($in) {
                                while ($buff = fread($in, 4096))
                                        fwrite($out, $buff);
                        } else
                                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                        fclose($in);
                        fclose($out);
                } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
                // Strip the temp .part suffix off 
                rename("{$filePath}.part", $filePath);
        }
        
        if ( isset($params['resize']) && $params['resize']===true ) {
            $path = $targetDir . DIRECTORY_SEPARATOR . $nonIpad3FileName;
            $img = new sfImage($filePath, $_FILES['file']['type']);
            if ($img->getWidth() > $img->getHeight()) { 
                $img->resize(1024,748); 
            } else {
                $img->resize(768, 1004);                 
            }
            $img->setQuality(100);
            $img->saveAs($path);
        }
        
        return $fileName;
    }
}
