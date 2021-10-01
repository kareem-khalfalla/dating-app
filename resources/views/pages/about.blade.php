<x-app-layout>
    <br><br><br><br>
    <div class="container ">
      <h1 class="text-center">{{ __('about.title') }}</h1>
      <h4 class=" mt-4 text-center">{{ __('about.small_description') }}</h4>
      <div class="card card-body col-12 ">
         <div class="row">
             <div class="col-12 col-sm-10 col-lg-4">
                 <img src="img/img(21).jpg" class="img-fluid" alt="">
             </div>
  
             <div class="col-12 col-sm-10 col-lg-8 m-auto">
                 <p class="">{{ __('about.description') }}</p>
             </div>
         </div>
      </div>
    </div>
</x-app-layout>