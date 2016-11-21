<script src="/wp-content/themes/orix/js/iphone-inline-video.browser.js"></script>

<div class="video-container">
    <video autoplay muted loop webkit-playsinline>
        <source src="/wp-content/uploads/video/orix_video_full.mp4" type="video/mp4">
        <source src="/wp-content/uploads/video/orix_video_full.ogv" type="video/ogg">
        <source src="/wp-content/uploads/video/orix_video_full.webm" type="video/webm">
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