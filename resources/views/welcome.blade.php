<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Resize</title>
</head>
<body>
    <form action="{{ route('resize') }}">
        Image 1:
        <input type="text" name="width1">
        <input type="text" name="height1"><br>

        Image 2: 
        <input type="text" name="width2">
        <input type="text" name="height2"><br>
        
        Type: <select name="fittype"><br>
            <option>contain</option>
            <option>cover</option>
        </select><br>
        <button>Submit</button>
    </form>
</body>
</html>