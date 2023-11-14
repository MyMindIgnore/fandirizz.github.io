<?php
require('../include/db.php');
if(isset($_POST['update-section'])){
    $home = $_POST['home'] ?? 0;
    $about = $_POST['about'] ?? 0;
    $portfolio = $_POST['portfolio'] ?? 0;
    $contact = $_POST['contact'] ?? 0;

    $query = "UPDATE section_control SET ";
    $query.= "home_section='$home',";
    $query.= "about_section='$about',";
    $query.= "portfolio_section='$portfolio',";
    $query.= "contact_section='$contact' WHERE id=1";

    $run = mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php';</script>";
    }




}


if(isset($_POST['update-home'])){
    // print_r($_POST);
    $title = mysqli_real_escape_string($db,$_POST['title']);
    $subtitle = mysqli_real_escape_string($db,$_POST['subtitle']);
    $showicons = $_POST['showicons'] ?? 1;


    $query = "UPDATE home SET ";
    $query.="title='$title',";
    $query.="subtitle='$subtitle',";
    $query.="showicons='$showicons' WHERE id=1";

    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?homesetting=true';</script>";
    }

}


if(isset($_POST['update-about'])){
    // print_r($_POST);
    // var_dump($_FILES);
    
    $title = mysqli_real_escape_string($db,$_POST['abouttitle']);
    $subtitle = mysqli_real_escape_string($db,$_POST['aboutsubtitle']);
    $desc = mysqli_real_escape_string($db,$_POST['aboutdesc']);
    $imagename = $_FILES['profile']['name'];
    $imgtemp = $_FILES['profile']['tmp_name'];

    if($imgtemp==''){
        $q = "SELECT * FROM about WHERE 1";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $imagename = $d['profile_pic'];
    }


    move_uploaded_file($imgtemp,"../image/$imagename");

    $query = "UPDATE about SET ";
    $query.="about_title='$title',";
    $query.="about_subtitle='$subtitle',";
    $query.="profile_pic='$imagename',";

    // echo $query;

    $query.="about_desc='$desc' WHERE id=1";
    
    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?aboutsetting=true';</script>";
    }    


    
}

if(isset($_POST['add-skill'])){

    $skillname = $_POST['skillname'];
    $skilllevel = $_POST['skilllevel'];


    $query = "INSERT INTO skills (skill_name,skill_level) VALUES('$skillname','$skilllevel')";
    
    
    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?aboutsetting=true';</script>";
    }    
    
}

if(isset($_POST['add-pi'])){

    $label = $_POST['label'];
    $value = $_POST['value'];


    $query = "INSERT INTO personal_info (label,value) VALUES('$label','$value')";
    
    
    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?aboutsetting=true';</script>";
    }    
    
}

if(isset($_POST['add-project'])){
    
    $type = $_POST['type'];
    $project_name = $_POST['project_name'];
    $project_link = $_POST['project_link'];
    $project_image = time().$_FILES['project_pic']['name'];

    move_uploaded_file($_FILES['project_pic']['tmp_name'],"../images/$project_image");

    $query = "INSERT INTO portfolio (project_type,project_pic,project_name,project_link) VALUES ('$type','$project_image','$project_name','$project_link')";
    
    
    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?portfoliosetting=true';</script>";
    }    
    
}

if(isset($_POST['update-contact'])){
    // print_r($_POST);
    $address = mysqli_real_escape_string($db,$_POST['address']);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];


    $query = "UPDATE contact SET ";
    $query.="address='$address',";
    $query.="email='$email  ',";
    $query.="mobile='$mobile' WHERE id=1";

    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?contactsetting=true';</script>";
    }

}

if(isset($_POST['update-socialmedia'])){
    // print_r($_POST);
    
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    


    $query = "UPDATE social_media SET ";
    $query.="twitter='$twitter',";
    $query.="facebook='$facebook',";
    $query.="instagram='$instagram' WHERE id=1";

    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?contactsetting=true';</script>";
    }

}

if(isset($_POST['update-background'])){
    
    $imagename = time().$_FILES['background']['name'];
    $imgtemp = $_FILES['background']['tmp_name'];

    move_uploaded_file($imgtemp,"../images/$imagename");

    $query = "UPDATE site_background SET ";
    $query.="background_img='$imagename' WHERE id=1";
    
    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?changebackground=true';</script>";
    }    

}

if(isset($_POST['update-seo'])){
    // print_r($_POST);
    // var_dump($_FILES);
    
    $title = mysqli_real_escape_string($db,$_POST['page_title']);
    $keywords = mysqli_real_escape_string($db,$_POST['keywords']);
    $description = mysqli_real_escape_string($db,$_POST['description']);
    $imagename = time().$_FILES['siteicon']['name'];
    $imgtemp = $_FILES['siteicon']['tmp_name'];

    if($imgtemp==''){
        $q = "SELECT * FROM seo WHERE 1";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $imagename = $d['siteicon'];
    }


    move_uploaded_file($imgtemp,"../image/$imagename");

    $query = "UPDATE seo SET ";
    $query.="page_title='$title',";
    $query.="keywords='$keywords',";
    $query.="description='$description',";

    // echo $query;

    $query.="siteicon='$imagename' WHERE id=1";
    
    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?seosetting=true';</script>";
    }    


    
}

if(isset($_POST['update-account'])){
    // print_r($_POST);
    // var_dump($_FILES);
    
    $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $imagename = time().$_FILES['profilepic']['name'];
    $imgtemp = $_FILES['profilepic']['tmp_name'];

    if($imgtemp==''){
        $q = "SELECT * FROM admin WHERE 1";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $imagename = $d['admin_profile'];
    }


    move_uploaded_file($imgtemp,"../images/$imagename");

    $query = "UPDATE admin SET ";
    $query.="fullname='$fullname',";
    $query.="email='$email',";
    $query.="password='$password',";

    // echo $query;

    $query.="admin_profile='$imagename' WHERE id=1";
    
    $run =  mysqli_query($db,$query);
    if($run){
        echo "<script>window.location.href = '../admin/index.php?accountsetting=true';</script>";
    }    
}

if(isset($_POST['submit_form'])){

    $fullname = $_POST['fullname'];
    $email_from = $_POST['email_form'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailheader = "From:".$name."<".$email.">\r\n";
    
    
    $reciepent = "test@gmail.com";
    
}

?>