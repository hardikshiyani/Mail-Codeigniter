<html>

<head>
    <title>Send Email</title>
</head>

<body>

    <center>
        <form method="POST" action="<?php echo base_url('/Mail/send_mail'); ?>">
            <table border="3">
                <tr>
                    <td>Enter Mail:-&nbsp<input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td>Password:-&nbsp<input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td>
                        <center><input type="submit" value="sendmail"></center>
                    </td>
                </tr>
    </center>
    </table>
    </form>
</body>

</html>