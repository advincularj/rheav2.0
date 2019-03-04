@extends('patient.layouts.app')

@section('content')
   <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
         <div class="shape shape-style-1 shape-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
         </div>

         <div class="container">
            @include('patient.inc.messages')
         </div>

         <div class="container py-lg-md d-flex">
            <div class="col px-0">
               <div class="row justify-content-center">
                  <div class="col-md-10">

                     {{--HERE IS THE START--}}
                     <div class="card">
                        <div class="card-header">Your Items </div>
                        <div class="card-body">

                           <ul>
                           @foreach($items as $item)
                              <li>

                                 {{Form::open()}}
                                 <input type="checkbox"  onClick="this.form.submit()"
                                         {{$item->done ? 'checked' : ''}}/>

                                 <input type="hidden" name="id" value="{{$item->id}}" />
                                 {{$item->name}}
                                 {{Form::close()}}
                              </li>

                              {{--<form>--}}
                                 {{--<input type="hidden" name="id" value="{{$item->id}}">--}}
                                 {{--<td>--}}
                                    {{--<input type="checkbox" name="id" onclick="this.form.submit()" {{$item->done ? 'checked' : ''}}>--}}
                                 {{--</td>--}}
                                 {{--<td>{{$item->task ?? ""}}</td>--}}
                              {{--</form>--}}
                              @endforeach
                           </ul>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   </div>


    @endsection

