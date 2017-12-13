@extends('layout')





@section('content')


<section>

  <div class="container">


    <div id="app">
    @{{ status }}

    <ol>
            <li v-for="item in media">
             @{{ item.name }}
           </li>
        </ol>

</div>





<script>

var app = new Vue({
  el: '#app',
  data: {
    status: '',
    media: ''
  },
  created: function () {

    this.loadMedia();

  },
  methods: {

    loadMedia: function () {

      this.status='Loading...';
      var app = this;
      //axios.get('http://ron-swanson-quotes.herokuapp.com/v2/quotes')
      axios.get('http://pml/api/media?api_token=5a3067feef66b')
      .then(function(response){

      
        

      //app.status = response.data[0];

      app.status = 'Load complete.';
      app.media = response.data



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
