<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open New Page</title>
	<style>
	.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.close-button {
    margin-top: 10px;
}

	</style>
</head>
<body>
    <div id="overlay" class="overlay">
        <div class="popup">
            <!-- Your data content goes here -->
            <p>This is the data you want to display.</p>
            <button id="closeButton" class="close-button">Close</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
