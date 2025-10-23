<div>
    <label for="grade_level">What year level:</label>
    <select name="grade_level" id="grade_level">
        <option value="">--SELECT--</option>
        <option value="1">Grade 1</option>
        <option value="1">Grade 2</option>
        <option value="1">Grade 3</option>
        <option value="1">Grade 4</option>
        <option value="1">Grade 5</option>
        <option value="1">Grade 6</option>
    </select>

    <label for="prev_school">Previous School (If transferee):</label>
    <input type="text" name="prev_school" id="prev_school">

    <label for="guardian">Parents/Guardians name:</label>
    <label for="mother">Mother's name:<input type="text" name="mother" id="mother"></label>
    <label for="father">Father's name:<input type="text" name="father" id="father"></label>

    <label for="cnumber">Contact Number:</label>
    <input type="text" name="cnumber" id="cnumber">
</div>

<div class="step" id="step2">
    <? include 'documents.php' ?>
</div>