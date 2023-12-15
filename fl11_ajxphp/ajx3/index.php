<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Form Example</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<form id="ajaxForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="button" onclick="submitForm()">Submit</button>
    <button type="button" onclick="displayentries()">Display</button>
</form>

<div id="response"></div>

<h2>Guestbook Entries</h2>
<ul id="guest_Entries"></ul>

<script>
    function submitForm() {
        var formData = $('#ajaxForm').serialize();

        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: formData,
            success: function(response) {
                $('#response').html(response);
                fetchEntries();
            }
        });
    }

    function fetchEntries() {
        $.ajax({
            type: 'GET',
            url: 'getentries.php',
            success: function(entries) {
                displayentries(JSON.parse(entries)); // Parse JSON here
            }
        });
    }

    function displayentries(entries) {
        var guest_Entries = $("#guest_Entries");
        guest_Entries.empty();

        entries.forEach(function(entry) {
            var listItem = `<tr style="border-bottom: 1px solid #ccc;">
                        <td><strong>${entry.name}</strong></td>
                        <td>(${entry.email})</td>
                        <td>
                            <button type="button" onclick="deleteEntry(${entry.id})">Delete</button>
                        </td>
                    </tr>`;
            guest_Entries.append(listItem);
        });
    }

    function deleteEntry(id) {
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: { id: id },
            success: function(response) {
                $('#response').html(response);
                fetchEntries();
            }
        });
    }

    $(document).ready(function() {
        fetchEntries();
    });

</script>

</body>
</html>
