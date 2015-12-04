<!DOCTYPE html>
<html>
 <head>         
  <link href="../css/daftar.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <!-- jQuery easing plugin -->
        <script src="../js/jquery.easing.min.js" type="text/javascript"></script>     
    </head>
    <body>
      
        <!-- multistep form -->
        <form id="msform" action="proses_daftar.php" method="post">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Pengaturan Akun</li>
                <li>Kontak</li>
                <li>Biodata</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Buat Akun</h2>
                <h3 class="fs-subtitle"></h3>
                <input type="email" name="email" placeholder="Email" />
                <input type="text" name="username" placeholder="Nama Pengguna" />
                <input type="password" name="password" placeholder="Kata Sandi" />
                <input type="button" name="next" class="next action-button" value="Lanjut" />
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Kontak</h2>
                <h3 class="fs-subtitle"></h3>
                <input type="text" name="twitter" placeholder="Twitter" />
                <input type="text" name="facebook" placeholder="Facebook" />
                 <input type="text" name="phone" placeholder="Hp/Telepon" />
                <input type="button" name="previous" class="previous action-button" value="Kembali" />
                <input type="button" name="next" class="next action-button" value="Lanjut" />
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Biodata</h2>
                <h3 class="fs-subtitle"></h3>
                <input type="text" name="fname" placeholder="Nama Depan" />
                <input type="text" name="lname" placeholder="Nama Belakang" />
                <textarea name="address" placeholder="Alamat"></textarea>
                <input type="button" name="previous" class="previous action-button" value="Kembali" />
                <input type="submit" name="submit" class="submit action-button" value="Daftar" />
            </fieldset>
        </form>
         
        <script type="text/javascript">
   //jQuery time
   var current_fs, next_fs, previous_fs; //fieldsets
   var left, opacity, scale; //fieldset properties which we will animate
   var animating; //flag to prevent quick multi-click glitches
    
   $(".next").click(function(){
    if(animating) return false;
    animating = true;
     
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
     
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
     
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
     step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
     },
     duration: 800,
     complete: function(){
      current_fs.hide();
      animating = false;
     },
     //this comes from the custom easing plugin
     easing: 'easeInOutBack'
    });
   });
    
   $(".previous").click(function(){
    if(animating) return false;
    animating = true;
     
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
     
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
     
    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
     step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
     },
     duration: 800,
     complete: function(){
      current_fs.hide();
      animating = false;
     },
     //this comes from the custom easing plugin
     easing: 'easeInOutBack'
    });
   });
    
   $(".submit").click(function(){
    return true;
   })
    
  </script>
    </body>
</html>
