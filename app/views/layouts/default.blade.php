<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Connect2Good</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{HTML::style("//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css", array('rel' => 'stylesheet'))}}
    {{HTML::style("//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css", array('rel' => 'stylesheet'))}}
    
    <style type="text/css">
      .jumbotron {
        text-align: center;
      }

      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }

      form {
        text-align: center;
      }

      form textarea {
        width: 596px;
        resize: none;
      }

      .span6>h2 {
        text-align: center;
      }

      .bcard {
        background-color: #fff;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
        margin-bottom: 1%;
        border-radius: 4px;
        /*padding: 1%;*/
      }

      .bcard-body {
        padding-left: 0.5%;
        padding-right: 0.5%;
        background-color: #fff;
        margin-top: 2%;
        margin-bottom: 2%;
        font-size: 16px;
      }

      .bcard-footer {
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        text-align: center;
      }

      .bcard-header {
        border-bottom: 1px solid #eee;
        text-align: center;
      }

      .tag-container ul li {
        display: inline;
      }

      #lists ul {
        list-style-type: none;
      }
    </style>

    {{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js')}}

    <script type="text/javascript">
      $(document).ready(function(){
        $("#search").click(function(){
          var $tags = $("#tags").val();
          $.ajax({
            type: "POST",
            url: "index.php/main/search",
            data: "tags="+$tags,
            dataType: "json",
            success: function(results) {
              $("#looking").empty();
              $("#offering").empty();
              $.each(results, function(i, result){
                $("body").append(generateModal(result));
                if(result.type == 0)
                {
                  $("#offering").append(generateCard(result));
                }
                else
                {
                  $("#looking").append(generateCard(result));
                }
              });
            },
          });
        });

        $("")
      });

      function generateCard(item)
      {
        var $card = '<li><div class="bcard">';
        $card += '<div class="bcard-header"><h4>' + item.name + '</h4></div>';
        $card += '<div class="bcard-body clearfix">';
        $card += '<span class="pull-left">' + item.contact + '</span>';
        $card += '<span class="pull-right">' + item.contact + '</span>';
        $card += '<div class="row"><div class="span12"><p class="clearfix" style="padding-left: 5%; text-align: center;"><strong>Needs the following:</strong></p></div></div>';
        $card += '<div class="row" style="margin-left: 2%"><div class="tag-container"><ul>';
        $card += generateTagList(item.tags);
        $card += '</ul></div></div>';
        $card += '</div>';
        $card += '<div class="bcard-footer"><a href="#'+item.id+'Modal" data-toggle="modal">Click for more</a></div>';
        $card += '</div></li>';

        return $card;
      }

      function generateModal(item)
      {
        var $modal = '<div id="'+item.id+'Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
        $modal += '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="'+item.id+'ModalLabel">'+item.name+'</h3></div>';
        $modal += '<div class="modal-body"><p>'+item.about+'</p>';
        $modal += '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=St.+Edwards,+Austin,+TX&amp;aq=1&amp;oq=St.+&amp;sll=30.307761,-97.753401&amp;sspn=0.639033,1.220856&amp;ie=UTF8&amp;hq=&amp;hnear=St+Edwards,+Austin,+Travis,+Texas&amp;t=m&amp;z=14&amp;ll=30.226409,-97.755252&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=St.+Edwards,+Austin,+TX&amp;aq=1&amp;oq=St.+&amp;sll=30.307761,-97.753401&amp;sspn=0.639033,1.220856&amp;ie=UTF8&amp;hq=&amp;hnear=St+Edwards,+Austin,+Travis,+Texas&amp;t=m&amp;z=14&amp;ll=30.226409,-97.755252" style="color:#0000FF;text-align:left">View Larger Map</a></small></div>';
        $modal += '</div>';
        return $modal;
      }

      function generateTagList(tags)
      {
        var $list = '';

        $.each(tags, function(i, tag){
          $list += '<li>'+tags[i]+'</li>,';
        });

        return $list;
      }
    </script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      @yield('content')
    </div>
    {{HTML::script('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js')}}
  </body>
</html>