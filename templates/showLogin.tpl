{include 'header.tpl'}

<main class="container">
    
    <div class='mt-5 mx-auto w-100'>
        
        <form method="POST" action="verifyUser">
            
            <div class="form-group col-12 col-md-4 mx-auto">
                <label for="Email1">Email</label>
                <input name='email' type="email" class="form-control text-center" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            
            <div class="form-group col-12 col-md-4 mx-auto mb-5">
                <label for="Password">Password</label>
                <input name='password' type="password" class="form-control text-center" id="Password" required>                
            </div>            
            <div class='text-center my-5'>
                <button type="submit" class="btn btn-primary my-5">Ingresar</button>
            </div>
        </form>
    
    </div>

    {include 'footer.tpl'}
 
</body>
</html>