<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="/public/style.css"></link>
</head>
<body>
    <form id="multiform">
        <div id="step act" class="step1">
            <h3>Choose Education Level:</h3>
            <Label>Level:</Label>
            <select name="level" id="level">
                <option value="">--SELECT--</option>
                <option value="elementary">Elementary</option>
                <option value="highschool">High School</option>
                <option value="seniorhigh">Senior High</option>
                <option value="college">College</option>
            </select>
            <div id="fieldsContainer">

            </div>
        </div>
        
        <div>
            <button id="MprevBtn">Previous</button>
            <button id="MnextBtn">Next</button>
            <button type="submit" id="MsubmitBtn">Submit</button>
        </div>
    </form>
</body>
</html>