<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <script type="text/javascript" charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
  <script type="text/javascript" charset="utf-8" src="http://cdn.clappr.io/0.2.1/clappr.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="https://cdn.jsdelivr.net/clappr.comment/latest/comments.min.js"></script>

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

  <title>Clappr comment plugin - Labs of Jordane</title>
  <script type="text/javascript" charset="utf-8">
    window.onload = function() {
      var player = new Clappr.Player({
        sources: ['http://clappr.io/highline.mp4'],

        plugins: {
          core: [Comments]
        },

        // Comment options
        videoId: 1,
        urlGetComments: "http://labs.jordane.net/clappr-comment/comments-video",
        urlAddComments: "http://labs.jordane.net/clappr-comment/submit-comment",
        iconComment: "fa fa-comment-o",
        iconFont: "FontAwesome",
        pointerColor: "orange",
        enablePicture: true,
        texts: {
          addComment: 'Add a comment at',
          addCommentLink: "Comment",
          minutes: "minutes",
          commentPlaceholder: "Put a comment here",
          sendComment: "Send"
        }
      });

      player.attachTo(document.getElementById('player-wrapper'));
    }
  </script>

  <style>
    .player {
      width: 640px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>

</head>
<body>

  <div class="container">

    <h2 class="text-center">Clappr comment plugin</h2>

    <div class="player" id="player-wrapper"></div>

    <h3>Repository: <a href="https://github.com/metrakit/clappr-comment-plugin">https://github.com/metrakit/clappr-comment-plugin</a></h3>

    <h3>Install</h3>

    <blockquote>bower install clappr-comment-plugin</blockquote>

    <h3>Options</h3>

    <pre>
      urlGetComments: "http://localhost/comments-video",
      urlAddComments: "http://localhost/submit-comment",
      iconComment: "fa fa-comment-o",
      iconFont: "FontAwesome",
      pointerColor: "blue",
      enablePicture: true
      texts: {
          addComment: 'Add a comment at',
          addCommentLink: "Comment",
          minutes: "minutes",
          commentPlaceholder: "Put a comment here",
          sendComment: "Send"
        }</pre>

  </div>

</body>
</html>

