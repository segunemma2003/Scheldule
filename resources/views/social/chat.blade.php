@extends('template.master')

@section('content')



<div class="container-flex">

    <div class ="card mx-auto" id="heartland">

       <ul class="list card-header" id="card-one">
           <li class="list-item storm">
                <img src="{{asset('/img/love.jpg')}}" id="love">
                <p id="okoji">Love Okoji <span> <br/>active 3 minutes ago</p>
            </li>    
        </ul>  

        
        <div id="chat" class="card-body">

            <div class="list">
                @if(count($messages) > 0)
                @foreach($messages as $message)
               <div class="emm" id="chat-one">
                            
                    <img src="{{asset('/img/love.jpg')}}" id="love">
                    <p id="me">{{$message->message}}</p>

               </div>  
             
                  
                   
                <div class="hmm" id="chat-two">
                  
                <p id="you">How are you</p> 
                  <img src="{{asset('/img/love.jpg')}}" id="love">
                    

                </div>
                 
                @endforeach
                @endif
               
                

            </div>

           
            <form id="message" method="post">
             @csrf
             <input class="form" type="text" id="wrap" name="message" placeholder="input message ....">
                <button  type="submit" id="plane">
                 <i class="fas fa-paper-plane"></i>
               </button>

          </form>

        </div>
   </div>
  




  

</div>


@endsection