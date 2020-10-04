{include 'header.tpl'}

<main class="container">
    
    <div class='mt-5 mx-auto w-25'>
        
        <form method="POST" action="verifyUser">
            
            <div class="form-group">
                <label for="Email1">Email</label>
                <input name='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            
            <div class="form-group">
                <label for="Password">Password</label>
                <input name='password' type="password" class="form-control" id="Password" required>
            </div>
            <div class='text-center my-5'>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    
    </div>

    {include 'footer.tpl'}

</main> 

</body>
</html>