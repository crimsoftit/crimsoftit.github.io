<style type="text/css">
    #msg
    {
        width: 80%;
        margin: 0 auto;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }
    #msg i
    {
        font-size: 16px;
    }
</style>





<!-- Modal HTML -->
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body" style="text-align:center;">

                        <div id="msg">
                        </div>

                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Email or Phone No." /><br />
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password"/><br />
                        <div style="width:80%; margin:0 auto; text-align:right;">
                            <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>




       