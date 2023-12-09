<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #drop_zone {
  border: 5px solid blue;
  width: 200px;
  height: 100px;
}
    </style>
</head>
<body>

<div id="drop_zone" ondrop="dropHandler(event);">
  <p>Drag one or more files to this <i>drop zone</i>.</p>
</div>
<div
  id="drop_zone"
  ondrop="dropHandler(event);"
  ondragover="dragOverHandler(event);">
  <p>Drag one or more files to this <i>drop zone</i>.</p>
</div>



<script>
    function dropHandler(ev) {
  console.log("File(s) dropped");

  // Prevent default behavior (Prevent file from being opened)
  ev.preventDefault();

  if (ev.dataTransfer.items) {
    // Use DataTransferItemList interface to access the file(s)
    [...ev.dataTransfer.items].forEach((item, i) => {
      // If dropped items aren't files, reject them
      if (item.kind === "file") {
        const file = item.getAsFile();
        console.log(`… file[${i}].name = ${file.name}`);
      }
    });
  } else {
    // Use DataTransfer interface to access the file(s)
    [...ev.dataTransfer.files].forEach((file, i) => {
      console.log(`… file[${i}].name = ${file.name}`);
    });
  }
}


</script>
</body>
</html>