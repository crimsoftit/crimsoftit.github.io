<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Modal</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div align="center">
        <button type="button" name="login" id="login" class="btn btn-success" data-toggle="modal" data-target="#loginModal">
            Login
        </button>
    
    
        <!-- Modal HTML -->
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" /><br />
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" /><br />
                        <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#login_button').click(function() {
            // body...
        });
    });
</script>

</body>
</html>                            