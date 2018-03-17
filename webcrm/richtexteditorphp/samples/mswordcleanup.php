<?php require_once "../richtexteditor/include_rte.php" ?>
<?php
    $rte=new RichTextEditor();
	$rte->ContentCss="example.css";
    $rte->MvcInit();
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>RichTextEditor - Ms word clean up</title>
    <link rel="stylesheet" href="../example.css" type="text/css" />
    
	<script type="text/javascript">
		function RichTextEditor_OnPasteFilter(editor, evt) {
			var html = evt.Arguments[0];
			var cmd = evt.Arguments[1];
			//filter html here
			evt.ReturnValue = "<div style='color:blue;'>[-- RichTextEditor has filtered your pasted code --]</div><div style='color:blue;'>{</div>" + html + "<div style='color:blue;'>}</div>";
		}
	</script>
</head>
<body>
        
        <?php
            echo $rte->GetString();
        ?>
</body>
</html>