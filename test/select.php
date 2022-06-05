<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="color">Background Color:</label>
        <select name="color" id="color">
            <option value="">--- Choose a color ---</option>
            <option value="red">Red</option>
            <option value="green" selected>Green</option>
            <option value="blue">Blue</option>
        </select>

        <?php

$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);

?>

<?php if ($color) : ?>
    <p>You selected <span style="color:<?php echo $color ?>"><?php echo $color ?></span></p>
    <p><a href="index.php">Back to the form</a></p>
<?php else : ?>
    <p>You did not select any color</p>
<?php endif ?>
    </div>
    <div>
        <button type="submit">Select</button>
    </div>
</form>