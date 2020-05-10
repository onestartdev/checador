
<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>dist/floating-labels.css" rel="stylesheet">
<body>
    <form class="form-signin"  action="<?php echo base_url(); ?>ingreso" method="post" >
        <div class="text-center mb-4">
            <img class="mb-" src="https://cdn3.iconfinder.com/data/icons/social-media-2169/24/social_media_social_media_logo_codeigniter-512.png" alt="" width="250" height="250">
            <h1 class="h3 mb-3 font-weight-normal">CHECADOR</h1>
           <!-- <p>...</p> -->
        </div>
        <div class="form-label-group">
            <input type="text"  name="user" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
            <label for="inputEmail">Usuario</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
         <label for="inputPassword">Password</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
    </form>
</body>













