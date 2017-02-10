<script src="/wp-content/themes/orix/js/iphone-inline-video.browser.js"></script>

<?php $default =  '/wp-content/uploads/video/orix_video_full'?>

<div class="video-container">
    <video autoplay muted loop webkit-playsinline>
        <source src="<?php echo $video_path ? $video_path : $default?>.mp4" type="video/mp4">
        Your browser doesn't support HTML5 video.
    </video>
    <div id="controls"> <a onclick="videoMute()" id="btn-mute"><i class="fa fa-volume-down" aria-hidden="true"></i></a> </div>
</div>

<script>
    var video = document.querySelector('video'),
      videoBtn = document.getElementById('btn-mute');
    makeVideoPlayableInline(video);
    video.addEventListener('touchstart', function () {
        video.play();
    });
</script>