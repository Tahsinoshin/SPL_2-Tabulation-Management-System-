<?php
session_start();
if(isset($_POST['export_excel_btn'])){
    if(isset($_POST['filename'])){
        $con = mysqli_connect('localhost','root','','test_database');
        $FileName=$_POST['filename'];

        echo $FileName;
        
        
        //$sql ="SELECT filepath FROM filedetails WHERE filename=$FileName";
        

        $query ="SELECT filepath FROM filedetails WHERE filename='$FileName'";
        $result = mysqli_query($con, $query);
        //echo $result;

       // $Filepaths = mysqli_query($con, $sql);
            
        $data = mysqli_fetch_assoc($result); 
        $FilePaths= $data['filepath'];
        
        //$filepath = 'files/' . $file['filename'];
        
        //Use Mysql Query to find the 'full path' of file using $FileNo.
        // I Assume $FilePaths as 'Full File Path'.


        function download_file( $fullPath )
        {
          if( headers_sent() )
            die('Headers Sent');
        
        
          if(ini_get('zlib.output_compression'))
            ini_set('zlib.output_compression', 'Off');
        
        
          if( file_exists($fullPath) )
          {
        
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
        
            switch ($ext) 
            {
            
        
              case "csv":
              case "xls":
              case "xls": $ctype="application/vnd.ms-excel"; break;
            
              default: $ctype="application/force-download";
            }
        
            header("Pragma: public"); 
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private",false); 
            header("Content-Type: $ctype");
            header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: ".$fsize);
            ob_clean();
            flush();
            $getFileContent=readfile( $fullPath );
            //echo $getFileContent;
        
          } 
          else
            die('File Not Found');
        
        }
        
        
        
        download_file($FilePaths);
        
        

    }
   

}

?>