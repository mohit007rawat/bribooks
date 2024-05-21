<!DOCTYPE html>
<html>
<head>
    <title>Generate KDP PDF</title>
    <script>
        function openPDF() {
            var form = document.getElementById('pdfForm');
            form.target = '_blank'; // Open in a new window
            form.submit();
        }
    </script>
</head>
<body>
    <form id="pdfForm" action="generate_pdf.php" method="post">
        <label for="book_name">Book Name:</label>
        <input type="text" id="book_name" name="book_name" required><br><br>
        <label for="written_by">Written By:</label>
        <input type="text" id="written_by" name="written_by" required><br><br>
        
        <label for="title">Title Page 1:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content Page 1:</label>
        <textarea id="content" name="content" rows="10" cols="30" required></textarea><br><br>
        
        <button type="button" onclick="openPDF()">Generate PDF</button>
    </form>
</body>
</html>
