@extends('layout')





@section('content')


<section>

  <div class="container">


    <div id="app">

<p>@{{ status }}</p>
<p>@{{ media }}</p>
 
<button @click="postMedia">Submit</button>


</div>





<script>

var app = new Vue({
  el: '#app',
  data: {
    status: '',
    media: ''
  },
  methods: {

        postMedia: function () {

          this.status='...';
          var app = this;

          //var mediaData='hello';

          
          var axiosConfig = {
            headers: {
                'Content-Type': 'application/json;charset=UTF-8',
                "Access-Control-Allow-Origin": "*"
            }
          };

          //var mediaData = 'hello';
          

          var mediaData = {
          user_id: 1,
          media_type_id: 5,
          name: 'Yakuza Zero',
          description: 'ps4 game',
          number_of_copies : 1
          };
          
          axios.post('http://pml/api/media?api_token=5a3067feef66b', mediaData)
          .then(function(response){

          
            

          //app.status = response.data[0];

          app.status = 'post complete.';
          app.media = response.data

          console.log(response);

          })
          .catch(function (error){

          app.status = 'An error occured.'+ error;

          });

      }






  }
})






</script>


</div>


</section>

@stop