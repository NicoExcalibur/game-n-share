<div class="main wrapper">
    <div class="profile-header">
        <div class="profile-header-avatar">
        <?php
            $userid = wp_get_current_user(); 
            $user = new WP_User( $userid );
            var_dump($user);?>
            <div>
                <?php echo get_avatar( $userid, 200); ?>
            </div>
        </div>
        <div class="profile-header-infos">
            <p>Profil de <?php echo $user->display_name; ?></p>
            <ul>
                <li>Rôle : <?php echo $user->roles['0']; ?></li>
                <li>Nom du compte : <?php echo $user->user_nicename; ?></li>
                <li>Adresse e-mail : <?php echo $user->user_email; ?></li>
            </ul>
        </div>
    </div>
    
    <!-- tabs
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
    </div> -->
</div>