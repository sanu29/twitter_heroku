<div class="conatainer maincontainer">
    
     <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12"> 

        
      <?php if ($_GET['userid']) { ?>
      <h2 class="heading">PUBLIC PROFILE</h2>
      
      <?php displayTweets($_GET['userid']); ?>
      
      <?php } else { ?> 
        
        <h2 class="heading">Active Users</h2>
        
        <?php displayprofiles(); ?>
      
      <?php } ?>
        
        
        
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12  col-xs-12"> 
  
    
    <?php displaysearch();?>
    <?php posttweet();?>
        
    </div>
  </div>
    
</div>