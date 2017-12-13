@extends('layout')





@section('content')


<section>

  <div class="container">


      <div id="app">
       <!--  @{{ media }} -->
      

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
    media: ''
  },
  created: function () {

  	this.loadMedia();

  },
  methods: {

  	loadMedia: function () {

  		this.media='Loading...';
  		var app = this;
  		//axios.get('http://ron-swanson-quotes.herokuapp.com/v2/quotes')
  		axios.get('http://pml/api/media?api_token=5a3067feef66b')
  		.then(function(response){

  		
  			//console.log('hello');


  		app.media = response.data;



  		})
  		.catch(function (error){

  		app.media = 'An error occured.'+ error;

  		});

	}






  }
})

</script>


@stop


  </div>


</section>
