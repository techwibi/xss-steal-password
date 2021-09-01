<?php

session_name('session');    
session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']!='admin') {
        
        $_SESSION['user'] = 'guest';
    }
}
else {
    $_SESSION['user'] = 'guest';
}

require './config.php';
require './conn.php';


$query =<<<EOF
    SELECT * from comments;
EOF;

$result = $db->query($query);

?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?= $url; ?>/asset/academyLabHeader.css" rel="stylesheet">
        <link href="<?= $url; ?>/asset/labsBlog.css" rel="stylesheet">
        <title>Exploiting cross-site scripting to steal password</title>
    </head>
    <body>
            <script src="<?= $url; ?>/asset/labHeader.js"></script>
            
            <div id="academyLabHeader">
                <section class="academyLabBanner">
                    <div class="container">
                    <div class="logo"></div>
                        <div class="title-container">
                            <h2>Exploiting cross-site scripting to steal password</h2>
                        </div>
                        <div class="widgetcontainer-lab-status is-notsolved">
                            <span>LAB</span>
                            <p>Not solved</p>
                            <span class="lab-status-icon"></span>
                        </div>
                    </div>
                </section>
            </div>

        <div theme="blog">
            <section class="maincontainer">
                <div class="container is-page">
                    <header class="navigation-header">
                        <section class="top-links">
                            <a href="<?= $url; ?>/index.php">Home</a><p>|</p>
                            <a href="<?= $url; ?>/login.php">My account</a><p>|</p>
                            
                            <p><b>I am <?=$_SESSION['user']; ?></b></p>    
                            <p>|</p>
                        </section>
                    </header>
                    <header class="notification-header">
                    </header>
                    <img src="<?= $url; ?>/asset/60.jpg">
                    <h1>Interviews</h1>
                    <p><span id="blog-author">Mick Mouse</span> | 28 July 2021</p>
                    <hr>
                    <p>Interviews are a lot like nightmares, except they're real. Interviews are anxiety inducing and can cause reactions you really don't intend on. The feeling of being invited for an interview for a position you've long coveted, or a dream role that you didn't expect would even get a response, is a wonderful thing. The initial euphoria you have is worth basking in, because sometime after that will come the butterflies, the nerves and the questioning.</p>
                    <p>Let's be honest, there is no way, unless you're a robot, that you will be completely free of nerves when you walk into that room. But there are some things to do that will prepare you for a less terrifying experience. Some of which are obvious, perhaps some less so. Start with prep. Even the basics, like making sure you know the name of the interviewee and the company. Again, this is a pretty obvious thing to do when striving to land a job you really want, but nerves can really make even the simplest of things leave your mind.</p>
                    <p>Instead of writing the names of people and the company on your hand, that you'll use to mop your sweaty brow and smear ink on your face, come up with some practices like name association. This is handy as you can focus on an object and make sure the name is linked to that object in your head.</p>
                    <p>The old fail safe is of course, picture everyone in their underwear. It's a real high risk, high reward one this. If it works, great. If not, you could be nervously staring at people crotches trying to see through clothing like a poor man's Superman. But if you're a suave and subtle, then this might just be the one for you.</p>
                    <p>Another important factor to take into account is the waiting time. I don't mean the days between the invite and the interview itself, I mean the actual period of waiting in the reception for them to call you in. You could find yourself sweating profusely or hyperventilating, to take your mind off of these horrid sensations, try breathing exercises or mediation. Be sure to do this in your seat rather than remove your shoes and sit in the lotus position on the floor, unless of course your interview is for a yoga teacher, that could score some brownie points.</p>
                    <p>If you're needing a distraction and are feeling particularly sinister, you could always try and psyche out the other interviewees. Maybe one is coming out from their own interview and is looking a little sheepish, just check your watch and act surprised at how quickly it was over. Or, if you're feeling really flamboyant, mock up some fake awards to carry in your bag or briefcase and 'accidently' spill them on the floor. This is also high risk high reward, so it's really for the dirty players here who want the job no matter what the cost.</p>
                    <p>Speaking of cost' it never hurts to carry some cash and slip the interviewee' no, I jest there, don't bribe them. Unless of course that is part of the interview.</p>
                    <hr>
                    <h1>Comments</h1>

                    <?php while($row = $result->fetchArray(SQLITE3_ASSOC)) : ?>
                        <section class="comment">
                        <p>
                        <img src="<?= $url; ?>/asset/avatarDefault.svg" class="avatar">                            <?= $row["name"] ?> | 12 August 2021
                        </p>
                        <p><?= $row["comment"] ?></p>
                        <p></p>
                        </section>
                    <?php endwhile; ?>
                    <hr>
                    <section class="add-comment">
                        <h2>Leave a comment</h2>
                        <form action="<?= $url; ?>/post.php" method="POST" enctype="application/x-www-form-urlencoded">
                            <label>Comment:</label>
                            <textarea rows="12" cols="300" name="comment"></textarea>
                                    <label>Name:</label>
                                    <input required="" type="text" name="name">
                                    <label>Email:</label>
                                    <input type="email" name="email">
                                    <label>Website:</label>
                                    <input type="text" name="website">
                            <button class="button" type="submit">Post Comment</button>
                        </form>
                    </section>
                </div>
            </section>
        </div>


</body>
</html>